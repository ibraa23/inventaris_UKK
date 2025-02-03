<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\KategoriAsset;
use App\Models\SubKategoriAsset;
use Illuminate\Http\Request;

class SubKategoriAssetController extends Controller
{
    public function index()
    {
        $subKategoriAssets = SubKategoriAsset::with('kategoriAsset')->get();
        return view('admin.sub-kategori-asset.index', compact('subKategoriAssets'));
    }

    public function create()
    {
        $kategoriAssets = KategoriAsset::all();
        return view('admin.sub-kategori-asset.create', compact('kategoriAssets'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_sub_kategori_asset' => 'required|max:20|unique:tbl_sub_kategori_asset,kode_sub_kategori_asset',
            'sub_kategori_asset' => 'required|max:25',
            'id_kategori_asset' => 'required|exists:tbl_kategori_asset,id_kategori_asset',
        ]);

        SubKategoriAsset::create($request->all());
        return redirect()->route('sub-kategori-asset.index')->with('success', 'Sub-Kategori Asset berhasil ditambahkan.');
    }

    public function edit(SubKategoriAsset $subKategoriAsset)
    {
        $kategoriAssets = KategoriAsset::all();
        return view('admin.sub-kategori-asset.edit', compact('subKategoriAsset', 'kategoriAssets'));
    }

    public function update(Request $request, SubKategoriAsset $subKategoriAsset)
    {
        $request->validate([
            'kode_sub_kategori_asset' => 'required|max:20|unique:tbl_sub_kategori_asset',
            'sub_kategori_asset' => 'required|max:25',
            'kategori_asset_id' => 'required|exists:tbl_kategori_asset,id_kategori_asset',
        ]);

        $subKategoriAsset->update($request->all());
        return redirect()->route('sub-kategori-asset.index')->with('success', 'Sub-Kategori Asset berhasil diperbarui.');
    }

    public function destroy(SubKategoriAsset $subKategoriAsset)
    {
        $subKategoriAsset->delete();
        return redirect()->route('sub-kategori-asset.index')->with('success', 'Sub-Kategori Asset berhasil dihapus.');
    }
}
