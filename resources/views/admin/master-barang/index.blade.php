@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Daftar Master Barang</h4>
        <a href="{{ route('master-barang.create') }}" class="btn btn-primary">Tambah Barang</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Spesifikasi Teknis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($masterBarangs as $masterBarang)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $masterBarang->kode_barang }}</td>
                    <td>{{ $masterBarang->nama_barang }}</td>
                    <td>{{ $masterBarang->spesifikasi_teknis }}</td>
                    <td>
                        <a href="{{ route('master-barang.edit', $masterBarang->id_barang) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('master-barang.destroy', $masterBarang->id_barang) }}" method="POST" style="display:inline-block;">
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
