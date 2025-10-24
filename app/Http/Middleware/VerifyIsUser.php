<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyIsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role_id = auth()->user()->role_id;

        $userId=Role::where('name','user')->first()->id;
        if($role_id != $userId) {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses');
        }
        return $next($request);
    }
}
