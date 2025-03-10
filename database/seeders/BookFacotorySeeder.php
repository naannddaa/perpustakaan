<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    protected $model = Book::class;

    public function definition()
    {
        return [
            'judul' => $this->faker->sentence,
            'penulis' => $this->faker->name,
            'tahun_terbit' => $this->faker->year,
        ];
    }
}
