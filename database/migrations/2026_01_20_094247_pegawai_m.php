<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawai_m', function (Blueprint $table) {
            $table->id();
            $table->boolean('statusenabled')->default(true);
            $table->bigInteger('nik');
            $table->string('nip');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('gol_mk');
            $table->date('awal_masuk');
            $table->date('tmt');
            $table->date('sk_pt');
            $table->integer('jenis_kelamin');
            $table->text('alamat');
            $table->string('alumni');
            $table->string('nohp');
            $table->string('email');
            $table->integer('pendidikan_fk'); //ijazah terakhir
            $table->string('program_studi');
            $table->integer('status_pegawaifk'); //(CP,PT,PO,PK)
            $table->integer('status_fungsionalfk'); //jabatan fungsional
            $table->integer('status_kawinfk');
            $table->integer('unitkerja');
            $table->integer('formasi_fk');
            $table->integer('jabatan_fk');
            $table->integer('jenispegawai_fk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai_m');
    }
};
