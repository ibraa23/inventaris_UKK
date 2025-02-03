@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h4>Daftar Mutasi Lokasi</h4>
        <a href="{{ route('mutasi-lokasi.create') }}" class="btn btn-primary">Tambah Mutasi Lokasi</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Lokasi</th>
                <th>Pengadaan</th>
                <th>Flag Lokasi</th>
                <th>Flag Pindah</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mutasiLokasi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->lokasi->nama_lokasi }}</td>
                    <td>{{ $item->pengadaan->kode_pengadaan }}</td>
                    <td>{{ $item->flag_lokasi }}</td>
                    <td>{{ $item->flag_pindah }}</td>
                    <td>
                        <a href="{{ route('mutasi-lokasi.edit', $item->id_mutasi_lokasi) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('mutasi-lokasi.destroy', $item->id_mutasi_lokasi) }}" method="POST" style="display:inline-block;">
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
