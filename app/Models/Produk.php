<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nama_produk',
        'deskripsi'
    ];

    // Relasi ke tabel qty
    public function stok()
    {
        return $this->hasOne(Qty::class, 'id_prod');
    }

    // Relasi ke tabel kategori
    public function kategori()
    {
        return $this->hasOne(Kategori::class, 'id_prod');
    }
}
