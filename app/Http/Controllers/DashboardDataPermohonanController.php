<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class DashboardDataPermohonanController extends Controller
{

    public function show($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        return view('pages.permohonan.show', [
            'permohonan' => $permohonan,
        ]);
    }

    // index diterima
    public function indexDiterima()
    {
        // filter status "Diterima", order by by newest (tanggal pengajuan)
        $permohonans = Permohonan::where('status', 'Diterima')->orderBy('tanggal_pengajuan', 'desc')->get();
        return view('pages.data-permohonan.index-diterima', [
            'permohonans' => $permohonans,
        ]);
    }

    // index ditolak
    public function indexDitolak()
    {
        // filter status "Ditolak", order by by newest (tanggal peninjauan)
        $permohonans = Permohonan::where('status', 'Ditolak')->orderBy('tanggal_peninjauan', 'desc')->get();
        return view('pages.data-permohonan.index-ditolak', [
            'permohonans' => $permohonans,
        ]);
    }

    // index tertunda
    public function indexTertunda()
    {
        // filter status "Tertunda", order by newest (tanggal pengajuan)
        $permohonans = Permohonan::where('status', 'Tertunda')->orderBy('tanggal_pengajuan', 'desc')->get();
        return view('pages.data-permohonan.index-tertunda', [
            'permohonans' => $permohonans,
        ]);
    }

    // surat permohonan
    public function surat($id)
    {
        $permohonan = Permohonan::findOrFail($id);

        // check status
        if ($permohonan->status != 'Diterima') {
            return redirect()->route('permohonan.show', $permohonan->id)->with('error', 'Surat permohonan hanya dapat diunduh jika permohonan telah diterima.');
        }

        return view('surat', [
            'permohonan' => $permohonan,
        ]);
    }
}
