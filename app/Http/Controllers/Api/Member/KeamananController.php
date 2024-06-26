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

class KeamananController extends Controller
{
    public function index()
    {
        $data = Transaksi::join('transaksi_details', 'transaksi_details.transaksi_id', '=', 'transaksis.id')
            ->join('produks', 'produks.id', '=', 'transaksi_details.produk_id')
            ->where('transaksis.user_id', Auth::user()->id)
            ->where('produks.kategori', 'keamanan')
            ->where('transaksis.status', 'capture')
            ->orderBy('transaksis.created_at', 'desc')
            ->get();
        return new DataResource(true, 'Successfuly', $data);
    }

    public function show($id)
    {
        if (Carbon::now()->subMonth()->month == 12) {
            $periode = Carbon::now()->subYear()->year . '-' . Carbon::now()->subMonth()->month;
            $transaksi = Transaksi::where('user_id', Auth::user()->id)
                ->where('kategori', 'keamanan')
                ->where('periode', $periode)
                ->where('status', 'capture')
                ->first();
        } else {
            if (Carbon::now()->subMonth()->month < 10) {
                $periode = date('Y') . '-0' . Carbon::now()->subMonth()->month;
            } else {
                $periode = date('Y') . '-' . Carbon::now()->subMonth()->month;
            }
            $transaksi = Transaksi::join('transaksi_details', 'transaksi_details.transaksi_id', '=', 'transaksis.id')
                ->join('produks', 'produks.id', '=', 'transaksi_details.produk_id')
                ->where('transaksis.user_id', Auth::user()->id)
                ->where('produks.kategori', 'keamanan')
                ->where('transaksis.periode', $periode)
                ->where('transaksis.status', 'capture')
                ->first(['transaksis.id']);
        }

        if ($transaksi != null) {
            return new DataResource(false, 'Tidak ada tagihan saat ini.', null);
        }
        $data = Produk::find($id);
        return new DataResource(true, 'Successfuly', $data);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id'     => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $product = Produk::whereId($request->id)->first();

            if ($product->stok < $request->qty) {
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal mendapatkan data'
                ]);
            }

            $params = array(
                'transaction_details' => array(
                    'order_id' => Str::uuid(),
                    'gross_amount' => $product->harga
                ),
                'item_details' => array(
                    array(
                        'price' => $product->harga,
                        'quantity' => 1,
                        'name' => $product->produk
                    )
                ),
                'customer_details' => array(
                    'first_name' => Auth::user()->name,
                    'email' => Auth::user()->email
                ),
                'enabled_payments' => array('credit_card', 'bca_va', 'bni_va', 'bri_va', 'indomaret', 'alfamart', 'shopeepay', 'gopay')
            );

            $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

            $response = Http::withHeaders([
                'Content-type' => 'application/json',
                'Authorization' => "Basic $auth",
            ])->post('https://app.midtrans.com/snap/v1/transactions', $params);

            $response = json_decode($response->body());

            $payment = new Transaksi();
            $payment->order_id = $params['transaction_details']['order_id'];
            $payment->status = 'pending';
            $payment->harga = $product->harga;
            $payment->user_id = auth()->user()->id;
            $payment->checkout_link = $response->redirect_url;
            if (Carbon::now()->subMonth()->month < 10) {
                $payment->periode = date('Y-0') . Carbon::now()->subMonth()->month;
            } else {
                $payment->periode = date('Y-') . Carbon::now()->subMonth()->month;
            }
            $payment->kategori = 'keamanan';
            $payment->save();

            $transaksiDetail = new TransaksiDetail();
            $transaksiDetail->produk_id = $request->id;
            $transaksiDetail->qty = 1;
            $transaksiDetail->transaksi_id = $payment->id;
            $transaksiDetail->save();

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
