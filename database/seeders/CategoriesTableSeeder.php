<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kategori;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // Data dummy untuk tabel categories
        Kategori::create(['nama' => 'Novel']);
        Kategori::create(['nama' => 'Komik']);
        Kategori::create(['nama' => 'Majalah']);
    }
}
