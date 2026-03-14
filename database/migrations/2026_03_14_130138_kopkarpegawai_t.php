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
        Schema::create('kopkarpegawai_t', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->integer('pegawai_fk');
            $table->date('periodegaji');
            //simpanan
            $table->float('simpananpokok')->default(0);
            $table->float('simpananwajib')->default(0);
            $table->float('simpanansukarela')->default(0);
            $table->float('simpananidulfitri')->default(0);
            $table->float('simpananiduladha')->default(0);
            //pinjaman
            $table->integer('angsuranke')->default(0);
            $table->float('angsuranpokok')->default(0);
            $table->float('angsuranjasa')->default(0);
            $table->float('jumlahangsuran')->default(0);
            $table->float('totalsimpanpinjam')->default(0);
            //voucher toko
            $table->float('vouchertoko')->default(0);
            $table->float('bontoko')->default(0);
            $table->float('jumlahtoko')->default(0);
            //kredit barang
            $table->integer('angsurankreditke')->default(0);
            $table->float('angsurankreditpokok')->default(0);
            $table->float('angsurankreditjasa')->default(0);
            $table->float('jumlahangsurankredit')->default(0);
            $table->float('totalsemua')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kopkarpegawai_t');
    }
};
