<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ApiBookController;
use Illuminate\Support\Facades\Route;
use App\Models\Buku;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\homeController;
use Inertia\Inertia;
use App\Http\Controllers\Auth\authController;
use Illuminate\Foundation\Application;
use App\Http\Controllers\registerController;
use App\Http\Controllers\UserController;
use App\Models\registrasi;

// Route untuk halaman utama
Route::get('/', function () {
    return view('welcomee');
});

// Route untuk halaman tugas
Route::get('/tugas', function () {
    return view('tugas');
});

// Route untuk hello
Route::get('/hello', function () {
    return "Hello Nanda!";
});

// Route untuk user dengan ID
// Route::get('/user/{id}', function ($id) {
//     return "User ID: " . $id;
// });

// Route untuk user dengan nama opsional
// Route::get('/user/{name?}', function ($name = "nanda") {
//     return "Hello, " . $name;
// });

// Route untuk metode HTTP
Route::get('/data', function () { return "GET Request"; });
Route::post('/data', function () { return "POST Request"; });
Route::put('/data', function () { return "PUT Request"; });
Route::delete('/data', function () { return "DELETE Request"; });
Route::patch('/data', function () { return "PATCH Request"; });

// Route untuk greeting
Route::get('/greeting', function () {
    return view('greeting', ['name' => 'NANDA AYU ASTARIKA']);
});

// Route untuk layout2
Route::get('/layout2', function () {
    return view('layout2');
});

// Route untuk BookController

Route::get('/book', [BookController::class, 'index']);
Route::get('/book/{id}', [BookController::class, 'show']);
Route::post('/book', [BookController::class, 'store']);
Route::put('/book/{id}', [BookController::class, 'update']);
Route::delete('/book/{id}', [BookController::class, 'destroy']);
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');



// Route API untuk ApiBookController
Route::apiResource('book', ApiBookController::class);

// Route fallback (harus di bagian paling bawah)
Route::fallback(function () {
    return "404 - Not Found";
});


Route::get('/createBuku', function () {
    Buku::create([
        'buku' => 'Pengantar Tidur',
        'pengarang' => 'Nanda Ayu',
        'tgl_pembelian' => now(),
        'jumlah' => 7,
        'status' => 'tersedia'
    ]);
    return 'Buku berhasil ditambahkan';
});


Route::get('listbuku', function () {
    return Buku::all();
});


Route::get('/users', [UserController::class, 'index'])->name('user');
Route::get('/users/create', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}/edit', [UserController::class, 'edit']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);


// Registrasi
Route::get('/home', [homeController::class, 'indexhome'])->name('home');
Route::get('/register', [registerController::class, 'index'])->name('register');
Route::get('/register/create', [registerController::class, 'create']);
Route::post('/register/store', [registerController::class, 'store'])->name('register.store');
Route::put('/register/update/{id}', [registerController::class, 'update'])->name('register.update');
Route::delete('/register/{id}/destroy', [registerController::class, 'destroy'])->name('register.destroy');

// midleware
Route::get('/akses', function () {
    return "selamat datang!";
})->middleware('cek.usia');

// middleware dengan paramaeter
Route::get('/akses{age}', function () {
    return "selamat datang!";
})->middleware('cek.usia');

// middleware
Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::post('/login', [authController::class, 'login'])->name('login');

// sanctum
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
//     });

// middleware auth, untuk tertentu
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
    return view('dashboard');
    });
    });
// untuk API
// Route::middleware(['auth:sanctum'])->get('/profile',
// function (Request $request) {
// return $request->user();
// });

//verifikasi email
Route::get('/dashboard', function () {
    return view('dashboard');
    })->middleware(['auth', 'verified']);



// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest
// $request) {
// $request->fulfill();
// return redirect('/dashboard');
// })->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/email/verify', function () {
    return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');


    // Route::post('/email/resend', function (Request $request) {
    //     $request->user()->sendEmailVerificationNotification();
    //     return back()->with('message', 'Verification link sent!');
    //     })->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
