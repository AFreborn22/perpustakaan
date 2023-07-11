<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\pengguna;
class DashboardController extends Controller
{
    //
   
    public function dashboard()
{


    // Lanjutkan ke tampilan dashboard
    return view('dashboard');
   
}

public function index(){
  
    return view('dashboardm');
   
}
}
