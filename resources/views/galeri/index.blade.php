<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
        crossorigin="anonymous">
<table class="table table-stripted" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Galeri</th>
            <th>Judul</th>
            <th>Keterangan</th>
            <th>Foto</th>
            <th>Aksi</th>
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
            <td>
                <form action="{{ route('galeri.destroy', $data->id) }}" method="post">
                @csrf
                    <a href="{{ route('galeri.edit', $data->id) }}" class="btn btn-info">
                    <i class="fa fa-pencil-alt"></i> Edit</a>
                    <button class="btn btn-danger" onclick="return confirm('Yakin mau dihapus?')">
                    <i class="fa fa-times"></i> Hapus </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<p align="center"><a href="{{ route('galeri.create') }}">Tambah Buku</a></p>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
crossorigin="anonymous"></script>