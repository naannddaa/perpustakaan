<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registrasi extends Model
{
    use HasFactory;

    protected $table = 'user_details'; // Sesuaikan dengan nama tabel

    protected $fillable = [
        'username',
        'password',
        'nama_lengkap',
        'alamat',
        'gaji_pokok',
        'pinjaman',
    ];
}


