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
        Schema::create('komponengaji_m', function (Blueprint $table) {
            $table->id('id_komponengaji');
            $table->integer('pegawai_fk');
            $table->float('pgpns');
            $table->date('tahunpgpns');
            $table->float('dasarbpjsks');
            $table->float('dasarbpjstk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komponengaji_m');
    }
};
