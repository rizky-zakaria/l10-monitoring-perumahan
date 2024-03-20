<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $data = Transaksi::join('users', 'users.id', '=', 'transaksis.user_id')
            ->join('produks', 'produks.id', '=', 'transaksis.produk_id')
            ->orderBy('transaksis.created_at', 'desc')
            ->get(['transaksis.*', 'users.name', 'produks.produk', 'produks.kategori']);
        return view('super_admin.payment.index', [
            'data' => $data
        ]);
    }
}
