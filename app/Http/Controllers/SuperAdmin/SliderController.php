<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Slider::all();
        return view('super_admin.slider.index');
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
            'gambar' => ''
        ]);

        try {
            Slider::create([
                'gambar' => ''
            ]);
            toast('Berhasil menambahkan data', 'success');
        } catch (\Throwable $th) {
            toast('Gagal menambahkan data', 'error');
        }

        return redirect(url('su/slider'));
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
            $data = Slider::find($id);
            $data->delete();
            toast('Berhasil menghapus data', 'success');
        } catch (\Throwable $th) {
            toast('Gagal menghapus data', 'error');
        }
        return redirect(url('su/slider'));
    }
}
