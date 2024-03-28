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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('gol_mk')->nullable();
            $table->date('tmt')->nullable();
            $table->date('sk_pt')->nullable();
            $table->string('status_pegawai')->nullable();
            $table->string('jenis_kelamin');
            $table->string('formasi')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('penempatan')->nullable();
            $table->date('mulai_kerja')->nullable();
            $table->bigInteger('nik')->nullable();
            $table->string('ttl')->nullable();
            $table->string('alamat', 500)->nullable();
            $table->string('lulusan')->nullable();
            $table->string('pendidikan_usia')->nullable();
            $table->string('program_studi')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};
