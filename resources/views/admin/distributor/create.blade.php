@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Tambah Distributor</h4>
    <form action="{{ route('distributor.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Distributor</label>
            <input type="text" name="nama_distributor" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No. Telepon</label>
            <input type="text" name="no_telp" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('distributor.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
