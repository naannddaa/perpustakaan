<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // public function login(Request $request) {
    //     // Validasi input
    //     $request->validate([
    //         'email' => 'required|string|email',
    //         'password' => 'required|string',
    //     ]);

    //     // Coba autentikasi
    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         $user = Auth::user();

    //         // Buat token untuk user
    //         // $token = $user->createToken('authToken')->plainTextToken;

    //         return response()->json([
    //             'message' => 'Login berhasil!',
    //             'user' => $user,
    //             // 'token' => $token
    //         ]);
    //     }

        // Jika autentikasi gagal
    //     return response()->json([
    //         'message' => 'Email atau password salah.'
    //     ], 401); // Kode status 401 untuk Unauthorized
    // }


    public function login(Request $request) {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Unauthorized'], 401);
        }
        return response()->json([
        'token' => $user->createToken('authToken')->plainTextToken,
        ]);
        }


    public function logout(Request $request) {
        // Hapus token saat ini
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout berhasil!'
        ]);
    }

    public function register(Request $request) {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Buat token untuk user baru
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'message' => 'Registrasi berhasil!',
            'user' => $user,
            'token' => $token
        ], 201); // Kode status 201 untuk Created
    }
}
