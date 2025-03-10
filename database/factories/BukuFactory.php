<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Buku;

class BukuFactory extends Factory{
    protected $model = Buku::class;

    public function definition(): array
    {
        return[
            'judul' => $this->faker->sentence(nbWords: 3),
            'pengarang' => $this->faker->name(),
            'tgl_pembelian' => $this->faker->date(),
            'jumlah' => $this->faker->numberBetween(int1:1, int2:20),
            'status' => $this->faker->randomElement(array:['tersedia', 'tidak tersedia']),
            'created_at' =>now(),
            'updated_at' =>now()
        ];
    }
}