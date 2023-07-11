<?php

namespace App\Http\Middleware;
use App\Models\Admin;
use App\Models\pengguna;
use App\Models\pengguna_dosen;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            return redirect()->name('dashboard')->with('success', 'Anda sudah login kenapa login lagi, cukup sekali aja yaa');
        }
        return $next($request);
    }
}
