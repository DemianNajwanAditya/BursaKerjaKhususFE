<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies as Middleware;

class EncryptCookies extends Middleware
{
    /**
     * Daftar cookie yang tidak perlu dienkripsi.
     *
     * @var array<int, string>
     */
    protected $except = [
        // Contoh: 'cookie_name_tanpa_enkripsi',
    ];
}
