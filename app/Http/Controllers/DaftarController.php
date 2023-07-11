<?php

namespace App\Http\Controllers;
use App\Models\pengguna;
use App\Models\pengguna_dosen;
use Illuminate\Http\Request;

class DaftarController extends Controller
{
    //
    public function create()
{
    return view('signup');
    
}


public function store(Request $request)
{
    
   
    // Cek apakah NIM atau Username sudah ada di database
    if (pengguna::where('NIM', $request->NIM)->exists()) {
    return redirect()->back()->withErrors(['NIM' => 'NIM telah ada.'])->withInput();
    }

 // Cek apakah email telah ada di tabel pengguna_dosen
 $existingDosenEmail = pengguna_dosen::where('email', $request->email)->exists();

 // Cek apakah username telah ada di tabel pengguna_dosen
 $existingDosenUsername = pengguna_dosen::where('Username', $request->Username)->exists();

 // Cek apakah email telah ada di tabel pengguna
 $existingPenggunaEmail = pengguna::where('email', $request->email)->exists();

 // Cek apakah username telah ada di tabel pengguna
 $existingPenggunaUsername = pengguna_dosen::where('Username', $request->Username)->exists();

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
    pengguna::create([
        'email' => $request->email,
        'NIM' => $request->NIM,
        'Nama' => $request->Nama,
        'Username' => $request->Username,
        'Password' =>  $passwordHash,
    ]);

  

   

    return redirect('/login')->with('success', 'Registration successful!');
}
}
