<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyIsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role_id = auth()->user()->role_id;

        $superAdminId=Role::where('name','superadmin')->first()->id;
        if($role_id != $superAdminId) {
            return redirect('/dashboard')->with('error', 'Anda tidak memiliki akses');
        }

        return $next($request);
    }
}
