@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Sub-Kategori Asset</h4>
    <form action="{{ route('sub-kategori-asset.update', $subKategoriAsset->id_sub_kategori_asset) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Kode Sub-Kategori Asset</label>
            <input type="text" name="kode_sub_kategori_asset" class="form-control" value="{{ $subKategoriAsset->kode_sub_kategori_asset }}" required>
        </div>
        <div class="mb-3">
            <label>Nama Sub-Kategori Asset</label>
            <input type="text" name="sub_kategori_asset" class="form-control" value="{{ $subKategoriAsset->sub_kategori_asset }}" required>
        </div>
        <div class="mb-3">
            <label>Kategori Asset</label>
            <select name="kategori_asset_id" class="form-control" required>
                @foreach($kategoriAssets as $kategoriAsset)
                    <option value="{{ $kategoriAsset->id_kategori_asset }}" {{ $kategoriAsset->id_kategori_asset == $subKategoriAsset->kategori_asset_id ? 'selected' : '' }}>
                        {{ $kategoriAsset->kategori_asset }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('sub-kategori-asset.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
