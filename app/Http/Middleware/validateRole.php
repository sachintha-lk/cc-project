<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class validateRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {


        $user_role_id = auth()->user()->role_id;
        $user_role = '';
        // 1: admin, 2: teacher, 3: student
        if ($user_role_id == 1) {
            $user_role = 'admin';
        } else if ($user_role_id == 2) {
            $user_role = 'teacher';
        } else if ($user_role_id == 3) {
            $user_role = 'student';
        } else {
            return redirect('/dashboard')->with('errormsg', 'You do not have permission to access this page.');
        }

        foreach ($roles as $role) {
            if ($user_role == $role) {
                return $next($request);
            }
        }

        return redirect('/dashboard')->with('errormsg', 'You do not have permission to access this page.');
    }
}
