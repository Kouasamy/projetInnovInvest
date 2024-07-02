<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUsersHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('login');
        }
        // Boucle sur chaque rôle
        foreach ($roles as $role) {
            // Vérifie si l'utilisateur a le rôle
            if ($user->role === $role) {
                //Si oui, passe la requête au middleware/contrôleur suivant
                return $next($request);
            }
        }
        //Si aucun rôle n'a été trouvé, interdit l'accès
        abort(403, 'Accès interdit.');
    }
}


