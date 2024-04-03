<?php

namespace App\Http\Controllers\Api\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Deliveri;
use App\Models\Keranjang;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Deliveri::join('transaksis', 'transaksis.id', '=', 'deliveris.transaksi_id')
            ->where('deliveris.user_id', Auth::user()->id)
            ->get(['deliveris.*', 'transaksis.checkout_link', 'transaksis.harga', 'transaksis.order_id']);
        return new DataResource(true, 'Successfuly', $data);
    }

    public function show($id)
    {
        $data = Deliveri::join('transaksis', 'transaksis.id', '=', 'deliveris.transaksi_id')
            ->where('deliveris.user_id', Auth::user()->id)
            ->where('deliveris.transaksi_id', $id)
            ->first(['deliveris.*', 'transaksis.checkout_link', 'transaksis.harga', 'transaksis.order_id']);
        return new DataResource(true, 'Successfuly', $data);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'confirmation'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $harga = [];

            $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
            foreach ($keranjang as $item) {
                $harga[] = $item->harga;
            }
            // return new DataResource(true, 'Successfuly', array_sum($harga));

            $params = array(
                'transaction_details' => array(
                    'order_id' => Str::uuid(),
                    'gross_amount' => array_sum($harga)
                ),
                'item_details' => array(
                    array(
                        'price' => array_sum($harga),
                        'quantity' => 1,
                        'name' => 'Paket Belanja Harian'
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
            ])->post('https://app.midtrans.com/snap/v1/transactions', $params);

            $response = json_decode($response->body());

            $payment = new Transaksi();
            $payment->order_id = $params['transaction_details']['order_id'];
            $payment->status = 'pending';
            $payment->harga = array_sum($harga);
            $payment->user_id = auth()->user()->id;
            $payment->checkout_link = $response->redirect_url;
            $payment->periode = date('Y-m');
            $payment->kategori = 'market';
            $payment->save();

            $deliveri = Deliveri::create([
                'transaksi_id' => $payment->id,
                'user_id' => Auth::user()->id,
                'status' => 'market'
            ]);


            $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
            foreach ($keranjang as $item) {
                $produk = Produk::find($item->produk_id);
                $produk->stok = $produk->stok - $item->qty;
                $produk->update();
                $td = TransaksiDetail::create([
                    'produk_id' => $item->produk_id,
                    'qty' => $item->qty,
                    'transaksi_id' => $payment->id
                ]);
                $delKeranjang = Keranjang::find($item->id);
                $delKeranjang->delete();
            }

            return new DataResource(true, 'Successfuly', $payment);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengisi database'
            ]);
        }
    }

    public function storeTunai(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'confirmation'    => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $harga = [];

            $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
            foreach ($keranjang as $item) {
                $harga[] = $item->harga;
            }

            $payment = new Transaksi();
            $payment->order_id = Uuid::uuid4();
            $payment->status = 'pending';
            $payment->harga = array_sum($harga);
            $payment->user_id = auth()->user()->id;
            $payment->checkout_link = 'cod';
            $payment->periode = date('Y-m');
            $payment->kategori = 'market';
            $payment->save();

            $deliveri = Deliveri::create([
                'transaksi_id' => $payment->id,
                'user_id' => Auth::user()->id,
                'status' => 'market'
            ]);


            $keranjang = Keranjang::where('user_id', Auth::user()->id)->get();
            foreach ($keranjang as $item) {
                $produk = Produk::find($item->produk_id);
                $produk->stok = $produk->stok - $item->qty;
                $produk->update();
                $td = TransaksiDetail::create([
                    'produk_id' => $item->produk_id,
                    'qty' => $item->qty,
                    'transaksi_id' => $payment->id
                ]);
                $delKeranjang = Keranjang::find($item->id);
                $delKeranjang->delete();
            }

            return new DataResource(true, 'Successfuly', $payment);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal mengisi database'
            ]);
        }
    }

    public function webhook(Request $request)
    {
        $auth = base64_encode(env('MIDTRANS_SERVER_KEY'));

        $response = Http::withHeaders([
            'Content-type' => 'application/json',
            'Authorization' => "Basic $auth",
        ])->get("https://api.sandbox.midtrans.com/v2/$request->order_id/status");

        $response = json_decode($response->body());

        $payment = Transaksi::where('order_id', $response->order_id)->firstOrFail();

        if ($payment->status == 'settlement' || $payment->status == 'capture') {
            return response()->json('Payment has been already processed');
        }

        if ($response->transaction_status == 'capture') {
            $payment->status = 'capture';
        } elseif ($response->transaction_status == 'settlement') {
            $payment->status = 'settlement';
        } elseif ($response->transaction_status == 'pending') {
            $payment->status = 'pending';
        } elseif ($response->transaction_status == 'deny') {
            $payment->status = 'deny';
        } elseif ($response->transaction_status == 'expire') {
            $payment->status = 'expire';
        } elseif ($response->transaction_status == 'cancel') {
            $payment->status = 'cancel';
        }

        $payment->update();
        // return response()->json('success');
        return redirect(url('https://4124-2001-448a-7063-2dfb-a8cb-c1b9-83e1-aa9e.ngrok-free.app/transaksi/successfuly'));
    }
}
