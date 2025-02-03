@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Tambah Satuan</h4>
    <form action="{{ route('satuan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Satuan</label>
            <input type="text" name="satuan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('satuan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
