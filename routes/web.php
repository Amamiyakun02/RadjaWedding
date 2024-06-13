<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\LayananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


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

Route::get('/login', [LoginController::class, 'showLoginForm']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/dashboard', function () {
    return view('Content.Dashboard');
});

Route::get('/section', function () {
    return view('Layouts.section');
});

Route::get('/customers/', function () {
    return view('Customers.Content.landing-page');
});


//Routes Barang
Route::get('/barang/', [BarangController::class, 'index']);
Route::get('/barang/tambah', [BarangController::class, 'create']);


//Routes Paket
Route::get('/paket', [PaketController::class, 'index']);
Route::get('/paket/tambah', [PaketController::class, 'create']);


//Routes Layanan
Route::get('/layanan', [LayananController::class, 'index']);
