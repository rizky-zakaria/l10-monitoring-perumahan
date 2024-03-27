<?php

use App\Http\Controllers\Api\Member\DeliveriController;
use App\Http\Controllers\Api\Member\KeamananController;
use App\Http\Controllers\Api\Member\KebersihanController;
use App\Http\Controllers\Api\Member\KeranjangController;
use App\Http\Controllers\Api\Member\PdamController;
use App\Http\Controllers\Api\Member\ProdukController;
use App\Http\Controllers\Api\Member\ProfileController;
use App\Http\Controllers\Api\Member\TransaksiController;
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

Route::prefix('member')->group(function () {
    Route::post('/login', [App\Http\Controllers\Api\Member\LoginController::class, 'index']);
    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('produk/terlaris', [ProdukController::class, 'terlaris']);
        Route::resource('keamanan', KeamananController::class)->except(['create', 'edit', 'destroy']);
        Route::resource('kebersihan', KebersihanController::class)->except(['create', 'edit', 'destroy']);
        Route::resource('pdam', PdamController::class)->except(['create', 'edit', 'destroy']);
        Route::resource('produk', ProdukController::class)->except(['create', 'edit', 'destroy']);
        Route::resource('keranjang', KeranjangController::class)->except(['create', 'edit', 'update']);
        Route::resource('profile', ProfileController::class)->except(['create', 'edit', 'destroy', 'show', 'update']);
        Route::get('deliveri/{id}', [DeliveriController::class, 'show']);
        Route::get('transaksi', [TransaksiController::class, 'index']);
        Route::post('transaksi', [TransaksiController::class, 'store']);
        Route::get('transaksi/{id}', [TransaksiController::class, 'show']);
        Route::post('/logout', [App\Http\Controllers\Api\Member\LoginController::class, 'logout']);
    });
    Route::post('transaksis/webhook', [TransaksiController::class, 'webhook']);
});
