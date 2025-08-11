<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * Daftar input yang tidak akan di-trim (spasi tidak dihapus).
     *
     * @var array<int, string>
     */
    protected $except = [
        // Contoh: 'password', 'password_confirmation',
    ];
}
