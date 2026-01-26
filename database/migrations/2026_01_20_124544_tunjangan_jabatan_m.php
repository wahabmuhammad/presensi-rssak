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
        Schema::create('tunjangan_jabatan_m', function (Blueprint $table) {
            $table->id();
            $table->boolean('statusenabled')->default(true);
            $table->integer('jabatan_fk');
            $table->integer('tunjangan_jabatan_fk');
            $table->float('persentase_tunjangan');
            $table->float('indeks_tunjangan');
            $table->float('nilai_tunjangan');
            $table->float('total_pembulatan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tunjangan_jabatan_m');
    }
};
