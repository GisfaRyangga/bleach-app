@extends('layout.master')

@section('content')

@if(count($data_buku))
    <div class="alert alert-success">
        Ditemukan <strong>{{count($data_buku)}}</strong> data dengan kata : <strong>{{ $cari }}</strong>
    </div>

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
            <th>Aksi</th>
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
                <td>
                    <a href="{{ route('buku.edit', $buku->id)}}">
                        <button>Update</button>
                    </a>
                    <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                        @csrf
                        <button onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>


    


<div>{{ $data_buku->links() }}</div>
<div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>

<p align="center"><a href="{{ route('buku.create') }}">Tambah Buku</a></p>

@else
    <div class="alert alert-warning">
        <h4>Data {{$cari}} tidak ditemukan</h4>
        <a href="/buku" class="btn btn-warning">Kembali</a>
    </div> 
@endif

@endsection