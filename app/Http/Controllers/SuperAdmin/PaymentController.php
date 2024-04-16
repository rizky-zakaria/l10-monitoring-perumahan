<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Charts\Transaksi\PembayaranChart;
use App\Charts\Transaksi\TransaksiPendingChart;
use App\Charts\Transaksi\TransaksiSuccessChart;
use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends Controller
{
    public function index(TransaksiSuccessChart $transaksiSuccess, TransaksiPendingChart $transaksiPending)
    {
        $market = Transaksi::where('kategori', 'market')->where('status', 'capture')->where('created_at', 'like', '%' . date('Y-m') . '%')->sum('harga');
        $pdam = Transaksi::where('kategori', 'pdam')->where('status', 'capture')->where('created_at', 'like', '%' . date('Y-m') . '%')->sum('harga');
        $keamanan = Transaksi::where('kategori', 'keamanan')->where('status', 'capture')->where('created_at', 'like', '%' . date('Y-m') . '%')->sum('harga');
        $kebersihan = Transaksi::where('kategori', 'kebersihan')->where('status', 'capture')->where('created_at', 'like', '%' . date('Y-m') . '%')->sum('harga');
        $data = Transaksi::orderBy('created_at', 'desc')->get();
        return view('super_admin.payment.index', [
            'data' => $data,
            'market' => $market,
            'pdam' => $pdam,
            'keamanan' => $keamanan,
            'kebersihan' => $kebersihan,
            'transaksiSuccess' => $transaksiSuccess->build(),
            'transaksiPending' => $transaksiPending->build(),
        ]);
    }

    public function print($id)
    {
        $data = Transaksi::find($id);
        return view('super_admin.payment.print', [
            'data' => $data
        ]);
    }
}
