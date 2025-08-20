<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelamar',
        'lowongan_id',
        'cv',
        'status',
        'created_at',
        'updated_at'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke Lowongan
    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'lowongan_id');
    }
}
