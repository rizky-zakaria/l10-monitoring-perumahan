<?php

use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\MemberController;
use App\Http\Controllers\SuperAdmin\MonitoringController;
use App\Http\Controllers\SuperAdmin\PaymentController;
use App\Http\Controllers\SuperAdmin\PerumahanController;
use App\Http\Controllers\SuperAdmin\ProfileController;
use App\Http\Controllers\Web\TransaksiController;
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

Route::get('/', function () {
    return redirect(url('login'));
});

Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::group(['middleware' => ['role:super_administrator'], 'prefix' => 'su'], function () {
        Route::get('/home', [App\Http\Controllers\SuperAdmin\HomeController::class, 'index'])->name('su.home');
        Route::resource('member', MemberController::class);
        Route::resource('administrator', AdminController::class);
        Route::resource('perumahan', PerumahanController::class);
        Route::get('monitoring', [MonitoringController::class, 'index']);
        Route::get('profile', [ProfileController::class, 'index']);
        Route::get('pembayaran', [PaymentController::class, 'index']);
    });
    Route::group(['middleware' => ['role:administrator'], 'prefix' => 'admin'], function () {
        Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
    });
});
Route::get('transaksi/successfuly', [TransaksiController::class, 'index']);
