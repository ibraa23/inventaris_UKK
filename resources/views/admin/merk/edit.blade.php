@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Merk</h4>
    <form action="{{ route('merk.update', $merk->id_merk) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Merk</label>
            <input type="text" name="merk" class="form-control" value="{{ $merk->merk }}" required>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control" value="{{ $merk->keterangan }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('merk.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
