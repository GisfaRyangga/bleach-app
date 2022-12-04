<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = ['judul', 'penulis', 'harga', 'tgl_terbit'];
    protected $dates = ['tgl_terbit'];

    public function galeri(){
        return $this->hasMany("App\Models\Galeri");
    }

    public function photos(){
        return  $this->hasMany(Galeri::class, 'id_buku', 'id');
    }

    public function komen() {
        return $this->hasMany(Komentar::class, 'id_buku', 'id');
    }
}
