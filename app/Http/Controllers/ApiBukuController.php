<?php

namespace App\Http\Controllers;
use App\Models\Buku;
use Illuminate\Http\Request;

    class ApiBukuController extends Controller {
    
        public function index() {
    
            return response()->json(Buku::all());
    }

    public function show($id) {
    
        return response()->json(Buku::find($id));
    
    }

}

