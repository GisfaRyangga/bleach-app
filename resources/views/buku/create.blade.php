@extends('layout.app')

@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<div class="container">
    <h4>Tambah Buku</h4>
    @if (count($errors) > 0)
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    
    <form method="post" action="{{ route('buku.store') }}">
    @csrf
        <div class="form-group mb-3">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul">
        </div>
        <div class="form-group mb-3">
            <label for="penulis">Penulis</label>
            <input type="text" class="form-control" name="penulis">
        </div>
        <div class="form-group mb-3">
            <label for="harga">Harga</label>
            <input type="text" class="form-control" name="harga">
        </div>
        <div class="form-group mb-3">
            <label for="tgl_terbit">Tgl. Terbit</label>
            <input type="date" id="datepicker" name="tgl_terbit" class="date form-control" placeholder="yyyy/mm/dd">
        </div>
        <div>
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/buku" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<div class="container">
    <h4>Tambah Buku</h4>
    <form method="post" action="{{ route('buku.store') }}">
    @csrf
        <div>Judul <input type="text" name="judul"></div>
        <div>Penulis <input type="text" name="penulis"></div>
        <div>Harga <input type="text" name="harga"></div> -->
        <!-- <div>Tgl. Terbit <input type="text" name="tgl_terbit"></div> -->
        <!-- <div>Tgl. Terbit <input type="text" name="tgl_terbit"
        class="date form-control" id="datepicker" placeholder="yyyy/mm/dd"></div>
        
        <div><button type="submit">Simpan</button>
        <a href="/buku">Batal</a></div>
    </form>
</div> -->

<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script> -->