<?php

namespace App\Http\Controllers;

use App\Models\Permohonan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'jenis_pelayanan' => 'required',
            'jenis_profesi' => 'required',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'lulusan' => 'required',
            'nomor_str' => 'required',
            'tempat_bekerja_sebelumnya' => 'required',
            'alamat_rumah' => 'required',
            'nomor_hp' => 'required',
        ]);

        // create random kode pelayanan
        // example: 1234A98K432CXEE
        $kode_pelayanan = '';
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        for ($i = 0; $i < 16; $i++) {
            $kode_pelayanan .= $characters[rand(0, $charactersLength - 1)];
        }

        Permohonan::create([
            'tanggal_pengajuan' => now(),
            'kode_pelayanan' => $kode_pelayanan,
            'jenis_pelayanan' => $request->jenis_pelayanan,
            'jenis_profesi' => $request->jenis_profesi,
            'nama_lengkap' => $request->nama_lengkap,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'lulusan' => $request->lulusan,
            'nomor_str' => $request->nomor_str,
            'tempat_bekerja_sebelumnya' => $request->tempat_bekerja_sebelumnya,
            'alamat_rumah' => $request->alamat_rumah,
            'nomor_hp' => $request->nomor_hp,
        ]);

        return redirect()->route('permohonan.form')
            ->with('kode_pelayanan', $kode_pelayanan);
    }
}
