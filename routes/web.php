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
Route::post('/login', [Authentication::class, 'login'])->name('login.post');
//Route Register
Route::get('/register', [Authentication::class, 'register_user'])->name('register');
Route::post('/register', [Authentication::class, 'register'])->name('register.post');

//Route Reset Password
Route::get('/reset_password', [Authentication::class, 'forgot_password'])->name('forgot_password');
Route::post('/reset_password', [Authentication::class, 'reset_password'])->name('reset_password');

//Route Logout
Route::get('/logout', [Authentication::class, 'logout'])->name('logout');

Route::get('/customers/', function () {
    return view('Customers.Content.landing-page');
});

Route::prefix('admin')->group(function () {
//    Admin Dashboard
    Route::get('/dashboard', function () {
    $data = [
        'title' => 'Dashboard',
        'breadcrumb' => 'Dashboard',
    ];
    return view('Admin.Dashboard.index', $data);
})->name('admin.dashboard');
//Route Pengguna
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna');

//Routes Barang
    Route::get('/barang', [BarangController::class, 'index'])->name('barang');

//Routes Paket
    Route::get('/paket', [PaketController::class, 'index'])->name('paket');

//Routes Layanan
    Route::get('/layanan', [LayananController::class, 'index'])->name('layanan');

//Route Booking
    Route::get('/pesanan', [PesananController::class, 'index'])->name('booking');

//Route Penyewaan
    Route::get('/penyewaan', [PenyewaanController::class, 'index'])->name('penyewaan');

//Route Pembayaran
    Route::get('/pembayaran', [PenyewaanController::class, 'create'])->name('pembayaran');

    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
});


//Routes Customer
Route::prefix('customer')->group(function () {
    Route::get('/',[CustomerBookingController::class,'index'])->name('customer');
    Route::get('/',[CustomerPenyewaanController::class,'index'])->name('customer');

});


Route::get('/', function () {
    $data = [
        'title' => 'Home',
        'breadcrumb' => 'Home',
    ];
    return view('Admin.Dashboard.index', $data);
});

