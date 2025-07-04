<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'pelanggan';

    // Kolom-kolom yang bisa diisi
    protected $fillable = [
        'nama',
        'alamat',
        'no_telepon',
        'email',
        'foto_pelanggan' 
    ];
}
