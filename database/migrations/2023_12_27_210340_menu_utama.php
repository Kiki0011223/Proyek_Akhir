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
        Schema::create('menu_utama', function (Blueprint $table) {
            $table->bigIncrements('id_buku')->primary;
            $table->string('nama_buku',150);
            $table->string('nama_pengarang');
            $table->string('tahun_terbit',255);
            $table->string('gambar',100);
            $table->string('keterangan',50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_utama');
    }
};