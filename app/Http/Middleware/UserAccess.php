<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{

    public function handle(Request $request, Closure $next, $userType)
    {
        if(auth()-> user() -> type == $userType) {
            return $next($request);
        }
        return response()-> json([
            'message' => 'You are not authorized to access this resource',
            'status' => Response::HTTP_UNAUTHORIZED
        ], Response::HTTP_UNAUTHORIZED);
    }
}
