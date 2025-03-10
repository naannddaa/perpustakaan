<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        // $books = Book::all(); // Mengambil semua data buku
        // return view('books.index', compact('books'));
    }

    public function store(Request $request)
    {
        // Book::create($request->all()); // Menyimpan data buku
        // return redirect()->route('books.index');
    }

    public function update(Request $request, $id)
    {
        // $book = Book::find($id);
        // $book->update($request->all()); // Mengupdate data buku
        // return redirect()->route('books.index');
    }

    public function destroy($id)
    {
        // Book::destroy($id); // Menghapus data buku
        // return redirect()->route('books.index');
    }
}
