@extends('layouts.app')

@section('content')

@if(Auth::check() && Auth::user()->level == 'admin')
<table class="table table-stripted" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Galeri</th>
            <th>Judul</th>
            <th>Keterangan</th>
            <th>Foto</th>
            {{-- @if(Auth::check() && Auth::user()->level == 'admin') --}}
            <th>Aksi</th>
            {{-- @endif --}}
        </tr>
    </thead>
    <tbody>
        @foreach ($galeri as $data)
        <tr>
            <td>{{ ++$no }}</td>
            <td>{{ $data->nama_galeri }}</td>
            <td>{{ $data->album->judul }}</td>
            <td>{{ $data->keterangan }}</td>
            <td><img src="{{ asset('thumb/'.$data->foto) }}" style="width: 100px"></td>
            {{-- @if(Auth::check() && Auth::user()->level == 'admin') --}}
            <td>
                <form action="{{ route('galeri.destroy', $data->id) }}" method="post">
                @csrf
                    <a href="{{ route('galeri.edit', $data->id) }}" class="btn btn-info">
                    <i class="fa fa-pencil-alt"></i> Edit</a>
                    <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')">
                    <i class="fa fa-times"></i> Hapus </button>
                </form>
            </td>
            {{-- @endif --}}
        </tr>
        @endforeach
    </tbody>
</table>
<p align="center"><a href="{{ route('galeri.create') }}">Tambah Buku</a></p>

@endif
@endsection