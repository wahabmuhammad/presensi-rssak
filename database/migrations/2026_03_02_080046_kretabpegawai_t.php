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
        Schema::create('kretabpegawai_t', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('pegawai_fk');
            $table->date('periodegaji');
            $table->date('tanggaltransaksi');
            $table->float('nominal');
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kretabpegawai_t');
    }
};
