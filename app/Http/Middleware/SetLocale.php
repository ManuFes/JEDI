<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        // Puedes definir el idioma en función de un parámetro de la URL, por ejemplo: ?lang=es
        if ($request->has('lang') && in_array($request->lang, ['en', 'es'])) {
            App::setLocale($request->lang);
            // Opcionalmente, guarda el idioma en la sesión:
            session(['locale' => $request->lang]);
        } elseif (session()->has('locale')) {
            App::setLocale(session('locale'));
        }
        
        return $next($request);
    }
}
