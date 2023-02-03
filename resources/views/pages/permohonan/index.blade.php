@extends('layouts.app')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Tinjau Permohonan</h1>
<p class="mb-4">Daftar permohonan yang telah diajukan oleh tenaga kesehatan.</p>

<div class="card border-left-warning shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-warning">Permohonan Tertunda</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Kode Pelayanan</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Pelayanan</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- foreatch --}}
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
                        <td>
                            {{-- center --}}
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('permohonan.show', $permohonan->id) }}"
                                    class="btn btn-primary btn-circle btn-sm mr-2">
                                    <i class="fas fa-info"></i>
                                </a>
                                <a href="{{ URL::SignedRoute('permohonan.terima', $permohonan->id) }}"
                                    onclick="return confirm('Apakah anda yakin ingin menerima permohonan ini?')"
                                    class="btn btn-success btn-circle btn-sm mr-2">
                                    <i class="fas fa-check"></i>
                                </a>
                                <a href="{{ URL::SignedRoute('permohonan.tolak', $permohonan->id) }}"
                                    onclick="return confirm('Apakah anda yakin ingin menolak permohonan ini?')"
                                    class="btn btn-danger btn-circle btn-sm mr-2">
                                    <i class="fas fa-xmark"></i>
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