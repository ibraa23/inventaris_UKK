@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Tambah Kategori Asset</h4>
    <form action="{{ route('kategori-asset.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode Kategori Asset</label>
            <input type="text" name="kode_kategori_asset" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Kategori Asset</label>
            <input type="text" name="kategori_asset" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('kategori-asset.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
