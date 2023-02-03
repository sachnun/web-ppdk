@extends('layouts.app')
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-12 col-sm-8">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Create User</h1>
            <button class="btn btn-success btn-icon-split" type="submit" form="form-create-user">
                <span class="icon text-white-50">
                    <i class="fas fa-floppy-disk"></i>
                </span>
                <span class="text">Simpan</span>
            </button>
        </div>

        {{-- validation alert --}}
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="POST" id="form-create-user">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-8">
                            <div class="mb-3">
                                <label class="form-label">Kode Pegawai</label>
                                <input type="text" class="form-control" name="kode_pegawai"
                                    value="{{ old('kode_pegawai') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="mb-3">
                                <label class="form-label">Role</label>
                                <input type="text" class="form-control" value="Pegawai" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="text" class="form-control" name="password" value="{{ old('password') }}">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection