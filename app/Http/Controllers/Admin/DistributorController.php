<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::all();
        return view('admin.distributor.index', compact('distributors'));
    }

    public function create()
    {
        return view('admin.distributor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required|max:50',
            'alamat' => 'required|max:50',
            'no_telp' => 'nullable|max:15',
            'email' => 'nullable|email|max:30',
            'keterangan' => 'nullable|max:45',
        ]);

        Distributor::create($request->all());
        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil ditambahkan.');
    }

    public function edit(Distributor $distributor)
    {
        return view('admin.distributor.edit', compact('distributor'));
    }

    public function update(Request $request, Distributor $distributor)
    {
        $request->validate([
            'nama_distributor' => 'required|max:50',
            'alamat' => 'required|max:50',
            'no_telp' => 'nullable|max:15',
            'email' => 'nullable|email|max:30',
            'keterangan' => 'nullable|max:45',
        ]);

        $distributor->update($request->all());
        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil diperbarui.');
    }

    public function destroy(Distributor $distributor)
    {
        $distributor->delete();
        return redirect()->route('distributor.index')->with('success', 'Distributor berhasil dihapus.');
    }
}
