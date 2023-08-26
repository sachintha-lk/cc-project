<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyTeacherModuleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
    //     // Get the current authenticated teacher
    //    $teacher = Auth::user();
    //     $moduleId = $request->route('module_id');

    //     // Check if the teacher has access to the module
    //     if (!$teacher->modules->contains('id', $moduleId)) {
    //         return abort(403, 'Unauthorized access to this module.');
    //     }
    //     return $next($request);
    }
}
