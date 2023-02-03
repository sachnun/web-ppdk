<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class DashboardPermohonanController extends Controller
{
    // index
    public function index()
    {
        // filter status "Tertunda", order by newest (tanggal_pengajuan)
        $permohonans = Permohonan::where('status', 'Tertunda')->orderBy('tanggal_pengajuan', 'desc')->get();
        return view('pages.permohonan.index', [
            'permohonans' => $permohonans,
        ]);
    }

    // aksi diterima
    public function diterima($id)
    {
        // get permohonan
        $permohonan = Permohonan::findOrFail($id);
        // update status
        $permohonan->update([
            'status' => 'Diterima',
            'tanggal_peninjauan' => date('Y-m-d'),
        ]);
        // redirect
        return redirect()->route('permohonan.show', $id)->with('success', 'Permohonan berhasil diterima');
    }

    // aksi ditolak
    public function ditolak($id)
    {
        // get permohonan
        $permohonan = Permohonan::findOrFail($id);
        // update status
        $permohonan->update([
            'status' => 'Ditolak',
            'tanggal_peninjauan' => date('Y-m-d'),
        ]);
        // redirect
        return redirect()->route('permohonan.show', $id)->with('success', 'Permohonan berhasil ditolak');
    }
}
