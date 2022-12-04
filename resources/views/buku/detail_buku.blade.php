@extends('layouts.app')

@section('content')

@if(Session::has('komen'))
    <div class="alert alert-success">{{ Session::get('komen') }}</div>
@endif

<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="/css/lightbox.css">
<script src="/js/lightbox.js"></script>

<section id="album" class="py-1 bg-light mb-4">
    <div class="container text-center ">
        <h2>Buku: {{ $bukus->judul }}</h2>
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
    {{-- <form action="" method="POST" class="mx-3 col-md-6">
        @csrf
        <div class="form-group mb-3">
            <label for="komentar">Komentar</label>
            <textarea type="textarea" class="form-control" name="komentar"></textarea>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Post</button>
            <a href="/galeri" class="btn btn-warning">Batal</a>
        </div>
    </form> --}}
</section>
<section class="container-xl">
    <form action="{{ route('komentar.add_comment', $bukus->id) }}" method="POST">
      @csrf
      <div class="my-3">
        <label for="komentar" class="form-label">Komentar</label>
        <textarea class="form-control @error('komentar') is-invalid @enderror" id="komentar" placeholder="Isi komentar anda di sini" name="komentar" rows="3"></textarea>
        @error('komentar')
        <div class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </div>@enderror
      </div>
      <button type="submit" class="btn btn-primary">Post</button>
    </form>
    <a href="/buku" class="btn btn-warning mt-3">Kembali</a>
  </section>

@endsection