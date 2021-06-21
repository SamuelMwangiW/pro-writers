<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserHasRole
{
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!$request->user()->hasRole($role) && !$request->user()->isAdmin($request)) {
            return redirect()->to($request->user()->dashboard());
        }
        return $next($request);
    }
}
