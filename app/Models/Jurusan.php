<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'icon',
        'deskripsi',
        'slug'
    ];

    public function getIconUrl()
    {
        return asset('storage/icons/' . $this->icon);
    }
}
