@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Edit Pengadaan</h4>
    <form action="{{ route('admin.pengadaan.update', $pengadaan->id_pengadaan) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label>Master Barang</label>
            <select name="id_master_barang" class="form-control" required>
                <option value="">-- Pilih Master Barang --</option>
                @foreach($masterBarang as $item)
                    <option value="{{ $item->id_barang }}" {{ $item->id_barang == $pengadaan->id_master_barang ? 'selected' : '' }}>
                        {{ $item->nama_barang }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Depresiasi</label>
            <select name="id_depresiasi" class="form-control" required>
                <option value="">-- Pilih Depresiasi --</option>
                @foreach($depresiasi as $item)
                    <option value="{{ $item->id_depresiasi }}" {{ $item->id_depresiasi == $pengadaan->id_depresiasi ? 'selected' : '' }}>
                        {{ $item->keterangan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Merk</label>
            <select name="id_merk" class="form-control" required>
                <option value="">-- Pilih Merk --</option>
                @foreach($merk as $item)
                    <option value="{{ $item->id_merk }}" {{ $item->id_merk == $pengadaan->id_merk ? 'selected' : '' }}>
                        {{ $item->merk }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Satuan</label>
            <select name="id_satuan" class="form-control" required>
                <option value="">-- Pilih Satuan --</option>
                @foreach($satuan as $item)
                    <option value="{{ $item->id_satuan }}" {{ $item->id_satuan == $pengadaan->id_satuan ? 'selected' : '' }}>
                        {{ $item->satuan }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Sub Kategori Asset</label>
            <select name="id_sub_kategori_asset" class="form-control" required>
                <option value="">-- Pilih Sub Kategori Asset --</option>
                @foreach($subKategoriAsset as $item)
                    <option value="{{ $item->id_sub_kategori_asset }}" {{ $item->id_sub_kategori_asset == $pengadaan->id_sub_kategori_asset ? 'selected' : '' }}>
                        {{ $item->sub_kategori_asset }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Distributor</label>
            <select name="id_distributor" class="form-control" required>
                <option value="">-- Pilih Distributor --</option>
                @foreach($distributor as $item)
                    <option value="{{ $item->id_distributor }}" {{ $item->id_distributor == $pengadaan->id_distributor ? 'selected' : '' }}>
                        {{ $item->nama_distributor }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Kode Pengadaan</label>
            <input type="text" name="kode_pengadaan" class="form-control" value="{{ old('kode_pengadaan', $pengadaan->kode_pengadaan) }}" required maxlength="20">
        </div>

        <div class="mb-3">
            <label>No Invoice</label>
            <input type="text" name="no_invoice" class="form-control" value="{{ old('no_invoice', $pengadaan->no_invoice) }}" required maxlength="20">
        </div>

        <div class="mb-3">
            <label>No Seri Barang</label>
            <input type="text" name="no_seri_barang" class="form-control" value="{{ old('no_seri_barang', $pengadaan->no_seri_barang) }}" required maxlength="50">
        </div>

        <div class="mb-3">
            <label>Tahun Produksi</label>
            <input type="text" name="tahun_produksi" class="form-control" value="{{ old('tahun_produksi', $pengadaan->tahun_produksi) }}" required maxlength="5">
        </div>

        <div class="mb-3">
            <label>Tanggal Pengadaan</label>
            <input type="date" name="tgl_pengadaan" class="form-control" value="{{ old('tgl_pengadaan', $pengadaan->tgl_pengadaan) }}" required>
        </div>

        <div class="mb-3">
            <label>Harga Barang</label>
            <input type="number" name="harga_barang" class="form-control" value="{{ old('harga_barang', $pengadaan->harga_barang) }}" required>
        </div>

        <div class="mb-3">
            <label>Nilai Barang</label>
            <input type="number" name="nilai_barang" class="form-control" value="{{ old('nilai_barang', $pengadaan->nilai_barang) }}" required>
        </div>

        <div class="mb-3">
            <label>FB</label>
            <select name="fb" class="form-control" required>
                <option value="0" {{ $pengadaan->fb == 0 ? 'selected' : '' }}>Tidak</option>
                <option value="1" {{ $pengadaan->fb == 1 ? 'selected' : '' }}>Ya</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $pengadaan->keterangan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
