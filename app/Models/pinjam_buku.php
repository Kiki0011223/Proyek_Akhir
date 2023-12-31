<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pinjam_buku extends Model
{
    protected $table = 'pinjam_buku';
    protected $primaryKey = "id_pinjam";
    public $incrementing = true;
    protected $keyType = "string";

    protected $fillable = [
        'id_pinjam',
        'nama',
        'id_buku',
        'nama_buku',
        'tgl_pinjam',
        'tgl_pengembalian',
        'status',
    ];

    public function pengembalianBuku()
    {
        return $this->hasMany(pengembalian_buku::class, 'nama', 'nama');
    }
    use HasFactory;
}