@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Beasiswa Saya</h2>
    <a href="{{ route('pemberi.beasiswa.create') }}" class="btn btn-primary mb-3">+ Tambah Beasiswa</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Negara</th>
                <th>Jenis</th>
                <th>Jenjang</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dataBeasiswa as $item)
            <tr>
                <td>{{ $item->beasiswa_id }}</td>
                <td>{{ $item->judul_beasiswa }}</td>
                <td>{{ $item->negara }}</td>
                <td>{{ $item->jenis }}</td>
                <td>{{ $item->jenjang }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    <a href="{{ route('pemberi.beasiswa.show', $item->beasiswa_id) }}" class="btn btn-info btn-sm">Lihat</a>
                    <a href="{{ route('pemberi.beasiswa.edit', $item->beasiswa_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pemberi.beasiswa.destroy', $item->beasiswa_id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
