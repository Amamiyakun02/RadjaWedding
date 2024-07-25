<?php
use App\Http\Controllers\API\BarangController;
use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\LayananController;
use App\Http\Controllers\API\PaketController;
use App\Http\Controllers\API\RiwayatController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PengembalianBarang;
use App\Http\Controllers\Auth\AutheticationController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
 */

Route::post('register', [AutheticationController::class, 'register'])->name('register.post');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Api User
Route::apiResource('/users', UserController::class)->except(['index']);
Route::post('users/index', [UserController::class, 'index']);

//Api Barang
Route::apiResource('/barang', BarangController::class)->except(['index']);
Route::post('/barang/index', [BarangController::class, 'index']);

//Layanan
Route::apiResource('/layanan', LayananController::class)->except(['index']);
Route::post('/layanan/index', [LayananController::class, 'index']);

//Paket
Route::apiResource('/paket', PaketController::class)->except(['index']);
Route::post('/paket/index', [PaketController::class, 'index']);

Route::apiResource('/booking', BookingController::class)->except(['index']);
Route::post('/booking/index', [BookingController::class, 'index']);

Route::apiResource('/riwayat', RiwayatController::class)->except(['index']);
Route::post('/riwayat/index', [RiwayatController::class, 'index']);

Route::apiResource('/pengembalian', PengembalianBarang::class)->except(['index']);
Route::post('/pengembalian/index', [PengembalianBarang::class, 'index']);