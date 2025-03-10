<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class homeController extends Controller
{

    public function index()
    {
        return view('layout.home');
    }

    public function indexhome(Request $request)
    {
        // Ambil data registrasi dari database
        $dataregistrasi = User::all();
        return view('layout.home', compact('dataregistrasi'));
    }
}
