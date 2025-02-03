@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Tambah Pengadaan</h4>
    <form action="{{ route('admin.pengadaan.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Master Barang</label>
            <select name="id_master_barang" class="form-control" required>
                <option value="">-- Pilih Master Barang --</option>
                @foreach($masterBarang as $item)
                    <option value="{{ $item->id_barang }}">{{ $item->nama_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Depresiasi</label>
            <select name="id_depresiasi" class="form-control" required>
                <option value="">-- Pilih Depresiasi --</option>
                @foreach($depresiasi as $item)
                    <option value="{{ $item->id_depresiasi }}">{{ $item->keterangan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Merk</label>
            <select name="id_merk" class="form-control" required>
                <option value="">-- Pilih Merk --</option>
                @foreach($merk as $item)
                    <option value="{{ $item->id_merk }}">{{ $item->merk }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Satuan</label>
            <select name="id_satuan" class="form-control" required>
                <option value="">-- Pilih Satuan --</option>
                @foreach($satuan as $item)
                    <option value="{{ $item->id_satuan }}">{{ $item->satuan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Sub Kategori Asset</label>
            <select name="id_sub_kategori_asset" class="form-control" required>
                <option value="">-- Pilih Sub Kategori Asset --</option>
                @foreach($subKategoriAsset as $item)
                    <option value="{{ $item->id_sub_kategori_asset }}">{{ $item->sub_kategori_asset }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Distributor</label>
            <select name="id_distributor" class="form-control" required>
                <option value="">-- Pilih Distributor --</option>
                @foreach($distributor as $item)
                    <option value="{{ $item->id_distributor }}">{{ $item->nama_distributor }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Kode Pengadaan</label>
            <input type="text" name="kode_pengadaan" class="form-control" required maxlength="20">
        </div>
        <div class="mb-3">
            <label>No Invoice</label>
            <input type="text" name="no_invoice" class="form-control" required maxlength="20">
        </div>
        <div class="mb-3">
            <label>No Seri Barang</label>
            <input type="text" name="no_seri_barang" class="form-control" required maxlength="50">
        </div>
        <div class="mb-3">
            <label>Tahun Produksi</label>
            <input type="text" name="tahun_produksi" class="form-control" required maxlength="5">
        </div>
        <div class="mb-3">
            <label>Tanggal Pengadaan</label>
            <input type="date" name="tgl_pengadaan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Harga Barang</label>
            <input type="number" name="harga_barang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Nilai Barang</label>
            <input type="number" name="nilai_barang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>FB</label>
            <select name="fb" class="form-control" required>
                <option value="0">Tidak</option>
                <option value="1">Ya</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
