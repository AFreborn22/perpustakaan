<?php

namespace App\Http\Controllers;
use App\Models\pengguna;
use App\Models\pengguna_dosen;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLoginForm()
    {
        return view('login');
     
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'Username' => 'required',
            'Password' => 'required',
            'role' => 'required',
        ]);

        $role = $request->input('role');

        $user = null;
 

        if ($role === 'dosen') {
            $user = pengguna_dosen::where('Username', $credentials['Username'])->first();
            if ($user && password_verify($credentials['Password'], $user->Password)) {
                Auth::login($user);
    
                $request->session()->regenerate();
    
                return redirect()->intended('/dashboardm')->with([
                    'nik' => $user->NIK,
                    'nama' =>$user->nama_dosen,
                    'Username' => $user->Username,
                ]);
            }
    
        } elseif ($role === 'mahasiswa') {
            $user = pengguna::where('Username', $credentials['Username'])->first();
            if ($user && password_verify($credentials['Password'], $user->Password)) {
                Auth::login($user);
    
                $request->session()->regenerate();
    
                return redirect()->intended('/dashboardm')->with([
                    'nim' => $user->NIM,
                    'nama' =>$user->Nama,
                    'Username' => $user->Username,
                ]);
            }
    
        } elseif ($role === 'petugas') {
            $user = staff::where('Username', $credentials['Username'])->first();
            if ($user && password_verify($credentials['Password'], $user->Password)) {
                Auth::login($user);
    
                $request->session()->regenerate();
    
                return redirect()->intended('/dashboard-staff')->with('Username', Auth::user()->Username);
            }
    
        }

       
        // Autentikasi gagal
        return back()->withInput()->withErrors([
            'username' => 'Username atau password salah!!',
            'role' => 'Role yang dipilih tidak tepat!!',
        ])->with('errorType', 'authentication');
}
      
    

   

    public function logout(Request $request){
        Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');
    }
}
