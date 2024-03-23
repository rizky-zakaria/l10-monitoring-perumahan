<?php

namespace App\Http\Controllers\Api\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KeranjangController extends Controller
{
    public function index()
    {
        $data = Keranjang::join('produks', 'produks.id', '=', 'keranjangs.produk_id')
            ->join('gambars', 'produks.gambar_id', '=', 'gambars.id')
            ->where('keranjangs.user_id', Auth::user()->id)
            ->get(['keranjangs.*', 'produks.produk', 'gambars.gambar']);
        return new DataResource(true, 'Successfuly', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'required',
            'qty' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $produk = Produk::find($request->id);
        $data = Keranjang::create([
            'harga' => $produk->harga * $request->qty,
            'produk_id' => $request->id,
            'user_id' => Auth::user()->id,
            'qty' => $request->qty
        ]);

        return new DataResource(true, 'Successfuly', $data);
    }
}
