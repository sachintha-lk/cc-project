<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    public function index()
    {
        $teachersQuery = User::where('role_id', 2);
        $studentsQuery = User::where('role_id', 3);
        // for the search term to be displayed, we send it back to the view, default is blank
        $teacherSearch = '';
        $studentSearch = '';
        if (request()->has('student_search')) {
            $studentSearch = request()->get('student_search');
            $studentsQuery = User::where('role_id', 3)->where('name', 'like', "%$studentSearch%");
        } else if (request()->has('teacher_search')) {
            $teacherSearch = request()->get('teacher_search');
            $teachersQuery = User::where('role_id', 2)->where('name', 'like', "%$teacherSearch%");
        }
        // dd($teachersQuery);
        $teachers = $teachersQuery->paginate(10);
        $students = $studentsQuery->paginate(10);

        return view('manage-users.index', compact('teachers', 'students', 'studentSearch', 'teacherSearch'));
    }

    public function showAddStudentForm()
    {
        $userType = 'student';
        return view('manage-users.add', compact('userType'));
    }

    public function showAddTeacherForm()
    {
        $userType = 'teacher';
        return view('manage-users.add', compact('userType'));
    }

    public function store(Request $request)
    {
        // dd($request->all());


        // in case someone tries to change the userType in the form
        if ($request->userType != 'student' && $request->userType != 'teacher') {
            return redirect()->route('manage-users')->with('errormsg', 'Invalid user type.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8|max:255',
        ]);


        $user = new User();
        $user->name = $request->name;

        if ($request->userType == 'student') {
            $user->role_id = 3;
        } else if ($request->userType == 'teacher') {
            $user->role_id = 2;
        } else {
            return redirect()->route('manage-users')->with('errormsg', 'Invalid user type.');
        }

        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = true;
        $user->save();

        if ($request->userType == 'student') {
            return redirect('/manage/users')->with('successmsg', 'Student added successfully.');
        } else {
            return redirect('/manage/users')->with('successmsg', 'Teacher added successfully.');
        }
    }

    public function view($id)
    {
        $user = User::findOrFail($id);

        return view('manage-users.view', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $userType = $user->role_id == 3 ? 'student' : 'teacher';
        return view('manage-users.edit', compact('user', 'userType'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        // check if the user exists
        $user = User::findOrFail($id);

        // in case someone tries to change the userType in the form
        if ($request->userType != 'student' && $request->userType != 'teacher') {
            return redirect()->route('manage-users')->with('errormsg', 'Invalid user type.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|confirmed|min:8|max:255',

        ]);

        $user->name = $request->name;

        $user->email = $request->email;

        $user->status = true;
        $user->save();

        // go back with message
        if ($request->userType == 'student') {
            return redirect()->back()->with('success', 'Student updated successfully.');
        } else {
            return redirect()->back()->with('success', 'Teacher updated successfully.');
        }
    }
}
