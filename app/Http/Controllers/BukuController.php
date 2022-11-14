<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //fungsi index
    public function index(){
        $batas = 5;
        $jumlah_buku = Buku::count();
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('buku/index', compact('data_buku', 'no', 'jumlah_buku'));    
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul','like',"%".$cari."%")->orwhere('penulis','like',"%".$cari."%")
            ->paginate($batas);
        $jumlah_buku = $data_buku->count();
        $no = $batas * ($data_buku->currentPage() - 1);
        return view('buku.search', compact('jumlah_buku','data_buku','no','cari'));
    }

    public function create(){
        return view('buku.create'); 
    }

    public function store(Request $request){
        $this->validate($request,[
            'judul'         => 'required|string',
            'penulis'       => 'required|string|max:30',
            'harga'         => 'required|numeric',
            'tgl_terbit'    => 'required|date'
        ]);
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku-> save();
        return redirect('/buku')->with('tambah', 'Data buku berhasil di simpan');
    }

    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('hapus', 'Data buku berhasil di simpan');
    }
    
     public function edit($id){
        $buku = Buku::find($id);
        return view('buku.update', compact('buku'));
    }

    public function update(Request $request, $id){
        $buku = Buku::find($id);
        $buku-> update([
            'judul'=>$request->judul,
            'penulis'=>$request->penulis,
            'harga'=>$request->harga,
            'tgl_terbit'=>$request->tgl_terbit
       ]);
        return redirect('/buku')->with('edit', 'Data buku berhasil di simpan');
    }
}