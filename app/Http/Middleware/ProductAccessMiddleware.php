<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProductAccessMiddleware
{
	/**
 	* Handle an incoming request.
 	*
 	* @param  \Illuminate\Http\Request  $request
 	* @param  \Closure  $next
 	* @return mixed
 	*/
	public function handle(Request $request, Closure $next)
	{
    	$validToken = env('API_TOKEN');

        $token = $request->header('Authorization');

        if (!$request->isMethod('get')) {
            return $next($request);
        }
        
        if (!$token) {
            return response()->json(['error' => 'Token is missing.'], 401);
        }

        if ($token !== $validToken) {
            return response()->json(['error' => 'Token is invalid.'], 401);
        }

    	return $next($request);
	}
}