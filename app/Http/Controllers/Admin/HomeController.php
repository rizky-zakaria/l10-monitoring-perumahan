<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->email == 'kawasan1@gmail.com') {
            $kawasan = 1;
        } elseif (Auth::user()->email == 'kawasan2@gmail.com') {
            $kawasan = 2;
        } else {
            $kawasan = 3;
        }
        $market = Transaksi::join('users', 'users.id', '=', 'transaksis.user_id')
            ->join('biodatas', 'biodatas.user_id', '=', 'users.id')
            ->where('biodatas.kawasan_id', $kawasan)
            ->where('transaksis.kategori', 'market')
            ->where('transaksis.status', 'capture')->where('transaksis.created_at', 'like', '%' . date('Y-m') . '%')->sum('harga');
        $pdam = Transaksi::join('users', 'users.id', '=', 'transaksis.user_id')
            ->join('biodatas', 'biodatas.user_id', '=', 'users.id')
            ->where('biodatas.kawasan_id')
            ->where('transaksis.kategori', 'pdam')->where('transaksis.status', 'capture')->where('transaksis.created_at', 'like', '%' . date('Y-m') . '%')->sum('harga');
        $keamanan = Transaksi::join('users', 'users.id', '=', 'transaksis.user_id')
            ->join('biodatas', 'biodatas.user_id', '=', 'users.id')
            ->where('biodatas.kawasan_id')
            ->where('transaksis.kategori', 'keamanan')->where('transaksis.status', 'capture')->where('transaksis.created_at', 'like', '%' . date('Y-m') . '%')->sum('harga');
        $kebersihan = Transaksi::join('users', 'users.id', '=', 'transaksis.user_id')
            ->join('biodatas', 'biodatas.user_id', '=', 'users.id')
            ->where('biodatas.kawasan_id')
            ->where('transaksis.kategori', 'kebersihan')->where('transaksis.status', 'capture')->where('transaksis.created_at', 'like', '%' . date('Y-m') . '%')->sum('harga');
        return view('admin.home.index', [
            'market' => $market,
            'pdam' => $pdam,
            'keamanan' => $keamanan,
            'kebersihan' => $kebersihan
        ]);
    }
}
