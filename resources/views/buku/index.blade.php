@extends('layouts.app')

@section('content')

@if(Session::has('tambah'))
    <div class="alert alert-success">{{ Session::get('tambah') }}</div>
@endif

@if(Session::has('edit'))
    <div class="alert alert-success">{{ Session::get('edit') }}</div>
@endif

@if(Session::has('hapus'))
    <div class="alert alert-danger">{{ Session::get('hapus') }}</div>
@endif

<form action="{{ route('buku.search') }}" method="get">@csrf
    <input type="text" name="kata" class="form-control" placeholder="Cari ..." 
    style="display:inline; width: 30%; margin-top:10px; margin-bottom:15px; float:right;">
</form>

<table class="table table-stripted" border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>Judul Buku</th>
            <th>Penulis</th>
            <th>Harga</th>
            <th>Tgl. Terbit</th>
            {{-- @if(Auth::check() && Auth::user()->level == 'admin') --}}
            <th>Aksi</th>
            {{-- @endif --}}
        </tr>
    </thead>
    <tbody>
        @foreach($data_buku as $buku)
            <tr>
                <td>{{ ++$no }}</td>
                <td>{{ $buku->judul }}</td>
                <td>{{ $buku->penulis }}</td>
                <td>{{ "Rp ".number_format($buku->harga, 0, ',', '.') }}</td>
                <td>{{ $buku->tgl_terbit->format('d/m/Y') }}</td>
                @if(Auth::check() && Auth::user()->level == 'admin')
                <td>
                    <a href="{{ route('buku.edit', $buku->id)}}">
                        <button>Update</button>
                    </a>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                        @csrf
                        <button onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                    </form>
                </td>
                @endif

            </tr>
        @endforeach
    </tbody>
</table>
<p align="center"><a href="{{ route('buku.create') }}">Tambah Buku</a></p>

<div>{{ $data_buku->links() }}</div>
<div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>

<br>
<h4>Jumlah Total Data yang Dimiliki : {{ $buku->count('id') }}</h4>
<h4>Jumlah Total Harga Semua Buku : {{ "Rp ".number_format($buku->sum('harga')) }}</h4>

@endsection