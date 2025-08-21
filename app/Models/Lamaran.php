<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelamar',
        'lowongan',
        'cv',
        'status',
    ];


    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'nama_pelamar');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'lowongan');
    }
}
