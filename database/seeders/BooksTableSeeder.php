<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        // Data dummy manual
        Book::create([
            'judul' => 'Laravel untuk Pemula',
            'penulis' => 'John Doe',
            'tahun_terbit' => 2023,
        ]);

        Book::create([
            'judul' => 'Belajar PHP',
            'penulis' => 'Jane Doe',
            'tahun_terbit' => 2022,
        ]);

        // Data dummy menggunakan Factory
        Book::factory()->count(10)->create();
    }
}
