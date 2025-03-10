<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class regis extends Model
{
    use HasFactory;

    protected $table = 'registrasi'; // Sesuaikan dengan nama tabel

    protected $fillable = [
        'username',
        'password',
        'nama_lengkap',
        'alamat',
        'gaji_pokok',
        'pinjaman',
    ];
}
