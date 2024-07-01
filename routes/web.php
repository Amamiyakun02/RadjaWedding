<?php

use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\PenyewaanController;
use App\Http\Controllers\Admin\Pem;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\Auth\AutheticationController as Authentication;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Default Routes
Route::get('/',[MainController::class,'index']);


//Route Authentikasi
//Route Login
Route::get('/login', [Authentication::class, 'login_user'])->name('login');
Route::post('/login', [Authentication::class, 'login'])->name('login_post');
//Route Register
Route::get('/register', [Authentication::class, 'register_user'])->name('register');
Route::post('/register', [Authentication::class, 'register'])->name('register_post');
//Route Reset Password
Route::get('/reset_password', [Authentication::class, 'reset_password'])->name('reset_password');
Route::post('/reset_password', [Authentication::class, 'reset_password_post'])->name('reset_password_post');


Route::get('/dashboard', function () {
    return view('Content.Dashboard');
});

Route::get('/section', function () {
    return view('Layouts.section');
});

Route::get('/customers/', function () {
    return view('Customers.Content.landing-page');
});


//Route Pengguna
Route::get('/pengguna',[PenggunaController::class,'index'])->name('pengguna');
Route::get('/pengguna/create',[PenggunaController::class,'create'])->name('pengguna.create');
Route::post('/pengguna/create',[PenggunaController::class,'store'])->name('pengguna.store');
Route::get('/pengguna//edit/{id}',[PenggunaController::class,'edit'])->name('pengguna.edit');
Route::put('/pengguna/edit/{id}',[PenggunaController::class,'update'])->name('pengguna.update');
Route::delete('/pengguna//delete/{id}',[PenggunaController::class,'destroy'])->name('pengguna.destroy');

//Routes Barang
Route::get('/barang/', [BarangController::class, 'index'])->name('barang');
Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
Route::get('/barang/edit/{id}', [BarangController::class, 'edit'])->name('barang.edit');
Route::put('/barang/update/{id}', [BarangController::class, 'update'])->name('barang.update');
Route::delete('/barang/delete/{id}', [BarangController::class, 'destroy'])->name('barang.delete');

//Routes Paket
Route::get('/paket', [PaketController::class, 'index'])->name('paket');
Route::get('/paket/create', [PaketController::class, 'create'])->name('paket.create');
Route::post('/paket', [PaketController::class, 'store'])->name('paket.store');
Route::get('/paket/edit/{id}', [PaketController::class, 'edit'])->name('paket.edit');
Route::put('/paket/update/{id}', [PaketController::class, 'update'])->name('paket.update');
Route::delete('/paket/delete/{id}', [PaketController::class, 'destroy'])->name('paket.delete');

//Routes Layanan
Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');
Route::get('/layanan/create', [LayananController::class, 'create'])->name('layanan.create');
Route::post('/layanan', [LayananController::class, 'store'])->name('layanan.store');
Route::get('/layanan/edit/{id}', [LayananController::class, 'edit'])->name('layanan.edit');
Route::put('/layanan/update/{id}', [LayananController::class, 'update'])->name('layanan.update');
Route::delete('/layanan/delete/{id}', [LayananController::class, 'destroy'])->name('layanan.delete');


//Route Booking
Route::get('/pesanan', [PesananController::class, 'index']);
Route::get('pesanan/tambah', [PesananController::class, 'create']);


//Route Penyewaan
Route::get('/penyewaan', [PenyewaanController::class, 'index'])->name('penyewaan');

//Route Pembayaran

//Route Riwayat
Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
