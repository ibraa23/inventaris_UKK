@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Mutasi Lokasi</h4>
    <form action="{{ route('mutasi-lokasi.update', $mutasiLokasi->id_mutasi_lokasi) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Lokasi</label>
            <select name="id_lokasi" class="form-control" required>
                <option value="">-- Pilih Lokasi --</option>
                @foreach($lokasi as $item)
                    <option value="{{ $item->id_lokasi }}" {{ $mutasiLokasi->id_lokasi == $item->id_lokasi ? 'selected' : '' }}>
                        {{ $item->nama_lokasi }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Pengadaan</label>
            <select name="id_pengadaan" class="form-control" required>
                <option value="">-- Pilih Pengadaan --</option>
                @foreach($pengadaan as $item)
                    <option value="{{ $item->id_pengadaan }}" {{ $mutasiLokasi->id_pengadaan == $item->id_pengadaan ? 'selected' : '' }}>
                        {{ $item->kode_pengadaan }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Flag Lokasi</label>
            <input type="text" name="flag_lokasi" class="form-control" value="{{ $mutasiLokasi->flag_lokasi }}" required maxlength="45">
        </div>
        <div class="mb-3">
            <label>Flag Pindah</label>
            <input type="text" name="flag_pindah" class="form-control" value="{{ $mutasiLokasi->flag_pindah }}" required maxlength="45">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('mutasi-lokasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
