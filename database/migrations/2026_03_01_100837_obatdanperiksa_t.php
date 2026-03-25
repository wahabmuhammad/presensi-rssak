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
        Schema::create('obatdanperiksa_t', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('pegawai_fk');
            $table->date('periodegaji');
            $table->date('tanggaltransaksi');
            $table->float('debit');
            $table->text('keterangan')->nullable();
            $table->timestamps(); // created_at & updated_at (opsional, bisa dihapus kalau tidak perlu)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obatdanperiksa_t');
    }
};
