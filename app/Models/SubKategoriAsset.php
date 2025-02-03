<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKategoriAsset extends Model
{
    use HasFactory;

    protected $table = 'tbl_sub_kategori_asset';
    protected $primaryKey = 'id_sub_kategori_asset';
    protected $fillable = ['id_kategori_asset', 'kode_sub_kategori_asset', 'sub_kategori_asset'];
    public $timestamps = false;

    // Relasi ke KategoriAsset
    public function kategoriAsset()
    {
        return $this->belongsTo(KategoriAsset::class, 'id_kategori_asset');
    }

    // Relasi ke Pengadaan (One-to-Many)
    public function pengadaan()
    {
        return $this->hasMany(Pengadaan::class, 'id_sub_kategori_asset', 'id_sub_kategori_asset');
    }
}
