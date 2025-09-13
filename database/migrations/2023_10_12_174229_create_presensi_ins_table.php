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
        Schema::create('presensi', function (Blueprint $table) {
            $table->id();
            $table->string('shift', 255);
            $table->string('name', 255)->nullable();
            $table->string('nip', 11)->nullable();
            $table->date('tgl_presensi');
            $table->time('jam_in');
            $table->string('foto_in', 255);
            $table->text('location_in')->nullable();
            $table->date('tgl_presensi_out')->nullable();
            $table->time('jam_out')->nullable();
            $table->string('foto_out', 255)->nullable();
            $table->text('location_out')->nullable();
            $table->string('total_jamkerja', 255)->nullable();
            $table->string('jam_terlambat', 255)->nullable();
            $table->string('user_fk', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi');
    }
};
