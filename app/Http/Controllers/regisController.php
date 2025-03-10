<?php

namespace App\Http\Controllers;

use App\Models\Registrasi;
use Illuminate\Http\Request;

class regisController extends Controller
{
    // Menampilkan halaman utama dengan data registrasi
    public function index(Request $request)
    {
        // Ambil data registrasi dari database
        $dataregistrasi = registrasi::all();
        return view('regis', compact('dataregistrasi'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        return view('regis.create');
    }

    // Menyimpan data registrasi
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/'], // Hanya menerima email @gmail.com
            'password' => 'required|min:6',
            'nama_lengkap' => 'required|string',
            'alamat' => 'required|string',
            'gaji_pokok' => 'required|numeric',
            'pinjaman' => 'required|numeric',
        ]);

        // Simpan data ke database
        $dataregistrasi = [
            'username' => $request->username,
            'password' => bcrypt($request->password), // Enkripsi password
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'gaji_pokok' => $request->gaji_pokok,
            'pinjaman' => $request->pinjaman,
        ];

        registrasi::create($dataregistrasi);

        // Redirect dengan pesan sukses
        return redirect()->route('regis')->with('success', 'Data Berhasil Disimpan');
    }

    // Menampilkan form edit data
    public function edit($id)
    {
        $data = registrasi::findOrFail($id); // Ambil data berdasarkan ID
        return view('regis.edit', compact('data'));
    }

    // Mengupdate data registrasi
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'username' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/'],
            'password' => 'required|min:6',
            'nama_lengkap' => 'required|string',
            'alamat' => 'required|string',
            'gaji_pokok' => 'required|numeric',
            'pinjaman' => 'required|numeric',
        ]);

        // Update data di database
        $dataregistrasi = [
            'username' => $request->username,
            'password' => bcrypt($request->password), // Enkripsi password
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'gaji_pokok' => $request->gaji_pokok,
            'pinjaman' => $request->pinjaman,
        ];

        registrasi::where('id', $id)->update($dataregistrasi);

        // Redirect dengan pesan sukses
        return redirect()->route('regis')->with('success', 'Data Berhasil Diedit');
    }

    // Menghapus data registrasi
    public function destroy($id)
    {
        registrasi::where('id', $id)->delete();
        return redirect()->route('regis')->with('success', 'Data Berhasil Dihapus');
    }
}
