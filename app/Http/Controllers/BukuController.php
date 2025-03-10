<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $query = Buku::query();

        if (!empty($katakunci)) {
            $query->where('judul', 'like', "%$katakunci%")
                  ->orWhere('pengarang', 'like', "%$katakunci%");
        }

        $databuku = $query->orderBy('tgl_pembelian', 'desc')->paginate(10);
        return view('buku', compact('databuku'));
    }
}
