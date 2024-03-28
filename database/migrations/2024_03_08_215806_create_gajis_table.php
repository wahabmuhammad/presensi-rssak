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
        Schema::create('gajis', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->date('tgl_gaji');
            $table->bigInteger('gaji_pokok');
            $table->bigInteger('tunj_khusus')->nullable();
            $table->bigInteger('tunj_suamiistri')->nullable();
            $table->bigInteger('tunj_anak')->nullable();
            $table->bigInteger('tunj_pangan')->nullable();
            $table->bigInteger('tunj_fungsional')->nullable();
            $table->bigInteger('tunj_struktural')->nullable();
            $table->bigInteger('jml_gaji')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};
