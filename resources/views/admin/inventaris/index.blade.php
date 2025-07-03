@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Inventaris</h1>
    <a href="{{ route('admin.inventaris.create') }}" class="btn btn-primary mb-3">+ Tambah Inventaris</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventaris as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->kondisi }}</td>
                <td>
                    <a href="{{ route('admin.inventaris.edit', $item->id)}}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('admin.inventaris.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection