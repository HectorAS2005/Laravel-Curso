<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAccessDashboardMiddleware
{
    public function handle(Request $request, Closure $next)
{
    if (!auth()->check()) {
        return redirect()->route('login');
    }

    if (auth()->user()->rol !== 'admin') {  // Verificación directa
        abort(403, 'Acceso solo para administradores');
    }

    return $next($request);
} 
}
