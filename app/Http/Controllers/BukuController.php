<?php
namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Komentar;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $buku->buku_seo = Str::slug($request->judul, '-');
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->suka = 0;
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

    public function galbuku($bukuSeo){
        $bukus = Buku::where('buku_seo', $bukuSeo)->first();
        $galeris = $bukus->photos()->orderBy('id', 'desc')->paginate(6);
        $komentar = Komentar::all()->where('id_buku', $bukus->id);
        $users = User::all();
        $allKomentar = $bukus->komen()->paginate(10);
        return view('buku.detail_buku', compact('bukus', 'galeris', 'komentar', 'users', 'allKomentar'));
    }

    public function likebuku(Request $request, $id){
        $buku = Buku::find($id);
        $buku->increment('suka');
        return back();
    }

    public function add_comment(Request $request, $id){
        $this->validate($request,[
            'comment' => 'required|string',
        ]);
        $komentar = new Komentar;
        $komentar -> comment = $request->comment;
        $komentar -> id_buku = $id;
        $komentar -> id_user = Auth::user()->id;
        $komentar -> save();
        return back();
    }
}