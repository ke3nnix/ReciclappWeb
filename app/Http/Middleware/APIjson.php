<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;

class APIjson
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        // Obtener la respuesta del controlador
        $response = $next($request);

        // // Retornar JSON si es necesario
        // if ($request->input('contentType') == 'JSON') {

        //     // Si quieres retornar alguna respuesta espécifica en JSON
        //     // Manejar aquí los errores

        //     // Si la respuesta es una vista, extraer y retornar como JSON
             if (is_a($response, \Illuminate\View\View::class))
             return response()->json($response->getData());
                // return $response->original;


        // return $response;
    }
}
