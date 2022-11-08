<table class="table table-stripted" border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
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
            {{-- @foreach ($buku as $bukus) --}}
            <td>{{ $data->$album->judul }}</td>
            {{-- @endforeach --}}
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



