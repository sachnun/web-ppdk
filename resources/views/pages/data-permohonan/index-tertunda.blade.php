@extends('layouts.app')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Permohonan Tertunda</h1>
<p class="mb-4">Daftar permohonan yang masih dalam proses peninjauan.</p>

<div class="card border-left-warning shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Pelayanan</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Pelayanan</th>
                        <th>Tanggal Pengajuan</th>
                        <th class="text-warning">
                            Tanggal Peninjauan
                        </th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- foreach --}}
                    @foreach ($permohonans as $permohonan)
                    <tr>
                        <td>
                            <a href="{{ route('permohonan.show', $permohonan->id) }}"
                                class="text-dark text-decoration-none">
                                <b>{{ $permohonan->kode_pelayanan }}</b>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('permohonan.show', $permohonan->id) }}"
                                class="text-dark text-decoration-none">
                                {{ $permohonan->nama_lengkap }}
                            </a>
                        </td>
                        <td>{{ $permohonan->jenis_pelayanan }}</td>
                        <td>{{ $permohonan->tanggal_pengajuan }}</td>
                        <td class="text-warning">
                            Belum ditinjau
                        </td>
                        <td>
                            {{-- center --}}
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('permohonan.show', $permohonan->id) }}"
                                    class="btn btn-primary btn-circle btn-sm mr-2">
                                    <i class="fas fa-info"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection