<?php

namespace App\Http\Controllers\Api\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Produk;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KebersihanController extends Controller
{
    public function index()
    {
        $data = Transaksi::where('user_id')->orderBy('created_at', 'desc')->get();
        return new DataResource(true, 'Successfuly', $data);
    }

    public function show($id)
    {
        if (Carbon::now()->subMonth()->month == 12) {
            $periode = date('Y') . '-' . Carbon::now()->subMonth()->month;
            $transaksi = Transaksi::where('user_id', Auth::user()->id)
                ->where('kategori', 'kebersihan')
                ->where('periode', $periode)
                ->where('status', 'capture')
                ->first();
        } else {
            if (Carbon::now()->subMonth()->month < 10) {
                $periode = Carbon::now()->subYear()->year . '-0' . Carbon::now()->subMonth()->month;
            } else {
                $periode = Carbon::now()->subYear()->year . '-' . Carbon::now()->subMonth()->month;
            }
            $transaksi = Transaksi::where('user_id', Auth::user()->id)
                ->where('kategori', 'kebersihan')
                ->where('periode', $periode)
                ->where('status', 'capture')
                ->first();
        }
        if (count($transaksi) > 0) {
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
            $payment->harga = $product->harga;
            $payment->user_id = auth()->user()->id;
            $payment->produk_id = $request->id;
            $payment->checkout_link = $response->redirect_url;
            $payment->qty = 1;
            $payment->periode = date('Y-m');
            $payment->save();

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
