<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<body>
    <div class="container m-auto">
        <!-- kop surat -->
        <div class="row ">
            <div class="col-1 text-center"><img src="{{ asset('img/logo.png') }}" style="width: 8rem;"></div>
            <div class="col-10 ">
                <div class="row  text-center fs-4"><span>PEMERINTAH KOTA CILEGON</span> </div>
                <div class="row  text-center fs-3"><span>DINAS KESEHATAN</span></div>
                <div class="row  text-center ">
                    <h3>UPTD PUSKESMAS CIBEBER</h3>
                </div>
                <div class="row text-center">
                    <h6>Komp. PCI Blok D52 Kec.Cibeber Kota Cilegon Telp.(0254)399193</h6>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
        <hr class="border border-dark border-2 opacity-100">
        <!-- tanggal -->
        <div class="row text-end">
            <span>Cibeber, {{ date("d-m-Y") }}</span>
        </div>
        <div class="row ">
            <!-- nomor surat & perihal -->
            <div class=" col "><span>Nomorㅤㅤㅤ: 400/Sekrt. <br>Sifatㅤㅤㅤㅤ : Biasa<br>Lampiranㅤㅤ: -<br>perihalㅤㅤㅤ :
                    <b>Rekomendasi ijin {{ $permohonan->jenis_pelayanan }}</b></span></div>

            <!-- kepada yth -->
            <div class=" col "></div>
            <div class=" col ">Kepada <br>Yth. Kepala Dinas Kesehatan Kota Cilegon <br>Di - <br> ㅤCilegon</div>
        </div>
        <!-- dengan hormat -->
        <div class="row ">
            <div class="col-1 "></div>
            <div class=" col ">
                <p>Dengan hormat,</p>
                <p>Yang bertanda tangan di bawah ini :</p>
            </div>
            <div class=" col-1 "></div>
        </div>
        <!-- isi ada jenis pelayanan coy -->
        <div class="row ">
            <div class=" col-1"></div>
            <div class=" col ">Namaㅤㅤㅤㅤㅤㅤ: dr. Yanti Azis<br>NIPㅤㅤㅤㅤㅤㅤㅤ: 19780603 200701 2 011 <br>Pangkat/Gol.ㅤㅤㅤ:
                Pembina Tk I,/IV b <br>Jabatanㅤㅤㅤㅤㅤ : Ka. Puskesmas Cibeber </div>
            <div class=" col-1"></div>
        </div>
        <div class="row  mt-2">
            <div class=" col-1"></div>
            <div class=" col">
                <p>Menindaklanjuti Permohonan {{ $permohonan->jenis_pelayanan }} :</p>
            </div>
            <div class="col-1"></div>
        </div>
        <!-- data pemohon -->
        <div class="row ">
            <div class=" col-1"></div>
            <div class=" col">Namaㅤㅤㅤㅤㅤㅤ: {{ $permohonan->nama_lengkap }}<br>Tempat/Tgl lahir ㅤ : {{
                $permohonan->tempat_lahir }}, {{ $permohonan->tanggal_lahir }}<br>Lulusanㅤㅤㅤㅤㅤ : {{
                $permohonan->lulusan }}<br>Alamat Rumahㅤㅤ: {{ $permohonan->alamat_rumah }}<br>Alamat Kerjaㅤㅤㅤ: {{
                $permohonan->tempat_bekerja_sebelumnya }}
            </div>
            <div class=" col-1"></div>
        </div>
        <!-- ada jenis pelayan coy -->
        <div class="row  mt-1">
            <div class=" col-1"></div>
            <div class=" col">
                <p>pada dasarnya tidak keberatan untuk memberikan <b> Persetujuan Rekomendasi Atasan untuk ijin {{
                        $permohonan->jenis_pelayanan }}</b> di wilayah kerja Puskesmas Cibeber Kota Cilegon, selama
                    tidak melanggar peraturan yang
                    berlaku</p>
            </div>
            <div class=" col-1"></div>
        </div>
        <div class="row  text-end">
            <div class=" col"></div>
            <div class=" col ">Kepala UPTD Puskesmas Cibeberㅤㅤ<br><br><br><br><br>dr. Yanti Azisㅤㅤㅤㅤㅤㅤ<br>Pembina Tk I,
                IV bㅤㅤㅤㅤㅤ<br>NIP : 19780603 200701 2 011 ㅤㅤ </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>

    <script>
        // auto print
        window.print();
    </script>
</body>