<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Depresiasi;
use Illuminate\Http\Request;

class DepresiasiController extends Controller
{
    public function index()
    {
        $depresiasi = Depresiasi::all();
        return view('admin.depresiasi.index', compact('depresiasi'));
    }

    public function create()
    {
        return view('admin.depresiasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lama_depresiasi' => 'required|integer',
            'keterangan' => 'nullable|max:50',
        ]);

        Depresiasi::create($request->all());
        return redirect()->route('admin.depresiasi.index')->with('success', 'Depresiasi berhasil ditambahkan.');
    }

    public function edit(Depresiasi $depresiasi)
    {
        // dd($depresiasi);
        return view('admin.depresiasi.edit', compact('depresiasi'));
        
    }

    public function update(Request $request, Depresiasi $depresiasi)
    {
        $request->validate([
            'lama_depresiasi' => 'required|integer',
            'keterangan' => 'nullable|max:50',
        ]);



        $depresiasi->update($request->all());
        return redirect()->route('admin.depresiasi.index')->with('success', 'Depresiasi berhasil diperbarui.');
    }

    public function destroy($depresiasi)
    {
        $depresiasi = Depresiasi::findOrFail($depresiasi);
        $depresiasi->delete();
        return redirect()->route('admin.depresiasi.index')->with('success', 'Depresiasi berhasil dihapus.');
    }
}
