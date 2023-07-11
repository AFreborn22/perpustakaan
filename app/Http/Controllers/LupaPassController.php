<?php

namespace App\Http\Controllers;
use App\Models\pengguna;
use App\Models\pengguna_dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class LupaPassController extends Controller
{
    /**
     * Update the user's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required',
            'Password' => 'required|min:7',
            'Username' => 'required',
        ]);

        $user = null;

         // Mencari pengguna berdasarkan email pada tabel 'pengguna'
         $user = pengguna::where('email', $validatedData['email'])
         ->where('Username', $validatedData['Username'])
         ->first();


    // Jika pengguna tidak ditemukan pada tabel 'pengguna',
    // mencari pengguna berdasarkan email pada tabel 'pengguna_dosen'
    if (!$user) {
        $user = pengguna_dosen::where('email', $validatedData['email'])
                           ->where('Username', $validatedData['Username'])
                           ->first();
    }

        if ($user) {
            $user->password = Hash::make($validatedData['Password']);
            $user->save();

            return redirect('/login')->with('success', 'Password updated successfully.');
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Email or Username is invalid.',
                'Username' => 'Email or Username is invalid.',
            ])->withInput();
        }
    }

    /**
     * Check if a table exists in the database.
     *
     * @param string $tableName
     * @return bool
     */
    private function checkTableExist($tableName)
    {
        return Schema::hasTable($tableName);
    }
}