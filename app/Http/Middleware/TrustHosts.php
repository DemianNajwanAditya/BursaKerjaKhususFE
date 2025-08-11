<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustHosts as Middleware;

class TrustHosts extends Middleware
{
    /**
     * Get the host patterns that should be trusted.
     *
     * @return array<int, string>|null
     */
    public function hosts()
    {
        // Contoh: hanya trust domain example.com dan subdomainnya
        return [
            'example.com',
            '*.example.com',
        ];

        // Jika ingin menerima semua host, bisa return null
        // return null;
    }
}
