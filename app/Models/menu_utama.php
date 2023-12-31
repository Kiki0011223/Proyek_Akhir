<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menu_utama extends Model
{
    protected $table = 'menu_utama';
    protected $fillable = [
        'id_buku',
        'nama_buku',
        'nama_pengarang',
        'tahun_terbit',
        'gambar',
        'keterangan',
    ];
    protected $primaryKey = "id_buku";
    public $incrementing = true;
    protected $keyType = "string";
    use HasFactory;
}