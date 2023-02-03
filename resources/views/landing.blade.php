<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PPDK</title>

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

    <div class="mx-auto" style="margin-top: 10%">
        <div class="text-center text-white mb-5">
            <h2>Selamat Datang di Sistem Informasi</h2>
            <h1>Portal Pelayanan Dinas Kesehatan</h1>
        </div>
        <div>
            <div class="row justify-content-center">
                <div class="col-3">
                    <a href="{{ route('login') }}" class="text-decoration-none">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <span class="text-dark text">
                                            <b>Login Pegawai</b>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user fa-2x text-dark"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-3">
                    <a href="{{ route('permohonan.form') }}" class="text-decoration-none">
                        <div class="card shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <span class="text-dark text">
                                            <b>Buat Permohonan</b>
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-envelope fa-2x text-dark"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
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