@extends('layouts.app')

@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Kategori Asset</h4>
        <a href="{{ route('kategori-asset.create') }}" class="btn btn-primary">Tambah Kategori</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Kategori</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoriAssets as $kategoriAsset)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $kategoriAsset->kode_kategori_asset }}</td>
                    <td>{{ $kategoriAsset->kategori_asset }}</td>
                    <td>
                        <a href="{{ route('kategori-asset.edit', $kategoriAsset->id_kategori_asset) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('kategori-asset.destroy', $kategoriAsset->id_kategori_asset) }}" method="POST" style="display:inline-block;">
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
