<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\BarangController;
use App\Http\Controllers\API\LayananController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Api User
Route::apiResource('/users', UserController::class)->except(['index']);
Route::post('users/index', [UserController::class, 'index']);


//Api Barang
Route::apiResource('/barang', BarangController::class)->except(['index']);
Route::post('/barang/index', [BarangController::class,'index']);