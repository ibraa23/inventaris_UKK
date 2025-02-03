<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    protected $table = 'tbl_master_barang';
    protected $primaryKey = 'id_barang';
    protected $fillable = ['kode_barang', 'nama_barang', 'spesifikasi_teknis'];
    public $timestamps = false;
}

