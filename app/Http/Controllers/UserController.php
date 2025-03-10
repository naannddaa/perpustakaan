<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDetail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = UserDetail::all();
        return view('users.index', compact('users'));
    }

    // public function create()
    // {
    //     return view('users');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'username' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', 'unique:user_details'],
    //         'password' => 'required|min:6',
    //         'nama_lengkap' => 'required|string',
    //         'alamat' => 'required|string',
    //         'gaji_pokok' => 'required|numeric',
    //         'pinjaman' => 'required|numeric',
    //     ]);

    //     $users = [
    //         'username' => $request->username, // Gunakan nama_lengkap dari form
    //         'nama_lengkap' => $request->nama_lengkap, // Gunakan username sebagai email
    //         'password' => Hash::make($request->password),
    //         'alamat' => $request->alamat,
    //         'gaji' => $request->gaji, // Pastikan ada di model dan database
    //         'pinjaman' => $request->pinjaman // Pastikan ada di model dan database
    //     ];

    //     UserDetail::create($users);

    //     return redirect()->route('home')->with('success', 'Registrasi berhasil! Silakan login.');

    // }

    // public function edit($id)
    // {
    //     $user = UserDetail::findOrFail($id);
    //     return view('users.edit', compact('user'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $user = UserDetail::findOrFail($id);

    //     $request->validate([
    //         'nama_lengkap' => 'required|string',
    //         'alamat' => 'required|string',
    //         'gaji_pokok' => 'required|numeric',
    //         'pinjaman' => 'required|numeric',
    //     ]);

    //     $user->update($request->all());

    //     return redirect('/users');
    // }

    // public function destroy($id)
    // {
    //     $user = UserDetail::findOrFail($id);
    //     $user->delete();

    //     return redirect('/users');
    // }
}
