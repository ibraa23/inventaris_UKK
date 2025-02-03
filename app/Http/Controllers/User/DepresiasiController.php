<?php
namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

use App\Models\Depresiasi;
use Illuminate\Http\Request;

class DepresiasiController extends Controller
{
    public function index()
    {
        $depresiasi = Depresiasi::all();
        return view('user.depresiasi.index', compact('depresiasi'));
    }

    public function create()
    {
        return view('user.depresiasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'lama_depresiasi' => 'required|integer',
            'keterangan' => 'nullable|max:50',
        ]);

        Depresiasi::create($request->all());
        return redirect()->route('depresiasi.index')->with('success', 'Depresiasi berhasil ditambahkan.');
    }

    public function edit(Depresiasi $depresiasi)
    {
        return view('user.depresiasi.edit', compact('depresiasi'));
    }

    public function update(Request $request, Depresiasi $depresiasi)
    {
        $request->validate([
            'lama_depresiasi' => 'required|integer',
            'keterangan' => 'nullable|max:50',
        ]);

        $depresiasi->update($request->all());
        return redirect()->route('depresiasi.index')->with('success', 'Depresiasi berhasil diperbarui.');
    }

    public function destroy(Depresiasi $depresiasi)
    {
        $depresiasi->delete();
        return redirect()->route('depresiasi.index')->with('success', 'Depresiasi berhasil dihapus.');
    }
}
