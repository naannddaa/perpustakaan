<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Gambar extends Model
{
    public function imageable() {
        return $this->morphTo();
        }
}
