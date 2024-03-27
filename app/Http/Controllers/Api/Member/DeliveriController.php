<?php

namespace App\Http\Controllers\Api\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\Deliveri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveriController extends Controller
{
    public function show($id)
    {
        $data = Deliveri::join('transaksis', 'transaksis.id', '=', 'deliveris.transaksi_id')
            ->where('deliveris.user_id', Auth::user()->id)
            ->where('deliveris.transaksi_id', $id)
            ->first(['transaksis.order_id', 'deliveris.*']);
        return new DataResource(true, 'Successfuly', $data);
    }
}
