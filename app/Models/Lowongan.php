<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    use HasFactory;

    protected $fillable = ['judul', 'deskripsi'];

    // Relasi ke Lamaran
    public function lamarans()
    {
        return $this->hasMany(Lamaran::class, 'lowongan');
    }
}
