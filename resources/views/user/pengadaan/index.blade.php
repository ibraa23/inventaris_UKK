@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Daftar Pengadaan</h4>

    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pengadaan</th>
                <th>Master Barang</th>
                <th>Depresiasi</th>
                <th>Merk</th>
                <th>Satuan</th>
                <th>Sub Kategori Asset</th>
                <th>Distributor</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($pengadaan as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_pengadaan }}</td>
                    <td>{{ $item->masterBarang->nama_barang }}</td>
                    <td>{{ $item->depresiasi->keterangan }}</td>
                    <td>{{ $item->merk->merk }}</td>
                    <td>{{ $item->satuan->satuan }}</td>
                    <td>{{ $item->subKategoriAsset->sub_kategori_asset }}</td>
                    <td>{{ $item->distributor->nama_distributor }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
