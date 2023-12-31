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
        Schema::create('pinjam_buku', function (Blueprint $table) {
            $table->increments('id_pinjam')->primary;
            $table->index('nama');
            $table->string('nama', 20);
            $table->string('id_buku',20);
            $table->string('nama_buku',150);
            $table->string('status',20)->default(0);
            $table->string('tgl_pinjam',150);
            $table->string('tgl_pengembalian',255);
            $table->timestamps();
            
        });
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam_buku');
    }
};