@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Tambah Barang</h4>
    <form action="{{ route('master-barang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode Barang</label>
            <input type="text" name="kode_barang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Spesifikasi Teknis</label>
            <input type="text" name="spesifikasi_teknis" class="form-control">
        </div>
        <div class="mb-3">
            <label>Harga</label>
            <input type="number" name="harga" class="form-control">
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('master-barang.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
