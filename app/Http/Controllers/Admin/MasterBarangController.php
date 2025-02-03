<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\MasterBarang;
use Illuminate\Http\Request;

class MasterBarangController extends Controller
{
    public function index()
    {
        $masterBarangs = MasterBarang::all();
        return view('admin.master-barang.index', compact('masterBarangs'));
    }

    public function create()
    {
        return view('admin.master-barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|max:20',
            'nama_barang' => 'required|max:100',
            'spesifikasi_teknis' => 'nullable|max:100',
        ]);

        MasterBarang::create($request->all());
        return redirect()->route('master-barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit(MasterBarang $masterBarang)
    {
        return view('admin.master-barang.edit', compact('masterBarang'));
    }

    public function update(Request $request, MasterBarang $masterBarang)
    {
        $request->validate([
            'kode_barang' => 'required|max:20',
            'nama_barang' => 'required|max:100',
            'spesifikasi_teknis' => 'nullable|max:100',
        ]);

        $masterBarang->update($request->all());
        return redirect()->route('master-barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy(MasterBarang $masterBarang)
    {
        $masterBarang->delete();
        return redirect()->route('master-barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
