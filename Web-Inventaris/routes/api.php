<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use \Illuminate\Http\Middleware\HandleCors;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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
// Route::group(['middleware' => ['cors']], function () {
//     // Rute-rute yang membutuhkan CORS
// });

Route::group(['middleware' => [HandleCors::class]], function () {
    // Define your API routes here
    Route::get('/qrcode/{id}', [BarangController::class, 'qrcode']);
    Route::get('/barang', [BarangController::class, 'index']);
    Route::post('/barang', [BarangController::class, 'store']);
    Route::patch('/barang', [BarangController::class, 'update']);
    Route::get('/ruangan', [RuanganController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::post('/login', [LoginController::class, 'authenticate']);
    // ...
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
