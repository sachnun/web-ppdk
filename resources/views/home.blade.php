@extends('layouts.app')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Statistik Permohonan</h1>
</div>
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-secondary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                            Tanggal
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{-- date now --}}
                            {{ date('d/m/Y') }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Permohonan
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $total['permohonan'] }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Permohonan Tertunda
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    {{ $total['tertunda'] }}
                                </div>
                            </div>
                            <div class="col">
                                @php
                                $tertunda = $total['tertunda'];
                                $permohonan = $total['permohonan'];
                                // anti division by zero
                                $persen = ($permohonan == 0) ? 0 : ($tertunda / $permohonan) * 100;
                                @endphp
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-warning" role="progressbar"
                                        style="width: {{ $persen }}%" aria-valuenow="{{ $persen }}" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-tag fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Permohonan Diterima
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                    {{ $total['diterima'] }}
                                </div>
                            </div>
                            <div class="col">
                                @php
                                $diterima = $total['diterima'];
                                $permohonan = $total['permohonan'];
                                // anti division by zero
                                $persen = ($permohonan == 0) ? 0 : ($diterima / $permohonan) * 100;
                                @endphp
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-success" role="progressbar"
                                        style="width: {{ $persen }}%" aria-valuenow="{{ $persen }}" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card border-left-warning shadow mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-warning">Permohonan Tertunda</h6>
        <a href="{{ route('permohonan') }}" class="btn btn-warning btn-icon-split btn-sm">
            <span class="icon text-white-50">
                <i class="fas fa-check-to-slot"></i>
            </span>
            <span class="text">Tinjau Permohonan</span>
        </a>
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
                        <td>{{ $permohonan->created_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection