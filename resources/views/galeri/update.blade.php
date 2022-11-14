@extends('layouts.app')

@section('content')

<div class="m-3">
    <form action="{{ route('galeri.update', $data->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="nama_galeri">Nama Galeri</label>
            <input type="text" class="form-control" name="nama_galeri" value="{{ $data->nama_galeri }}">
        </div>
        <div class="form-group mb-3">
            <label for="id_buku">Buku</label>
            <select name="id_buku" class="form-control">
                <option value="" selected>Pilih Buku</option>
                @foreach ($buku as $data)
                    <option value="{{ $data->id }}">{{ $data->judul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" class="form-control" value="{{ $data->keterangan }}"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="foto">Upload Foto</label>
            <input  type="file" name="foto" id="formFileMultiple" multiple class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/galeri" class="btn btn-warning">Batal</a>
        </div>
    </form>
</div>

@endsection