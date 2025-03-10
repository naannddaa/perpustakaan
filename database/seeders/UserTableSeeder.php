<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // Tambahkan ini

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Menambahkan user secara manual
        DB::table('users')->insert([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Menambahkan user menggunakan factory
        User::factory()->count(50)->create(); // Buat 50 user dummy
    }
}
