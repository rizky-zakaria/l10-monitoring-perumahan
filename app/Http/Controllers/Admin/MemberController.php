<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function index()
    {
        $data = User::where('role', 'member')->get();
        return view('super_admin.member.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('super_admin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'email' => 'required|email',
            'password' => 'min:8|required|string'
        ]);
        try {
            User::create([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'member'
            ]);
            toast('Berhasil menambahkan data!', 'success');
        } catch (\Throwable $th) {
            toast('Gagal menambahkan data!', 'success');
        }
        return redirect(url('su/member'));
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
        $data = User::find($id);
        return view('super_admin.member.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required|string',
            'email' => 'required|email'
        ]);

        try {
            $data = User::find($id);
            $data->name = $request->nama;
            $data->email = $request->email;
            if ($request->password) {
                $this->validate($request, [
                    'password' => 'min:8|string'
                ]);
                $data->password = Hash::make($request->password);
            }
            $data->update();
            toast('Berhasil mengubah data!', 'success');
        } catch (\Throwable $th) {
            toast('Gagal mengubah data!', 'success');
        }
        return redirect(url('su/member'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = User::find($id);
            $data->delete();
            toast('Berhasil menghapus data!', 'succes');
        } catch (\Throwable $th) {
            toast('Gagal menghapus data!', 'error');
        }

        return redirect(url('su/member'));
    }
}
