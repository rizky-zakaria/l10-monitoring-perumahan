<?php

use App\Http\Controllers\SuperAdmin\AdminController;
use App\Http\Controllers\SuperAdmin\MemberController;
use App\Http\Controllers\SuperAdmin\MonitoringController;
use App\Http\Controllers\SuperAdmin\PaymentController;
use App\Http\Controllers\SuperAdmin\PerumahanController;
use App\Http\Controllers\SuperAdmin\ProdukController;
use App\Http\Controllers\SuperAdmin\ProfileController;
use App\Http\Controllers\SuperAdmin\SliderController;
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
        Route::resource('produk', ProdukController::class);
        Route::resource('slider', SliderController::class);
        Route::get('monitoring', [MonitoringController::class, 'index']);
        Route::get('profile', [ProfileController::class, 'index']);
        Route::get('pembayaran', [PaymentController::class, 'index']);
        Route::get('pembayaran/print/{id}', [PaymentController::class, 'print']);
    });
    Route::group(['middleware' => ['role:administrator'], 'prefix' => 'admin'], function () {
        Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.home');
        Route::resource('member', App\Http\Controllers\Admin\MemberController::class);
        Route::resource('perumahan', App\Http\Controllers\Admin\PerumahanController::class);
        Route::resource('deliveri', App\Http\Controllers\Admin\DeliveriController::class);
        Route::resource('produk', App\Http\Controllers\Admin\ProdukController::class);
        Route::get('profile', [App\Http\Controllers\Admin\ProfileController::class, 'index']);
        Route::get('pembayaran', [App\Http\Controllers\Admin\PaymentController::class, 'index']);
    });
});
Route::get('transaksi/successfuly', [TransaksiController::class, 'index']);
