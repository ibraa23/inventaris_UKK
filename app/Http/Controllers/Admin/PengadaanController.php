<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Pengadaan;
use App\Models\MasterBarang;
use App\Models\Depresiasi;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\SubKategoriAsset;
use App\Models\Distributor;
use Illuminate\Http\Request;

class PengadaanController extends Controller
{
    public function index()
    {
        $pengadaan = Pengadaan::with(['masterBarang', 'depresiasi', 'merk', 'satuan', 'subKategoriAsset', 'distributor'])->get();
        return view('admin.pengadaan.index', compact('pengadaan'));
    }

    public function create()
    {
        $masterBarang = MasterBarang::all();
        $depresiasi = Depresiasi::all();
        $merk = Merk::all();
        $satuan = Satuan::all();
        $subKategoriAsset = SubKategoriAsset::all();
        $distributor = Distributor::all();
        return view('admin.pengadaan.create', compact('masterBarang', 'depresiasi', 'merk', 'satuan', 'subKategoriAsset', 'distributor'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_master_barang' => 'required|exists:tbl_master_barang,id_barang',
            'id_depresiasi' => 'required|exists:tbl_depresiasi,id_depresiasi',
            'id_merk' => 'required|exists:tbl_merk,id_merk',
            'id_satuan' => 'required|exists:tbl_satuan,id_satuan',
            'id_sub_kategori_asset' => 'required|exists:tbl_sub_kategori_asset,id_sub_kategori_asset',
            'id_distributor' => 'required|exists:tbl_distributor,id_distributor',
            'kode_pengadaan' => 'required|max:20',
            'no_invoice' => 'required|max:20',
            'no_seri_barang' => 'required|max:50',
            'tahun_produksi' => 'required|max:5',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|integer',
            'nilai_barang' => 'required|integer',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|max:50',
        ]);

        Pengadaan::create($request->all());
        return redirect()->route('admin.pengadaan.index')->with('success', 'Pengadaan berhasil ditambahkan.');
    }

    public function edit( $pengadaan)
    {
        $masterBarang = MasterBarang::all();
        $depresiasi = Depresiasi::all();
        $merk = Merk::all();
        $satuan = Satuan::all();
        $subKategoriAsset = SubKategoriAsset::all();
        $pengadaan = Pengadaan::findOrFail($pengadaan);
        $distributor = Distributor::all();

        // dd($subKategoriAsset);
        return view('admin.pengadaan.edit', compact('pengadaan', 'masterBarang', 'depresiasi', 'merk', 'satuan', 'subKategoriAsset', 'distributor'));
    }

    public function update(Request $request, Pengadaan $pengadaan)
    {
        $request->validate([
            'id_master_barang' => 'required|exists:tbl_master_barang,id_barang',
            'id_depresiasi' => 'required|exists:tbl_depresiasi,id_depresiasi',
            'id_merk' => 'required|exists:tbl_merk,id_merk',
            'id_satuan' => 'required|exists:tbl_satuan,id_satuan',
            'id_sub_kategori_asset' => 'required|exists:tbl_sub_kategori_asset,id_sub_kategori_asset',
            'id_distributor' => 'required|exists:tbl_distributor,id_distributor',
            'kode_pengadaan' => 'required|max:20',
            'no_invoice' => 'required|max:20',
            'no_seri_barang' => 'required|max:50',
            'tahun_produksi' => 'required|max:5',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|integer',
            'nilai_barang' => 'required|integer',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|max:50',
        ]);
      
        $pengadaan->update($request->all());
        return redirect()->route('admin.pengadaan.index')->with('success', 'Pengadaan berhasil diperbarui.');
    }

    public function destroy($pengadaan)
    {
        $pengadaan = Pengadaan::findOrFail($pengadaan);
        $pengadaan->delete();
        return redirect()->route('admin.pengadaan.index')->with('success', 'Pengadaan berhasil dihapus.');
    }
}
 