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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('NIK')->unique()->nullable();
            $table->string('Nama');
            $table->date('TTL')->nullable();
            $table->string('Alamat')->nullable();
            $table->string('Formasi');
            $table->string('Pendidikan')->nullable();
            $table->string('Universitas/Sekolah')->nullable();
            $table->integer('nohp');
            $table->string('Rekomendasi')->nullable(true);
            $table->string('Sertifikat')->nullable(true);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitments');
    }
};
