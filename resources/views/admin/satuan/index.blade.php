@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Daftar Satuan</h4>
        <a href="{{ route('satuan.create') }}" class="btn btn-primary">Tambah Satuan</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($satuans as $satuan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $satuan->satuan }}</td>
                    <td>
                        <a href="{{ route('satuan.edit', $satuan->id_satuan) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('satuan.destroy', $satuan->id_satuan) }}" method="POST" style="display:inline-block;">
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
