@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Kategori Asset</h4>
    <form action="{{ route('kategori-asset.update', $kategoriAsset->id_kategori_asset) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Kode Kategori Asset</label>
            <input type="text" name="kode_kategori_asset" class="form-control" value="{{ $kategoriAsset->kode_kategori_asset }}" required>
        </div>
        <div class="mb-3">
            <label>Nama Kategori Asset</label>
            <input type="text" name="kategori_asset" class="form-control" value="{{ $kategoriAsset->kategori_asset }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kategori-asset.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
