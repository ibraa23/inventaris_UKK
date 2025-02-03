@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Tambah Lokasi</h4>
    <form action="{{ route('lokasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode Lokasi</label>
            <input type="text" name="kode_lokasi" class="form-control" required maxlength="20">
        </div>
        <div class="mb-3">
            <label>Nama Lokasi</label>
            <input type="text" name="nama_lokasi" class="form-control" required maxlength="20">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" maxlength="50">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
