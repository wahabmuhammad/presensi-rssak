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
        Schema::create('potongan_gajis', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_potongan');
            $table->bigInteger('lazismu')->nullable();
            $table->bigInteger('obat')->nullable();
            $table->bigInteger('koperasi')->nullable();
            $table->bigInteger('aisyiyah')->nullable();
            $table->bigInteger('pay')->nullable();
            $table->bigInteger('kasunit')->nullable();
            $table->bigInteger('ppn')->nullable();
            $table->bigInteger('ibi')->nullable();
            $table->bigInteger('lain')->nullable();
            $table->bigInteger('bpjsks')->nullable();
            $table->bigInteger('bpjsks_pegawai')->nullable();
            $table->bigInteger('bpjstk_rsa')->nullable();
            $table->bigInteger('bpjstk_pegawai')->nullable();
            $table->bigInteger('pphpasal21')->nullable();
            $table->bigInteger('kretab_bribpd')->nullable();
            $table->bigInteger('jml_potongan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potongan_gajis');
    }
};
