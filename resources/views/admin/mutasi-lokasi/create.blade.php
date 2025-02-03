@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Tambah Mutasi Lokasi</h4>
    <form action="{{ route('mutasi-lokasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Lokasi</label>
            <select name="id_lokasi" class="form-control" required>
                <option value="">-- Pilih Lokasi --</option>
                @foreach($lokasi as $item)
                    <option value="{{ $item->id_lokasi }}">{{ $item->nama_lokasi }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Pengadaan</label>
            <select name="id_pengadaan" class="form-control" required>
                <option value="">-- Pilih Pengadaan --</option>
                @foreach($pengadaan as $item)
                    <option value="{{ $item->id_pengadaan }}">{{ $item->kode_pengadaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Flag Lokasi</label>
            <input type="text" name="flag_lokasi" class="form-control" required maxlength="45">
        </div>
        <div class="mb-3">
            <label>Flag Pindah</label>
            <input type="text" name="flag_pindah" class="form-control" required maxlength="45">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('mutasi-lokasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
