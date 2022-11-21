<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'galeri';
    protected $fillable = ['nama_galeri'];

    public function album(){
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }
}

