<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penganjuan Permohonan - PPDK</title>

    <!-- Custom fonts for this template-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8">
                <h1 class="h3 mb-2 text-white">Pengajuan Permohonan</h1>
                <p class="mb-4 text-white-50">Silahkan isi form berikut untuk mengajukan permohonan</p>

                @if (session('kode_pelayanan'))
                <div class="card mb-4 border-left-success">
                    <div class="card-body">
                        <p>Pengajuan permohonan baru berhasil, berikut adalah kode pelayanan anda:</p>
                        <h4>{{ session('kode_pelayanan') }}121313</h4>
                        <p class="small">Simpan kode pelayanan anda untuk mendapatkan surat rekomendasi di dinas.</p>
                    </div>
                </div>
                @else

                <div class="card shadow mb-4">

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

                    <div class="card-body">
                        <form action="{{ route('permohonan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Pelayanan</label>
                                            <input type="text" class="form-control" name="jenis_pelayanan"
                                                value="{{ old('jenis_pelayanan') }}" required>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">Jenis Profesi</label>
                                            <input type="text" class="form-control" name="jenis_profesi"
                                                value="{{ old('jenis_profesi') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-2">
                                    <hr>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap"
                                        value="{{ old('nama_lengkap') }}" required>
                                </div>
                                <div class="row">
                                    <div class="col-5">
                                        <div class="mb-3">
                                            <label class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir"
                                                value="{{ old('tempat_lahir') }}" required>
                                        </div>
                                    </div>
                                    <div class="col-7">
                                        <div class="mb-3">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tanggal_lahir"
                                                value="{{ old('tanggal_lahir') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" required>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Lulusan</label>
                                    <input type="date" class="form-control" name="lulusan" value="{{ old('lulusan') }}"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nomor STR</label>
                                    <input type="text" class="form-control" name="nomor_str"
                                        value="{{ old('nomor_str') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tempat Bekerja Sebelumnya</label>
                                    <textarea class="form-control" name="tempat_bekerja_sebelumnya"
                                        required>{{ old('tempat_bekerja_sebelumnya') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat Rumah</label>
                                    <textarea class="form-control" name="alamat_rumah"
                                        required>{{ old('alamat_rumah') }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nomor Telepon</label>
                                    <input type="tel" class="form-control" name="nomor_hp" value="{{ old('nomor_hp') }}"
                                        required>
                                </div>
                                <div class="float-right mt-3">
                                    <button class="btn btn-primary btn-icon-split" type="submit">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-paper-plane"></i>
                                        </span>
                                        <span class="text">Kirimkan</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                @endif
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('js/jquery.easing.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('js/sb-admin-2.js') }}"></script>

</body>

</html>