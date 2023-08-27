<?php

namespace App\Http\Middleware;

use App\Models\Module;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class StudentModuleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $moduleId = $request->route('module_id');
        $studentClassId = Auth::user()->class_id;

        if (Auth::user()->role_id === 3) {
            $module = Module::find($moduleId);

            if ($module && $module->class_id === $studentClassId) {
                return $next($request);
            }
        }

        return redirect()->route('dashboard')->with('error', 'You are not allowed to access this module.');
    }

}
