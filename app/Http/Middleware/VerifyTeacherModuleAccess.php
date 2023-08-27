<?php

namespace App\Http\Middleware;

use App\Http\Livewire\TeacherModules;
use App\Models\Module;
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
    public function handle($request, $next)
    {
        $moduleId = $request->route('module_id');


        if (Auth::user()->role_id === 2) {
            $teacherId = Auth::user()->id;

            $hasAccess = Module::where('id', $moduleId)
                ->where('teacher_id', $teacherId)
                ->exists();

            if (!$hasAccess) {
                return redirect()->route('dashboard');
            }
        }
        return $next($request);
    }
}