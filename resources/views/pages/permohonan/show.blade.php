@extends('layouts.app')
@section('content')
<h1 class="h3 mb-2 text-gray-800">Data Permohonan</h1>
<p class="mb-4">Detail lengkap data permohonan yang telah diajukan.</p>


{{-- error alert --}}
@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> {{ session('error') }}
</div>
@endif

<div class="row">
    <div class="col-12 col-sm-8">
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Kode Pelayanan</label>
                    <input type="text" class="form-control bg-white" readonly value="{{ $permohonan->kode_pelayanan }}">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Jenis Pelayanan</label>
                            <input type="text" class="form-control bg-white" readonly
                                value="{{ $permohonan->jenis_pelayanan }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Jenis Profesi</label>
                            <input type="text" class="form-control bg-white" readonly
                                value="{{ $permohonan->jenis_profesi }}">
                        </div>
                    </div>
                </div>
                <div>
                    <label class="form-label">Tanggal Pengajuan</label>
                    <input type="datetime" class="form-control bg-white" readonly value="{{ $permohonan->created_at }}">
                </div>
                <div class="py-2">
                    <hr>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control bg-white" readonly value="{{ $permohonan->nama_lengkap }}">
                </div>
                <div class="row">
                    <div class="col-5">
                        <div class="mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control bg-white" readonly
                                value="{{ $permohonan->tempat_lahir }}">
                        </div>
                    </div>
                    <div class="col-7">
                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control bg-white" readonly
                                value="{{ $permohonan->tanggal_lahir }}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <input type="text" class="form-control bg-white" readonly value="{{ $permohonan->jenis_kelamin }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Lulusan</label>
                    <input type="date" class="form-control bg-white" readonly value="{{ $permohonan->lulusan }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor STR</label>
                    <input type="text" class="form-control bg-white" readonly value="{{ $permohonan->nomor_str }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tempat Bekerja Sebelumnya</label>
                    <textarea class="form-control bg-white"
                        readonly>{{ $permohonan->tempat_bekerja_sebelumnya }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat Rumah</label>
                    <textarea class="form-control bg-white" readonly>{{ $permohonan->alamat_rumah }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Telepon</label>
                    <input type="tel" class="form-control bg-white" readonly value="{{ $permohonan->nomor_hp }}">
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button"
                aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary">Tinjauan</h6>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample" style="">
                <div class="card-body">
                    @if ($permohonan->status == 'Tertunda')
                    <div class="row d-flex justify-content-center">
                        <a href="{{ URL::SignedRoute('permohonan.terima', $permohonan->id) }}"
                            onclick=" return confirm('Apakah anda yakin ingin menyetujui permohonan ini?')"
                            class=" btn btn-success btn-icon-split btn-lg mr-2">
                            <span class="icon text-white">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text">Setujui</span>
                        </a>
                        <a href="{{ URL::SignedRoute('permohonan.tolak', $permohonan->id) }}"
                            onclick="return confirm('Apakah anda yakin ingin menolak permohonan ini?')"
                            class=" btn btn-danger btn-icon-split btn-lg mr-2">
                            <span class="icon text-white">
                                <i class="fas fa-xmark"></i>
                            </span>
                            <span class="text">Tolak</span>
                        </a>
                    </div>
                    @endif

                    @if ($permohonan->status == 'Diterima')
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            Telah Disetujui
                            <div class="text-white small">
                                {{ $permohonan->tanggal_peninjauan }}
                            </div>
                        </div>
                    </div>
                    @endif

                    @if ($permohonan->status == 'Ditolak')
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            Telah Ditolak
                            <div class="text-white small">
                                {{ $permohonan->tanggal_peninjauan }}
                            </div>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>

        @if ($permohonan->status == 'Diterima')
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">
                    Surat Rekomendasi
                </h6>
            </div>
            <div class="card-body">
                <a href="{{ route('permohonan.surat', $permohonan->id) }}" target="_blank"
                    class="btn btn-primary btn-icon-split">
                    <span class="icon text-white">
                        <i class="fas fa-print"></i>
                    </span>
                    <span class="text">Print</span>
                </a>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection