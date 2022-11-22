@extends('layouts.app')

@section('content')
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/css/lightbox.css">
<script src="/js/lightbox.js"></script>

<section id="album" class="py-1 text-center bg-light">
    <div class="container">
        <h2>Buku:  {{ $bukus->judul }}</h2>
        <hr>
        <div class="row">
            @foreach ($galeris as $data)
            <div class="col-md-4">
            <a href="{{ asset('images/'.$data->foto) }}"
            data-lightbox="image-1" data-title="{{ $data->keterangan }}">
                <img src="{{ asset('images/'.$data->foto) }}" style="width:200px; height:150px"></a>
                <p><h5>{{ $data->nama_galeri }}</h5></p>
            </div>
            @endforeach
        </div>
        <div>{{ $galeris->links() }}</div>
    </div>
</section>

@endsection