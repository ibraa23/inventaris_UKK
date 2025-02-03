@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h4>Daftar Opname</h4>
    <a href="{{auth()->user()->role === 'admin' ?  route('admin.opname.create') : route('opname.create') }}" class="btn btn-primary mb-3">Tambah Opname</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pengadaan</th>
                <th>Tanggal Opname</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($opnames as $opname)
            <tr>
                <td>{{ $opname->id_opname }}</td>
                <td>{{ $opname->pengadaan->kode_pengadaan }} - {{ $opname->pengadaan->no_seri_barang }}</td>
                <td>{{ $opname->tgl_opname }}</td>
                <td>{{ $opname->kondisi }}</td>
                <td>{{ $opname->keterangan }}</td>
                <td>
                    <a href="{{ auth()->user()->role === 'admin' ?  route('admin.opname.edit', $opname->id_opname) : route('opname.edit', $opname->id_opname) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.opname.destroy', $opname->id_opname) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
