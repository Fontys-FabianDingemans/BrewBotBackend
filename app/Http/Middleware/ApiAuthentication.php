<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();

        if (!$token) {
            return response()->json([
                'error' => 'No token provided',
            ], 401);
        }

        $user_query = User::where('api_token', $token);
        if (!$user_query->exists()){
            return response()->json([
                'error' => 'Invalid token',
            ], 401);
        }

        $user = $user_query->first();
        if($user->api_token === $token){
            $request->merge(['user' => $user]);
            return $next($request);
        }
        return response()->json([
            'error' => 'Invalid token',
        ], 401);
    }
}
