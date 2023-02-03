@extends('layouts.app')
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-12 col-sm-8">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Profile User</h1>
        </div>

        {{-- alert success --}}
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-8">
                        <div class="mb-3">
                            <label class="form-label">Kode Pegawai</label>
                            <input type="text" class="form-control bg-white" readonly value="{{ $user->kode_pegawai }}">
                        </div>
                    </div>
                    <div class="col-12 col-sm-4">
                        <div class="mb-3">
                            <label class="form-label">Role</label>
                            <input type="text" class="form-control bg-white" readonly
                                value="{{ ucfirst($user->role) }}">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control bg-white" readonly value="{{ $user->nama_lengkap }}">
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control bg-white" readonly value="{{ $user->username }}">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" class="form-control" readonly value="{{ $user->password }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection