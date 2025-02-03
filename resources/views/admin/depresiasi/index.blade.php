@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 style="font-weight: 600; color: #4A4A4A;">Daftar Depresiasi</h4>
        <a href="{{ route('admin.depresiasi.create') }}" class="btn btn-gradient">Tambah Depresiasi</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success" style="background: rgba(92, 184, 92, 0.2); border: none; color: #5CB85C;">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered" style="background: rgba(255, 255, 255, 0.8); border-radius: 10px; overflow: hidden;">
            <thead style="background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%); color: #fff;">
                <tr>
                    <th style="text-align: center;">No</th>
                    <th>Lama Depresiasi</th>
                    <th>Keterangan</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($depresiasi as $item)
                    <tr>
                        <td style="text-align: center;">{{ $loop->iteration }}</td>
                        <td>{{ $item->lama_depresiasi }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td style="text-align: center;">
                            <a href="{{  auth()->user()->role === 'admin' ? route('admin.depresiasi.edit', $item->id_depresiasi) : route('depresiasi.edit', $item->id_depresiasi)}}" class="btn btn-sm btn-warning btn-gradient">Edit</a>
                            <form action="{{ route('admin.depresiasi.destroy', $item->id_depresiasi) }}" method="POST" style="display:inline-block; margin-left: 5px;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger btn-gradient" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    .btn-gradient {
        background: linear-gradient(135deg, #ff7eb3, #ff758c);
        color: #fff;
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .btn-gradient:hover {
        background: linear-gradient(135deg, #ff758c, #ff7eb3);
        transform: scale(1.05);
    }

    table {
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    thead tr {
        background: linear-gradient(135deg, #6a11cb, #2575fc);
    }

    thead th {
        text-align: center;
        color: #fff;
        font-weight: bold;
        padding: 1rem;
    }

    tbody tr:hover {
        background: rgba(0, 123, 255, 0.1);
    }
</style>
@endsection
