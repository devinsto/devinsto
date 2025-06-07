<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifiez si l'utilisateur est authentifié et est un administrateur
        $adminUsertype = env('ADMIN_USERTYPE');
        if (Auth::user()->usertype != $adminUsertype) {
            // Redirigez ou renvoyez une erreur
            // return redirect('/')->with('error', 'Vous n\'avez pas accès à cette ressource.');
            return redirect('/');
        }

        return $next($request);
    }
}
