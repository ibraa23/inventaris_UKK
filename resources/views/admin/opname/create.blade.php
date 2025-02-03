@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Tambah Opname</h4>
    <form action="{{ route('admin.opname.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Pengadaan</label>
            <select name="id_pengadaan" class="form-control" required>
                <option value="">-- Pilih Pengadaan --</option>
                @foreach($pengadaan as $item)
                    <option value="{{ $item->id_pengadaan }}">{{ $item->kode_pengadaan }} - {{ $item->no_seri_barang }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Opname</label>
            <input type="date" name="tgl_opname" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kondisi</label>
            <input type="text" name="kondisi" class="form-control" required maxlength="25">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3" maxlength="100"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
