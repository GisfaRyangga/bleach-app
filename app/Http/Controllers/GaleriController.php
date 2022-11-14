<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Buku;
use File;
use Image;

class GaleriController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    //fungsi index
    public function index(){
        $buku = Buku::all();
        $batas = 4;
        $no = 0;
        $galeri = Galeri::orderBy('id', 'desc')->paginate($batas); 
        return view('galeri.index', compact('galeri', 'no', 'buku'));
    }

    public function create(){
        $buku = Buku::all();
        return view('galeri.create', compact('buku'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'nama_galeri'=>'required',
            'keterangan'=>'required',
            'foto'=>'required|image|mimes:jpeg,jpg,png'
        ]);
        $galeri = New Galeri;
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;

        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto)->resize(200,150)->save('thumb/'.$namafile);
        $foto->move('images/', $namafile);

        $galeri->foto = $namafile;
        $galeri->save();
        return redirect('/galeri')->with('pesan', 'Data Galeri Buku Berhasil disimpan');
    }

    public function destroy($id){
        $galeri = Galeri::find($id);
        $galeri->delete();
        return redirect('/galeri')->with('hapus', 'Data Galeri Buku Berhasil dihapus');
    }

    public function update(Request $request, $id) {
        $galeri = Galeri::find($id);
        $galeri->nama_galeri = $request->nama_galeri;
        $galeri->keterangan = $request->keterangan;
        $galeri->id_buku = $request->id_buku;

        $foto = $request->foto;
        $namafile = time().'.'.$foto->getClientOriginalExtension();

        Image::make($foto) -> resize(200,150)->save('thumb/'.$namafile);
        $foto->move('public/images/', $namafile);

        $galeri->foto = $namafile;
        $galeri->save();
        return redirect('/galeri');
    }

    public function edit($id) {
        $data = Galeri::find($id);
        $buku = Buku::all();
        return view('galeri.update', compact('data', 'buku'));
    }
}
