<?php

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
        Route::post('/logout', [App\Http\Controllers\Api\Member\LoginController::class, 'logout']);
    });
});
