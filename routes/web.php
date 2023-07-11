<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LupaPassController;
use App\Http\Controllers\DashboardController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'web'], function () {
    // Rute-rute yang memerlukan akses session di sini
    Route::get('/dashboardm', [DashboardController::class, 'index'])->name('dashboard-mahasiswa');
// Tambahkan rute lain yang perlu diotentikasi di sini
Route::get('/setting/backup', function () {
    return view('backup');
});
Route::get('/setting/version', function () {
    return view('version');
});
Route::get('/setting/hapusakun', function () {
    return view('hapusakun');
});
Route::get('/setting', function () {
    return view('settinguser');
});
});
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/lupapass', function () {
    return view('lupapass');
});
Route::post('/lupapass', [LupaPassController::class, 'update'])->name('lupapass.update');

Route::get('/signup', [DaftarController::class, 'create'])->name('signup.create');
Route::post('/signup', [DaftarController::class, 'store'])->name('signup.store');

Route::get('/signdosen', [DosenController::class, 'create'])->name('signdosen.create');
Route::post('/signdosen', [DosenController::class, 'store'])->name('signdosen.store');