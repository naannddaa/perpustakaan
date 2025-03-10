<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class registerController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data registrasi dari database
        $dataregistrasi = User::all();
        return view('layout.register', compact('dataregistrasi'));
    }



    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            // username harus format email
            'username' => ['required', 'string', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/'],
            'password' => ['required', 'min:6'], // panjang data minimal 6 digit
            'nama_lengkap' => ['required', 'string'],
            'alamat' => ['required','string'],
            'gaji_pokok' => ['required', 'integer'], // format harus angka
            'pinjaman' => ['required', 'integer'] //format angka

        ]);

        $dataregistrasi = [
            'username' => $request->username,
            'nama_lengkap' => $request->nama_lengkap,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'gaji_pokok' => $request->gaji_pokok,
            'pinjaman' => $request->pinjaman
        ];

        User::create($dataregistrasi);

        return redirect()->route('home')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id); // Ambil data berdasarkan ID
        return view('register.edit', compact('data'));
    }

    public function update(Request $request, $id)
        {
    $data = User::findOrFail($id);

    $data->username = $request->username;
    $data->nama_lengkap = $request->nama_lengkap;
    $data->alamat = $request->alamat;
    $data->gaji_pokok = $request->gaji_pokok;
    $data->pinjaman = $request->pinjaman;

    if (!empty($request->password)) {
        $data->password = Hash::make($request->password);
    }

    $data->save();

    return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
{
    $user = User::find($id);
    if (!$user) {
        return response()->json(['error' => 'Data tidak ditemukan'], 404);
    }

    $user->delete();
    return response()->json(['success' => 'Data berhasil dihapus']);
}


}
