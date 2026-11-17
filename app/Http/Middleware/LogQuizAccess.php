<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LogQuizAccess
{
    public function handle(Request $request, Closure $next)
    {
        Log::info('Wejście do quizu', [
            'url' => $request->fullUrl(),
            'ip' => $request->ip(),
            'metoda' => $request->method(),
        ]);

        return $next($request);
    }
}
