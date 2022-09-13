<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\kunjunganController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/tes', function () {
    return view('home');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/daftar', function () {
    return view('daftar');
});

// Route::get('/profil', function () {
//     return view('detail_profil');
// });
Route::get('/profil/ubah', function () {
    return view('edit_profil');
});

Route::get('/tentang', function () {
    return view('tentang');
});

Route::get('/informasi', function () {
    return view('informasi');
});

Route::get('/visi', function () {
    return view('informasi1');
});

Route::get('/dasar-uu', function () {
    return view('informasi2');
});

// Route::get('/kunjungan', function () {
//     return view('kunjungan');
// });
Route::get('/form_kunjungan', function () {
    return view('form_kunjungan');
});
Route::get('/riwayat_kunjungan', function () {
    return view('riwayat_kunjungan');
});
Route::get('/detail_riwayat', function () {
    return view('detail_riwayat');
});
Route::get('/panduan', function () {
    return view('panduan');
});
Route::get('/panduan_kunjungan', function () {
    return view('panduan_kunjungan');
});
Route::get('/panduan_aplikasi', function () {
    return view('panduan_aplikasi');
});
Route::get('/sosmed', function () {
    return view('sosmed');
});
Route::get('/lokasi', function () {
    return view('lokasi');
});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/kunjungan', [HomeController::class, 'kunjungan'])->name('kunjungan')->middleware('auth');
Route::get('/riwayat_kunjungan', [kunjunganController::class, 'index'])->name('riwayat')->middleware('auth');
Route::get('/form-kunjungan', [kunjunganController::class, 'create'])->name('form-kunjungan')->middleware('auth');
Route::post('/form-kunjungan', [kunjunganController::class, 'store'])->name('form-kunjungan-store')->middleware('auth');
Route::get('/detail-profil/{id}', [UserController::class, 'show'])->name('detail-profil')->middleware('auth');
Route::get('/edit-profil/{id}', [UserController::class, 'edit'])->name('edit-profil')->middleware('auth');
Route::put('/update-profil/{id}', [UserController::class, 'update'])->name('edit-profil-update')->middleware('auth');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth', 'admin'])->group(function () {
    // Route::get('admin-view', [HomeController::class, 'admin'])->name('admin');
    Route::get('admin-view/user', [UserController::class, 'index'])->name('datauser');
    Route::get('admin-view', [adminController::class, 'index'])->name('admin');
    Route::get('admin-view/kunjungan', [adminController::class, 'kunjungan'])->name('requestkunjungan');
    Route::get('admin-view/riwayat-kunjungan', [adminController::class, 'riwayat'])->name('riwayatkunjungan');
    Route::get('admin-view/riwayat-kunjungan/{id}', [adminController::class, 'showriwayat'])->name('konfimasi');
    Route::put('admin-view/riwayat-kunjungan/{id}', [adminController::class, 'updateriwayat'])->name('updateriwayat');
});
