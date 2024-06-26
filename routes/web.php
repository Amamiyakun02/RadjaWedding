<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\Auth\AutheticationController as Authentication;
//Admin Controller
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PaketController;
use App\Http\Controllers\Admin\PenyewaanController;
use App\Http\Controllers\Admin\PengembalianBarangController;
use App\Http\Controllers\Admin\PesananController;
use App\Http\Controllers\Admin\RiwayatController;

//Customer Controller
use App\Http\Controllers\Customer\PenyewaanController as CustomerPenyewaanController;
use App\Http\Controllers\Customer\BookingController as CustomerBookingController;
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
Route::get('/reset_password', [Authentication::class, 'forgot_password'])->name('forgot_password');
Route::post('/reset_password', [Authentication::class, 'reset_password'])->name('reset_password');


Route::get('/dashboard', function () {
    return view('Content.Dashboard');
});
Route::get('/dashboard', [MainController::class, 'dashboard'])->name('dashboard');

Route::get('/customers/', function () {
    return view('Customers.Content.landing-page');
});

Route::prefix('admin')->group(function () {
//Route Pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index']);
    Route::get('/pengguna/create', [PenggunaController::class, 'create']);
    Route::post('/pengguna/create', [PenggunaController::class, 'store']);
    Route::get('/pengguna//edit/{id}', [PenggunaController::class, 'edit']);
    Route::put('/pengguna/edit/{id}', [PenggunaController::class, 'update']);
    Route::delete('/pengguna//delete/{id}', [PenggunaController::class, 'destroy']);

//Routes Barang
    Route::get('/barang/', [BarangController::class, 'index']);
    Route::get('/barang/create', [BarangController::class, 'create']);
    Route::post('/barang', [BarangController::class, 'store']);
    Route::get('/barang/edit/{id}', [BarangController::class, 'edit']);
    Route::put('/barang/update/{id}', [BarangController::class, 'update']);
    Route::delete('/barang/delete/{id}', [BarangController::class, 'destroy']);

//Routes Paket
    Route::get('/paket', [PaketController::class, 'index']);
    Route::get('/paket/create', [PaketController::class, 'create']);
    Route::post('/paket', [PaketController::class, 'store']);
    Route::get('/paket/edit/{id}', [PaketController::class, 'edit']);
    Route::put('/paket/update/{id}', [PaketController::class, 'update']);
    Route::delete('/paket/delete/{id}', [PaketController::class, 'destroy']);

//Routes Layanan
    Route::get('/layanan', [LayananController::class, 'index']);
    Route::get('/layanan/create', [LayananController::class, 'create']);
    Route::post('/layanan', [LayananController::class, 'store']);
    Route::get('/layanan/edit/{id}', [LayananController::class, 'edit']);
    Route::put('/layanan/update/{id}', [LayananController::class, 'update']);
    Route::delete('/layanan/delete/{id}', [LayananController::class, 'destroy']);


//Route Booking
    Route::get('/pesanan', [PesananController::class, 'index']);
    Route::get('pesanan/tambah', [PesananController::class, 'create']);


//Route Penyewaan
    Route::get('/penyewaan', [PenyewaanController::class, 'index'])->name('penyewaan');

//Route Pembayaran

//Route Riwayat
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
});

//Routes Customer
Route::prefix('customer')->group(function () {
    Route::get('/',[CustomerBookingController::class,'index'])->name('customer');

    Route::get('/',[CustomerPenyewaanController::class,'index'])->name('customer');

});
