<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengembalian_buku extends Model
{
    protected $table = 'pengembalian_buku';

    protected $primaryKey = "id_pengembalian";
    public $incrementing = true;
    protected $keyType = "string";

    protected $fillable = [
        'id_pengembalian',
        'id_pinjam',
        'nama',
        'id_buku',
        'nama_buku',
        'tgl_pengembalian',
        
    ];

    public function pinjamBuku()
    {
        return $this->belongsTo(pinjam_buku::class, 'nama', 'nama');
    }
    use HasFactory;
}