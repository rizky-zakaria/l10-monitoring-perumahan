<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Deliveri;
use Illuminate\Http\Request;

class DeliveriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Deliveri::join('transaksis', 'transaksis.id', '=', 'deliveris.transaksi_id')
            ->join('users', 'users.id', '=', 'deliveris.user_id')
            ->where('transaksis.status', 'capture')
            ->orWhere('transaksis.checkout_link', 'cod')
            ->orderBy('deliveris.created_at', 'desc')
            ->get(['deliveris.*', 'transaksis.checkout_link', 'transaksis.order_id', 'users.name']);

        return view('admin.deliveri.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Deliveri $deliveri)
    {
        dd($deliveri);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Deliveri $deliveri)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Deliveri $deliveri)
    {
        $this->validate($request, [
            'status' => 'required'
        ]);
        try {
            // $data = Deliveri::find($deliveri);
            $deliveri->status = $request->status;
            $deliveri->update();

            toast('Berhasil mengubah status', 'success');
        } catch (\Throwable $th) {
            toast('Gagal mengubah status', 'error');
        }

        return redirect(url('admin/deliveri'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Deliveri $deliveri)
    {
        //
    }
}
