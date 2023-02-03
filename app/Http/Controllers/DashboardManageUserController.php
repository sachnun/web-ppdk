<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardManageUserController extends Controller
{
    // index
    public function index()
    {
        // exclude admin
        $users = User::where('role', '!=', 'admin')->get();
        return view('pages.manage-user.index', [
            'users' => $users,
        ]);
    }

    // create
    public function create()
    {
        return view('pages.manage-user.create');
    }

    // store
    public function store(Request $request)
    {
        $request->validate([
            'kode_pegawai' => 'required',
            'nama_lengkap' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = User::create([
            'kode_pegawai' => $request->kode_pegawai,
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect()->route('user.show', $user->id)->with('success', 'User berhasil ditambahkan');
    }

    // show
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('pages.manage-user.show', [
            'user' => $user,
        ]);
    }

    // destroy
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('user.index')->with('delete', 'User berhasil dihapus');
    }
}
