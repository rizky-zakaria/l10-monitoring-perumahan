<?php

namespace App\Http\Controllers\Api\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Biodata;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index()
    {
        $kawasan = Biodata::where('user_id', Auth::user()->id)->first();

        $data = Produk::join('markets', 'markets.id', '=', 'produks.market_id')
            ->join('gambars', 'gambars.id', '=', 'produks.gambar_id')
            ->where('markets.kawasan_id', $kawasan->kawasan_id)
            ->where('produks.kategori', 'market')
            ->where('produks.status', 'aktif')
            ->orderBy('produks.created_at', 'desc')->get(['produks.*', 'gambars.gambar']);
        return new DataResource(true, 'Successfuly', $data);
    }

    public function show($id)
    {
        $data = Produk::find($id);
        return new DataResource(true, 'Successfuly', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'  => 'required',
            'qty' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $namaProduk = [];
            $hargaProduk = [];
            $idProduk = [];

            for ($i = 0; $i < count(json_decode($request->id)); $i++) {
                $product = Produk::whereId(json_decode($request->id)[$i])->first();
                if ($product->stok < json_decode($request->qty)[$i]) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Stok ' . $product->produk . ' tidak cukup!'
                    ]);
                }
                $namaProduk[] = $product->produk;
                $hargaProduk[] = $product->harga;
            }

            $params = array(
                'transaction_details' => array(
                    'order_id' => Str::uuid(),
                    'gross_amount' => array_sum($hargaProduk)
                ),
                'item_details' => array(
                    array(
                        'price' => array_sum($hargaProduk),
                        'quantity' => 1,
                        'name' => implode(", ", $namaProduk)
                    )
                ),
                'customer_details' => array(
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email
                ),
                'enabled_payments' => array('credit_card', 'bca_va', 'bni_va', 'bri_va', 'Indomaret', 'alfamart', 'shopeepay', 'gopay')
            );

            $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

            $response = Http::withHeaders([
                'Content-type' => 'application/json',
                'Authorization' => "Basic $auth",
            ])->post('https://app.sandbox.midtrans.com/snap/v1/transactions', $params);
            $response = json_decode($response->body());

            $payment = new Transaksi();
            $payment->order_id = $params['transaction_details']['order_id'];
            $payment->status = 'pending';
            $payment->harga = array_sum($hargaProduk);
            $payment->user_id = auth()->user()->id;
            $payment->checkout_link = $response->redirect_url;
            if (Carbon::now()->subMonth()->month < 10) {
                $payment->periode = date('Y-0') . Carbon::now()->subMonth()->month;
            } else {
                $payment->periode = date('Y-') . Carbon::now()->subMonth()->month;
            }
            $payment->kategori = 'market';
            $payment->save();
            // return new DataResource(true, 'Successfuly', $payment);
            for ($i = 0; $i < count(json_decode($request->id)); $i++) {
                $transaksiDetail = new TransaksiDetail();
                $transaksiDetail->produk_id = json_decode($request->id)[$i];
                $transaksiDetail->qty = json_decode($request->qty)[$i];
                $transaksiDetail->transaksi_id = $payment->id;
                $transaksiDetail->save();
            }

            return response()->json([
                'status' => true,
                'message' => 'Berhasil mengisi database',
                'data' => $payment
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengisi database'
            ]);
        }
    }
}
