<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MutasiLokasi;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class MutasiLokasiController extends Controller
{
    public function index()
    {
        $mutasiLokasi = MutasiLokasi::with(['lokasi', 'pengadaan'])->get();
        return view('admin.mutasi-lokasi.index', compact('mutasiLokasi'));
    }

    public function create()
    {
        $lokasi = Lokasi::all();
        $pengadaan = Pengadaan::all();
        return view('admin.mutasi-lokasi.create', compact('lokasi', 'pengadaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'flag_lokasi' => 'required|max:45',
            'flag_pindah' => 'required|max:45',
        ]);

        MutasiLokasi::create($request->all());
        return redirect()->route('mutasi-lokasi.index')->with('success', 'Mutasi Lokasi berhasil ditambahkan.');
    }

    public function edit(MutasiLokasi $mutasiLokasi)
    {
        $lokasi = Lokasi::all();
        $pengadaan = Pengadaan::all();
        return view('admin.mutasi-lokasi.edit', compact('mutasiLokasi', 'lokasi', 'pengadaan'));
    }

    public function update(Request $request, MutasiLokasi $mutasiLokasi)
    {
        $request->validate([
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'flag_lokasi' => 'required|max:45',
            'flag_pindah' => 'required|max:45',
        ]);

        $mutasiLokasi->update($request->all());
        return redirect()->route('mutasi-lokasi.index')->with('success', 'Mutasi Lokasi berhasil diperbarui.');
    }

    public function destroy(MutasiLokasi $mutasiLokasi)
    {
        $mutasiLokasi->delete();
        return redirect()->route('mutasi-lokasi.index')->with('success', 'Mutasi Lokasi berhasil dihapus.');
    }
}
