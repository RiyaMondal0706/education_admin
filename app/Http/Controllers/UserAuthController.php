<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;
use App\Models\Teacher;

class UserAuthController extends Controller
{
    public function showLogin()
    {
        return view('welcome');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->with('error', 'Invalid email or password');
        }

        $user = Auth::user();
        // dd(
        //     $user->email,
        //     //Student::where('email', $user->email)->first(),
        //     Teacher::where('email', $user->email)->first()
        // );

        // Check Student Table
        $student = Student::where('email', $request->email)->first();
        if ($student) {
            // return redirect()->route('student.dashboard');
            
            dd("Student Dashboard");
        }

        // Check Teacher Table
        $teacher = Teacher::where('email', $request->email)->first();
        if ($teacher) {
            // return redirect()->route('teacher.dashboard');
            dd("Teacher Dashboard");
        }

        // Default Dashboard
        return redirect()->route('admin.dashboard');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}