@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Daftar Lokasi</h4>
        <a href="{{ route('lokasi.create') }}" class="btn btn-primary">Tambah Lokasi</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Lokasi</th>
                <th>Nama Lokasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lokasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_lokasi }}</td>
                    <td>{{ $item->nama_lokasi }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('lokasi.edit', $item->id_lokasi) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('lokasi.destroy', $item->id_lokasi) }}" method="POST" style="display:inline-block;">
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
