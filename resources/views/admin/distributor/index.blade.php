@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Daftar Distributor</h4>
        <a href="{{ route('distributor.create') }}" class="btn btn-primary">Tambah Distributor</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Distributor</th>
                <th>Alamat</th>
                <th>No. Telepon</th>
                <th>Email</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($distributors as $distributor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $distributor->nama_distributor }}</td>
                    <td>{{ $distributor->alamat }}</td>
                    <td>{{ $distributor->no_telp }}</td>
                    <td>{{ $distributor->email }}</td>
                    <td>{{ $distributor->keterangan }}</td>
                    <td>
                        <a href="{{ route('distributor.edit', $distributor->id_distributor) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('distributor.destroy', $distributor->id_distributor) }}" method="POST" style="display:inline-block;">
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
