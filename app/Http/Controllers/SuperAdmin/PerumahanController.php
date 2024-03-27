<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Kawasan;
use App\Models\Perumahan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PerumahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Perumahan::join('kawasans', 'kawasans.id', '=', 'perumahans.kawasan_id')
            ->get(['perumahans.*', 'kawasans.kawasan']);
        return view('super_admin.perumahan.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kawasan = Kawasan::where('alamat', '!=', 'Global')->get();
        return view('super_admin.perumahan.create', [
            'kawasan' => $kawasan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nomor_rumah' => 'required',
            'tipe' => 'required',
            'kawasan' => 'required',
            'status' => 'required',
        ]);

        try {
            Perumahan::create([
                'nomor_rumah' => $request->nomor_rumah,
                'tipe' => $request->tipe,
                'kawasan_id' => $request->kawasan,
                'status' => $request->status,
            ]);
            toast('Berhasil Menambahkan Data!', 'success');
            return redirect()->back();
        } catch (\Throwable $th) {
            toast('Gagal Menambahkan Data!', 'error');
            return redirect()->back();
        }
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
        //
    }
}
