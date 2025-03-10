<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'username', 'password', 'nama_lengkap', 'alamat', 'gaji_pokok', 'pinjaman'
    ];

    protected $hidden = ['password'];
}

