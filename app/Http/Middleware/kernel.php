<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Kernel
{
    protected $middleware = [
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ];

    public function handle(Request $request, Closure $next)
    {
        return $next($request);
    }
}
