<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Http\Request;

class TrustProxies extends Middleware
{
    /**
     * Daftar alamat IP proxy yang dipercaya.
     *
     * @var array|string|null
     */
    protected $proxies = '*'; // Bisa juga array IP proxy, atau null

    /**
     * Header proxy yang harus dipercaya.
     *
     * @var int
     */
protected $headers = Request::HEADER_X_FORWARDED_FOR
                   | Request::HEADER_X_FORWARDED_HOST
                   | Request::HEADER_X_FORWARDED_PORT
                   | Request::HEADER_X_FORWARDED_PROTO;

}
