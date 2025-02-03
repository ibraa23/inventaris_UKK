<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HitungDepresiasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class HitungDepresiasiController extends Controller
{
    public function index()
    {
        $hitungDepresiasi = HitungDepresiasi::with('pengadaan')->get();
        return view('admin.hitung-depresiasi.index', compact('hitungDepresiasi'));
    }

    public function create()
    {
        $pengadaan = Pengadaan::all();
        return view('admin.hitung-depresiasi.create', compact('pengadaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|max:10',
            'durasi' => 'required|integer',
            'nilai_barang' => 'required|integer',
        ]);

        HitungDepresiasi::create($request->all());
        return redirect()->route('hitung-depresiasi.index')->with('success', 'Hitung Depresiasi berhasil ditambahkan.');
    }

    public function edit(HitungDepresiasi $hitungDepresiasi)
    {
        $pengadaan = Pengadaan::all();
        return view('admin.hitung-depresiasi.edit', compact('hitungDepresiasi', 'pengadaan'));
    }

    public function update(Request $request, HitungDepresiasi $hitungDepresiasi)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|max:10',
            'durasi' => 'required|integer',
            'nilai_barang' => 'required|integer',
        ]);

        $hitungDepresiasi->update($request->all());
        return redirect()->route('hitung-depresiasi.index')->with('success', 'Hitung Depresiasi berhasil diperbarui.');
    }

    public function destroy(HitungDepresiasi $hitungDepresiasi)
    {
        $hitungDepresiasi->delete();
        return redirect()->route('hitung-depresiasi.index')->with('success', 'Hitung Depresiasi berhasil dihapus.');
    }
}
