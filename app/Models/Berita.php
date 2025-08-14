<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi',
        'foto',
        'slug',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getExcerpt($limit = 150)
    {
        return \Str::limit(strip_tags($this->isi), $limit);
    }

    public function getFormattedDate()
    {
        return $this->created_at->format('d M Y');
    }
}
