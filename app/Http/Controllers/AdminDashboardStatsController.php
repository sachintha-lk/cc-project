<?php

namespace App\Http\Controllers;

class AdminDashboardStatsController extends Controller
{
    public function index()
    {
        $teachersCount = \App\Models\User::where('role_id', 2)->count();
        $studentsCount = \App\Models\User::where('role_id', 3)->count();
        $gradesCount = \App\Models\Grade::count();
        $classesCount = \App\Models\GradeClasses::count();

        return view('dashboard.admin', compact('teachersCount', 'studentsCount', 'gradesCount', 'classesCount'));

    }
}
