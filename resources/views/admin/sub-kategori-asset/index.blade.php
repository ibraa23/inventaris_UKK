@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Sub-Kategori Asset</h4>
        <a href="{{ route('sub-kategori-asset.create') }}" class="btn btn-primary">Tambah Sub-Kategori</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Sub-Kategori</th>
                <th>Nama Sub-Kategori</th>
                <th>Kategori Asset</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($subKategoriAssets as $subKategoriAsset)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subKategoriAsset->kode_sub_kategori_asset }}</td>
                    <td>{{ $subKategoriAsset->sub_kategori_asset }}</td>
                    <td>{{ $subKategoriAsset->kategoriAsset->kategori_asset }}</td>
                    <td>
                        <a href="{{ route('sub-kategori-asset.edit', $subKategoriAsset->id_sub_kategori_asset) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('sub-kategori-asset.destroy', $subKategoriAsset->id_sub_kategori_asset) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
