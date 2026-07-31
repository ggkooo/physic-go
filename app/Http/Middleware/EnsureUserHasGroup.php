<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserHasGroup
{
    public function handle(Request $request, Closure $next, string ...$groups): Response
    {
        if (!$request->user()) {
            return redirect()->route('login');
        }

        if (!$request->user()->hasAnyAccess($groups)) {
            abort(404);
        }

        return $next($request);
    }
}
