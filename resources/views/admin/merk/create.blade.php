@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Tambah Merk</h4>
    <form action="{{ route('merk.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Merk</label>
            <input type="text" name="merk" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('merk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
