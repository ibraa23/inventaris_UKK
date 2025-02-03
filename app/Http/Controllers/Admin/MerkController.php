<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
    public function index()
    {
        $merks = Merk::all();
        return view('admin.merk.index', compact('merks'));
    }

    public function create()
    {
        return view('admin.merk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required|max:50',
            'keterangan' => 'nullable|max:50',
        ]);

        Merk::create($request->all());
        return redirect()->route('merk.index')->with('success', 'Merk berhasil ditambahkan.');
    }

    public function edit(Merk $merk)
    {
        return view('admin.merk.edit', compact('merk'));
    }

    public function update(Request $request, Merk $merk)
    {
        $request->validate([
            'merk' => 'required|max:50',
            'keterangan' => 'nullable|max:50',
        ]);

        $merk->update($request->all());
        return redirect()->route('merk.index')->with('success', 'Merk berhasil diperbarui.');
    }

    public function destroy(Merk $merk)
    {
        $merk->delete();
        return redirect()->route('merk.index')->with('success', 'Merk berhasil dihapus.');
    }
}
