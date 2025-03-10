<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{

    public function run()
    {
        DB::table('buku')->insert([
            [
                'judul' => 'cara menjadi hacker',
                'pengarang' => 'Nabia',
                'tgl_pembelian' => '2025-04-03',
                'jumlah' => '5',
                'status' => 'tersedia',
            ],
            [
                'judul' => 'belajar laravel',
                'pengarang' => 'juan maulana',
                'tgl_pembelian' => '2025-01-01',
                'jumlah' => '15',
                'status' => 'tersedia',
            ]
            ]);
    }
}
