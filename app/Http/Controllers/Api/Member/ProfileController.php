<?php

namespace App\Http\Controllers\Api\Member;

use App\Http\Controllers\Controller;
use App\Http\Resources\DataResource;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        $data = User::join('biodatas', 'biodatas.user_id', '=', 'users.id')->first();
        return new DataResource(true, 'Successfuly', $data);
    }
}
