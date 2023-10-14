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
        Schema::create('presensi_out', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('nip');
            $table->date('tgl_presensi_out');
            $table->time('jam_out');
            $table->string('foto_out');
            $table->text('location_out');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_out');
    }
};
