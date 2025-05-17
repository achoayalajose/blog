<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Rol;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $rol): Response
    {
        $roles = explode('|', $rol);
        $user = Auth::user();
        $rol = Rol::find($user->rol_id);
        if(in_array($rol->rol, $roles)){
            return $next($request);
        }else{
            return response()->json(['mensaje' => 'no tiene permiso para hacer esta accion']);
        }
    }
}
