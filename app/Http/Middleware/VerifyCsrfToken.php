<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        //
        '/admin/project/onoff',
        '/admin/project/delete',
        '/admin/project/update/onoff',
        '/admin/project/update/delete',
        '/admin/page/onoff',
        '/admin/page/delete',
        '/admin/account/logodelete',
        '/admin/account/favicondelete',
        '/admin/account/accountdelete',
    ];
}
