<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // login
    public function login()
    {
        return view('auth.login');
    }

    // authentification
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'username' => 'Username salah',
            'password' => 'Password salah',
        ])->onlyInput('username');
    }

    // index
    public function index()
    {
        // get database, and just today, order by newest
        $permohonans = Permohonan::whereDate('created_at', date('Y-m-d'))->orderBy('tanggal_pengajuan', 'desc')->get();
        $total = [
            'permohonan' => Permohonan::count(),
            'tertunda' => $permohonans->where('status', 'Tertunda')->count(),
            'diterima' => $permohonans->where('status', 'Diterima')->count(),
            'ditolak' => $permohonans->where('status', 'Ditolak')->count(),
        ];
        return view('home', [
            // filter status "Tertunda"
            'permohonans' => $permohonans->where('status', 'Tertunda')->all(),
            'total' => $total,
        ]);
    }
}
