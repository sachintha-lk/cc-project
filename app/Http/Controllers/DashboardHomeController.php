<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardHomeController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->role->name);
        // TODO if admin return admin view, if student return student view, if teacher return teacher view
        if (auth()->user()->role->name == 'Admin')
        {
            $adminStatsController = new AdminDashboardStatsController();
            return $adminStatsController->index();
        } elseif (auth()->user()->role->name == 'Teacher') {
            $teacherStatsController = new TeacherDashboardStatsController();
            return $teacherStatsController();
        } elseif (auth()->user()->role->name == 'Student') {
            $studentStatsController = new StudentDashboardStatsController();
            return $studentStatsController();
        } else {
            return redirect('/login');
        }
    }
}
