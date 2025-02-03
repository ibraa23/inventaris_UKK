@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Daftar Merk</h4>
        <a href="{{ route('merk.create') }}" class="btn btn-primary">Tambah Merk</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Merk</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($merks as $merk)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $merk->merk }}</td>
                    <td>{{ $merk->keterangan }}</td>
                    <td>
                        <a href="{{ route('merk.edit', $merk->id_merk) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('merk.destroy', $merk->id_merk) }}" method="POST" style="display:inline-block;">
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
