<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'perusahaan',
        'lokasi',
        'gaji',
    ];

    // Relasi: satu lowongan bisa punya banyak lamaran
    public function lamarans()
    {
        return $this->hasMany(Lamaran::class);
    }
}
