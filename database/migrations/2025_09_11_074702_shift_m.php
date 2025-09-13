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
        Schema::create('shift_m', function (Blueprint $table) {
            $table->id();
            $table->string('namashift');
            $table->time('jammasuk');
            $table->time('jampulang');
            $table->integer('jamkerja');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_m');
    }
};
