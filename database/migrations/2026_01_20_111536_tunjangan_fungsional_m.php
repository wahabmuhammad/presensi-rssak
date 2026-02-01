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
        Schema::create('tunjangan_fungsional_m', function (Blueprint $table) {
            $table->id();
            $table->boolean('statusenabled')->default(true);
            // $table->integer('tunjangan_fungsional_fk');
            $table->integer('jabatan_fungsional_fk');
            $table->float('persentase_tunjangan');
            $table->float('indeks_tunjangan');
            $table->float('nilai_tunjangan');
            $table->float('mkkurang5');
            $table->float('mkkurangdari10');
            $table->float('mklebihdari10');
            $table->float('ifpegawaitetap')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tunjangan_fungsional_m');
    }
};
