<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;
use Illuminate\Support\Facades\Auth;

class KomentarController extends Controller
{
    public function add_comment(Request $request, $bukuId){
        $this->validate($request, [
            'komentar' => 'required|string',
        ]);

        Komentar::create([
            'id_user' => Auth::id(),
            'id_buku' => $bukuId,
            'comment' => $request->komentar,
        ]);

        return back()->with('komen', 'Komentar berhasil ditambahkan');
    }
}
