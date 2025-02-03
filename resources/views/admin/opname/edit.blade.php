@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Opname</h4>
    <form action="{{ route('admin.opname.update', $opname->id_opname) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Pengadaan</label>
            <select name="id_pengadaan" class="form-control" required>
                <option value="">-- Pilih Pengadaan --</option>
                @foreach($pengadaan as $item)
                    <option value="{{ $item->id_pengadaan }}" {{ $item->id_pengadaan == $opname->id_pengadaan ? 'selected' : '' }}>
                        {{ $item->kode_pengadaan }} - {{ $item->no_seri_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Tanggal Opname</label>
            <input type="date" name="tgl_opname" class="form-control" value="{{ old('tgl_opname', $opname->tgl_opname) }}" required>
        </div>

        <div class="mb-3">
            <label>Kondisi</label>
            <input type="text" name="kondisi" class="form-control" value="{{ old('kondisi', $opname->kondisi) }}" required maxlength="25">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3" maxlength="100">{{ old('keterangan', $opname->keterangan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
