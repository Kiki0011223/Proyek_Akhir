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
        Schema::create('pengembalian_buku', function (Blueprint $table) {
            $table->increments('id_pengembalian');
            $table->string('id_pinjam', 20);
            $table->string('nama', 20);
            $table->string('id_buku', 20);
            $table->string('nama_buku', 150);
            $table->string('tgl_pengembalian', 150);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian_buku');
    }
};