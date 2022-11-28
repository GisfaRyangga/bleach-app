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

<link rel="stylesheet" href="css/lightbox.css">
<script src="js/lightbox.js"></script>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

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
                    <div class="d-flex gap-2">
                        <a href="{{ route('buku.detail_buku', $buku->buku_seo)}}">
                            <button class="btn btn-primary">Detail</button>
                        </a>
                        <a href="{{ route('buku.edit', $buku->id)}}">
                            <button class="btn btn-primary">Update</button>
                        </a>
                        <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                            @csrf
                            <button class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                        </form>
                    </div>
                    
                </td>
                @endif

            </tr>
        @endforeach
    </tbody>
</table>
<p align="center"><a href="{{ route('buku.create') }}"><button class="btn btn-primary">Tambah Buku</button></a></p>
{{-- 
<div>{{ $data_buku->links() }}</div>
<div><strong>Jumlah Buku: {{ $jumlah_buku }}</strong></div>

<br>
<h4>Jumlah Total Data yang Dimiliki : {{ $buku->count('id') }}</h4>
<h4>Jumlah Total Harga Semua Buku : {{ "Rp ".number_format($buku->sum('harga')) }}</h4> --}}

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

@endsection