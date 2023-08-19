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
        {echo "";
            $adminStatsController = new AdminDashboardStatsController();
            return $adminStatsController->index();
        } elseif (auth()->user()->role->name == 'Teacher') {
            return view('dashboard.teacher');
        } elseif (auth()->user()->role->name == 'Student') {
            return view('dashboard.student');
        } else {
            return redirect('/login');
        }
    }
}
