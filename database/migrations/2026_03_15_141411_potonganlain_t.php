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
        Schema::create('potonganlain_t', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('pegawai_fk');
            $table->date('periodegaji');

            $table->float('bukopin')->default(0)->nullable();
            $table->float('btcls')->default(0)->nullable();
            $table->float('lainnya')->default(0)->nullable();
            $table->float('gajiproporsi')->default(0)->nullable();
            $table->float('diklat')->default(0)->nullable();
            $table->float('seragam')->default(0)->nullable();
            $table->float('kasunit')->default(0)->nullable();
            $table->float('jumlah')->default(0);

            $table->text('keterangan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potonganlain_t');
    }
};
