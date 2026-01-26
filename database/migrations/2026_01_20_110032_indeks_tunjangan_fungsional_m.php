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
        Schema::create('indeks_tunjangan_fungsional_m', function (Blueprint $table) {
            $table->id();
            $table->boolean('statusenabled')->default(true);
            $table->string('nama_indeks');
            $table->string('persentase')->nullable();
            $table->float('tarif_indeks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('indeks_tunjangan_fungsional_m');
    }
};
