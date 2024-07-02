<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if ($user) {
            if (in_array($user->role, $roles)) {
                switch ($user->role) {
                    case 'admin':
                    case 'super admin':
                        return redirect()->route('dashboard');
                    case 'client':
                        return redirect()->route('home'); // Redirection vers la page d'accueil
                    default:
                        return redirect()->route('home'); // Redirection par défaut
                }
            }
        }

        return $next($request);
    }
}
