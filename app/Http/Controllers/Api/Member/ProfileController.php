<?php

namespace App\Http\Controllers\Api\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $data = User::join('biodatas', 'biodatas.user_id', '=', 'users.id')->first();
        return new DataResource(true, 'Successfuly', $data);
    }

    public function store(Request $request)
    {
        // return new DataResource(false, 'Gagal mengubah password', null);
        $validator = Validator::make($request->all(), [
            'password'  => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $data = User::find(Auth::user()->id);
            $data->password = Hash::make($request->password);
            // $data->update();
            return new DataResource(true, 'Berhasil mengubah password', $data);
        } catch (\Throwable $th) {
            return new DataResource(false, 'Gagal mengubah password', null);
        }
    }
}
