<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAccountStatusHistory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
    {
        $teachersQuery = User::where('role_id', 2);
        $studentsQuery = User::with(['class.grade', 'class'])
            ->where('role_id', 3);
        // for the search term to be displayed, we send it back to the view, default is blank
        $teacherSearch = '';
        $studentSearch = '';
        if (request()->has('student_search')) {
            $studentSearch = request()->get('student_search');
            $studentsQuery = User::with(['class.grade', 'class'])
                ->where('role_id', 3)
                ->where(function ($query) use ($studentSearch) {
                    $query->where('name', 'like', "%$studentSearch%")
                        ->orWhere('student_id', 'like', "%$studentSearch%")
                        ->orWhere('email', 'like', "%$studentSearch%");
                });
        } else if (request()->has('teacher_search')) {
            $teacherSearch = request()->get('teacher_search');
            $teachersQuery = User::where('role_id', 2)
                ->where(function ($query) use ($teacherSearch) {
                    $query->where('name', 'like', "%$teacherSearch%")
                        ->orWhere('teacher_id', 'like', "%$teacherSearch%")
                        ->orWhere('email', 'like', "%$teacherSearch%");
                });
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
            'student_id' => 'required_if:userType,student|nullable|string|unique:users',
            'teacher_id' => 'required_if:userType,teacher|nullable|string|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8|max:255',
        ]);


        $user = new User();
        $user->name = $request->name;


        if ($request->userType == 'student') {
            $user->role_id = 3;
            $user->student_id = $request->student_id;
        } else if ($request->userType == 'teacher') {
            $user->role_id = 2;
            $user->teacher_id = $request->teacher_id;
        } else {
            return redirect()->route('manage-users')->with('errormsg', 'Invalid user type.');
        }

        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->status = true;
        $user->save();

        if ($request->userType == 'student') {
            return redirect()->route('manage-users')->with('message', 'Student added successfully.');
        } else {
            return redirect()->route('manage-users')->with('message', 'Teacher added successfully.');
        }
    }

    public function view($id)
    {
        $user = User::findOrFail($id);

        $userAccountStatusHistory = UserAccountStatusHistory::where('user_id', $id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('manage-users.view', compact('user'), compact('userAccountStatusHistory'));
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
            'student_id' => 'required_if:userType,student|nullable|string|unique:users,student_id,' . $id,
            'teacher_id' => 'required_if:userType,teacher|nullable|string|unique:users,teacher_id,' . $id,
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|confirmed|min:8|max:255',

        ]);

        if ($request->userType == 'student') {
            $user->student_id = $request->student_id;
        } else if ($request->userType == 'teacher') {
            $user->teacher_id = $request->teacher_id;
        } else {
            return redirect()->route('manage-users')->with('errormsg', 'Invalid user type.');
        }

        $user->name = $request->name;

        $user->email = $request->email;

        $user->status = true;
        $user->save();

        // go back with message
        if ($request->userType == 'student') {
            return redirect()->route('manage-users')->with('message', 'Student updated successfully.');
        } else if ($request->userType == 'teacher') {
            return redirect()->route('manage-users')->with('message', 'Teacher updated successfully.');
        } else {
            return redirect()->route('manage-users')->with('errormsg', 'Invalid user type.');
        }
    }

    function activate(Request $request, $id)
    {
        // Check if there is a reason
        try {
            $this->validate(request(), [
                'reason' => 'required|string|max:255'
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->with('errormsg', 'Reason is required.');
        }

        $reason = $request->reason;


        $user = User::findOrFail($id);
        $user->status = true;
        $user->save();

        // record the change reason
        UserAccountStatusHistory::create([
            'user_id' => $user->id,
            'status' => true,
            'reason' => $reason,
            'changed_by' => auth()->user()->id
        ]);

        return redirect()->back()->with('message', 'User activated successfully.');
    }

    function deactivate(Request $request, $id)
    {
        try {
            $this->validate(request(), [
                'reason' => 'required|string|max:255'
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->with('errormsg', 'Reason is required.');
        }
        $reason = $request->reason;

        $user = User::findOrFail($id);
        $user->status = false;
        $user->save();

        // record the change reason
        UserAccountStatusHistory::create([
            'user_id' => $user->id,
            'status' => false,
            'reason' => $reason,
            'changed_by' => auth()->user()->id
        ]);

        return redirect()->back()->with('message', 'User deactivated successfully.');
    }

    // Deletes user using the Jetstream
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $deleteUser = new DeleteUser();
        $deleteUser->delete($user);
        return redirect()->route('manage-users')->with('message', 'User deleted successfully.');
    }
}
