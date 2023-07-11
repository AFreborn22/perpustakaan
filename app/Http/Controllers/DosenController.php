<?php

namespace App\Http\Controllers;
use App\Models\pengguna_dosen;
use App\Models\pengguna;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    //
    public function create()
    {
        return view('signdosen');
        
        
    }
    
    
    public function store(Request $request)
    {
      
       
        // Cek apakah NIM atau Username sudah ada di database
        if (pengguna_dosen::where('NIK_dosen', $request->NIK_dosen)->exists()) {
        return redirect()->back()->withErrors(['NIK_dosen' => 'NIK telah ada.'])->withInput();
        }
    
     // Cek apakah email telah ada di tabel pengguna_dosen
    $existingDosenEmail = pengguna_dosen::where('email', $request->email)->exists();

    // Cek apakah username telah ada di tabel pengguna_dosen
    $existingDosenUsername = pengguna_dosen::where('Username', $request->Username)->exists();

    // Cek apakah email telah ada di tabel pengguna
    $existingPenggunaEmail = pengguna::where('email', $request->email)->exists();

    // Cek apakah username telah ada di tabel pengguna
    $existingPenggunaUsername = pengguna::where('Username', $request->Username)->exists();

    if ($existingDosenEmail || $existingPenggunaEmail) {
        return redirect()->back()->withErrors([
            'email' => 'Email telah ada.'
        ])->withInput();
    }

    if ($existingDosenUsername || $existingPenggunaUsername) {
        return redirect()->back()->withErrors([
            'Username' => 'Username telah ada.'
        ])->withInput();
    }

  // Validasi panjang password
$validatedData = $request->validate([
    'Password' => 'required|min:7'
]);
    
    $passwordHash = bcrypt($validatedData['Password']);
        // Simpan data pengguna ke database menggunakan model User
        pengguna_dosen::create([
            'email' => $request->email,
            'NIK_dosen' => $request->NIK_dosen,
            'nama_dosen' => $request->nama_dosen,
            'Username' => $request->Username,
            'Password' =>  $passwordHash,
        ]);
    
      
    
       
    
        return redirect('/login')->with('success', 'Registration successful!');
    }
}
