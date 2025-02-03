<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'tbl_pengadaan';
    protected $primaryKey = 'id_pengadaan';
    protected $fillable = [
        'id_master_barang',
        'id_depresiasi',
        'id_merk',
        'id_satuan',
        'id_sub_kategori_asset',
        'id_distributor',
        'kode_pengadaan',
        'no_invoice',
        'no_seri_barang',
        'tahun_produksi',
        'tgl_pengadaan',
        'harga_barang',
        'nilai_barang',
        'fb',
        'keterangan',
    ];
    public $timestamps = false;

    public function masterBarang()
    {
        return $this->belongsTo(MasterBarang::class, 'id_master_barang');
    }

    // Relasi ke Depresiasi
    public function depresiasi()
    {
        return $this->belongsTo(Depresiasi::class, 'id_depresiasi');
    }

    // Relasi ke Merk
    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk');
    }

    // Relasi ke Satuan
    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

    // Relasi ke SubKategoriAsset
    public function subKategoriAsset()
    {
        return $this->belongsTo(SubKategoriAsset::class, 'id_sub_kategori_asset');
    }

    // Relasi ke Distributor
    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'id_distributor');
    }

    public function opname()
    {
        return $this->hasMany(Opname::class, 'id_pengadaan', 'id_pengadaan');
    }
}
