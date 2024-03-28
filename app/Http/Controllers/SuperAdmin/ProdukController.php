<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Gambar;
use App\Models\Market;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::where('kategori', 'market')->where('status', 'aktif')->get();
        $market = Market::all();
        return view('super_admin.produk.index', ['data' => $data, 'market' => $market]);
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
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        try {
            $imageName = time() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('uploads'), $imageName);

            $gambar = Gambar::create([
                'gambar' => $imageName
            ]);

            Produk::create([
                'produk' => $request->produk,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'kategori' => 'market',
                'deskripsi' => $request->deskripsi,
                'ketentuan' => '',
                'status' => 'aktif',
                'market_id' => $request->market,
                'gambar_id' => $gambar->id
            ]);
            toast('Berhasil menambahkan data', 'success');
        } catch (\Throwable $th) {
            toast('Gagal menambahkan data', 'error');
        }

        return redirect(url('su/produk'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Produk::find($id);
            $data->status = 'non-aktif';
            $data->update();
            toast('Berhasil menghapus data', 'success');
        } catch (\Throwable $th) {
            toast('Gagal menghapus data', 'error');
        }
        return redirect(url('su/produk'));
    }
}
