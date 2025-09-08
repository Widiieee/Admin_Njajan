<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole {
    public function handle(Request $request, Closure $next, ...$roles) {
        $user = $request->user();
        if (!$user) return redirect()->route('login');
        if (!$user->role) abort(403, 'Role not assigned.');

        // periksa apakah nama role user ada dalam daftar $roles
        if (in_array($user->role->name, $roles)) {
            return $next($request);
        }

        abort(403);
    }
}
