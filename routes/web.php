<?php

//Admin Controller
use App\Http\Controllers\Auth\AutheticationController as Authentication;
use App\Http\Controllers\Customer\BookingController as CustomerBookingController;

//Customer Controller
use App\Http\Controllers\Customer\PenyewaanController as CustomerPenyewaanController;
use App\Http\Controllers\MainController;
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
Route::get('/', [MainController::class, 'index']);

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

    Route::get('/pengguna', function () {
        $data = [
            'title' => 'Pengguna',
            'breadcrumb' => 'Data pengguna',
        ];
        return view('Admin.Pengguna.index', $data);
    })->name('pengguna');

    Route::get('/barang', function () {
        $data = [
            'title' => 'Barang',
            'breadcrumb' => 'Data Barang',
        ];
        return view('Admin.Barang.index', $data);
    })->name('barang');

    Route::get('/paket', function () {
        $data = [
            'title' => 'Paket',
            'breadcrumb' => 'Data Paket',
        ];
        return view('Admin.Paket.index', $data);
    })->name('paket');

    Route::get('/layanan', function () {
        $data = [
            'title' => 'Layanan',
            'breadcrumb' => 'Data Layanan',
        ];
        return view('Admin.Layanan.index', $data);
    })->name('layanan');

    Route::get('/pesanan', function () {
        $data = [
            'title' => 'pesanan',
            'breadcrumb' => 'Data Pesanan',
        ];
        return view('Admin.Pesanan.index', $data);
    })->name('pesanan');

    Route::get('/penyewaan', function () {
        $data = [
            'title' => 'Penyewaan',
            'breadcrumb' => 'Data Penyawaan',
        ];
        return view('Admin.Penyawaan.index', $data);
    })->name('penyewaan');

    Route::get('/riwayat', function () {
        $data = [
            'title' => 'Riwayat',
            'breadcrumb' => 'Data Riwayat',
        ];
        return view('Admin.Riwayat.index', $data);
    })->name('riwayat');

    Route::get('/pengembalian', function () {
        $data = [
            'title' => 'Pengembalian',
            'breadcrumb' => 'Data Pengembalian',
        ];
        return view('Admin.Pengembalian.index', $data);
    })->name('pengembalian');

    Route::get('/booking', function () {
        $data = [
            'title' => 'Boking',
            'breadcrumb' => 'Data Boking',
        ];
        return view('Admin.Booking.index', $data);
    })->name('booking');
});

//Routes Customer
Route::prefix('customer')->group(function () {
    Route::get('/', [CustomerBookingController::class, 'index'])->name('customer');
    Route::get('/', [CustomerPenyewaanController::class, 'index'])->name('customer');

});

Route::get('/', function () {
    $data = [
        'title' => 'Home',
        'breadcrumb' => 'Home',
    ];
    return view('Admin.Dashboard.index', $data);
});
