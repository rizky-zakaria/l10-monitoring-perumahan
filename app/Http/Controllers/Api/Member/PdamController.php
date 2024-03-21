<?php

namespace App\Http\Controllers\Api\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Produk;
use Illuminate\Http\Request;

class PdamController extends Controller
{
    public function index()
    {
        $data = Produk::where('kategori', 'pdam')
            ->orderBy('created_at', 'desc')->get();
        return new DataResource(true, 'Successfuly', $data);
    }

    public function show($id)
    {
        $data = Produk::find($id);
        return new DataResource(true, 'Successfuly', $data);
    }
}
