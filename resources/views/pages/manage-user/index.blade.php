@extends('layouts.app')
@section('content')
<div class="row d-flex justify-content-center">
    <div class="col-12 col-sm-9">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Manage User</h1>
            <a href="{{ route('user.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Tambah</span>
            </a>
        </div>

        {{-- alert error --}}
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="card border-left-primary shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Kode Pegawai</th>
                                <th>Nama Lengkap</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- foreatch --}}
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->kode_pegawai }}</td>
                                <td>{{ $user->nama_lengkap }}</td>
                                <td>{{ $user->username }}</td>
                                <td>
                                    {{-- center --}}
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('user.show', $user->id) }}"
                                            class="btn btn-primary btn-circle btn-sm mr-2">
                                            <i class="fas fa-info"></i>
                                        </a>
                                        {{-- destroy --}}
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-circle btn-sm"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            {{-- endforeatch --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection