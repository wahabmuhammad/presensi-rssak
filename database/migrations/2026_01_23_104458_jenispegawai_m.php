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
        Schema::create('jenispegawai_m', function (Blueprint $table) {
            $table->id();
            $table->boolean('statusenabled')->default(true);
            $table->string('kode_jenispegawai');
            $table->string('jenispegawai');
            $table->string('reportdisplay');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenispegawai_m');
    }
};
