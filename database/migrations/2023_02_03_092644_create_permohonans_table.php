<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permohonans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pelayanan')->unique();
            $table->string('jenis_pelayanan');
            $table->string('jenis_profesi');
            $table->timestamp('tanggal_pengajuan');
            $table->set('status', ['Diterima', 'Ditolak', 'Tertunda'])->default('Tertunda');
            $table->timestamp('tanggal_peninjauan')->nullable();
            $table->string('nama_lengkap');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->date('lulusan')->nullable();
            $table->string('nomor_str');
            $table->text('tempat_bekerja_sebelumnya')->nullable();
            $table->text('alamat_rumah')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permohonans');
    }
};
