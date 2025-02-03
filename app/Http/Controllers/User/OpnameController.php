<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Opname;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class OpnameController extends Controller
{
    // Display the list of opname
    public function index()
    {
        $opnames = Opname::with('pengadaan')->get();
        return view('user.opname.index', compact('opnames'));
    }

    // Show the form for creating a new opname
    public function create()
    {
        $pengadaan = Pengadaan::all();
        return view('user.opname.create', compact('pengadaan'));
    }

    // Store a newly created opname in storage
    public function store(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_opname' => 'required|date',
            'kondisi' => 'required|string|max:25',
            'keterangan' => 'nullable|string|max:100',
        ]);

        Opname::create($request->all());
        return redirect()->route('opname.index')->with('success', 'Data opname berhasil ditambahkan.');
    }

    // Show the form for editing the specified opname
    public function edit($id)
    {
        $opname = Opname::findOrFail($id);
        $pengadaan = Pengadaan::all();
        return view('user.opname.edit', compact('opname', 'pengadaan'));
    }

    // Update the specified opname in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_opname' => 'required|date',
            'kondisi' => 'required|string|max:25',
            'keterangan' => 'nullable|string|max:100',
        ]);

        $opname = Opname::findOrFail($id);
        $opname->update($request->all());

        return redirect()->route('opname.index')->with('success', 'Data opname berhasil diperbarui.');
    }

    // Remove the specified opname from storage
    public function destroy($id)
    {
        $opname = Opname::findOrFail($id);
        $opname->delete();

        return redirect()->route('opname.index')->with('success', 'Data opname berhasil dihapus.');
    }
}
