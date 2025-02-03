@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Distributor</h4>
    <form action="{{ route('distributor.update', $distributor->id_distributor) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nama Distributor</label>
            <input type="text" name="nama_distributor" class="form-control" value="{{ $distributor->nama_distributor }}" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control" value="{{ $distributor->alamat }}" required>
        </div>
        <div class="mb-3">
            <label>No. Telepon</label>
            <input type="text" name="no_telp" class="form-control" value="{{ $distributor->no_telp }}">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $distributor->email }}">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control">{{ $distributor->keterangan }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('distributor.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
