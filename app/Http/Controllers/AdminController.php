<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{

    public function student_store(Request $request)
    {
        $request->validate([
            'first_name'     => 'required',
            'last_name'      => 'required',
            'dob'            => 'required',
            'gender'         => 'required',
            'student_id'     => 'required',
            'admission_date' => 'required',
            'department'     => 'required',
            'semester'       => 'required',
            'email'          => 'required|email|unique:users,email',
            'phone'          => 'required',
            'address'        => 'required',
            'city'           => 'required',
            'state'          => 'required',
            'zip'            => 'required',
            'photo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $photoName = null;

        // Upload Photo
        if ($request->hasFile('photo')) {

            $photo = $request->file('photo');

            $photoName = time() . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('uploads/students'), $photoName);
        }

        // Save Student
        $student = Student::create([

            'first_name'     => $request->first_name,
            'last_name'      => $request->last_name,
            'dob'            => $request->dob,
            'gender'         => $request->gender,
            'blood_group'    => $request->blood_group,
            'nationality'    => $request->nationality,
            'student_id'     => $request->student_id,
            'admission_date' => $request->admission_date,
            'department'     => $request->department,
            'semester'       => $request->semester,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'address'        => $request->address,
            'city'           => $request->city,
            'state'          => $request->state,
            'zip'            => $request->zip,
            'photo'          => $photoName,
        ]);

        // Create User Login
        User::create([

            'name' => $request->first_name . ' ' . $request->last_name,

            'email' => $request->email,

            // Password = DOB
            'password' => Hash::make($request->dob),
        ]);

        return back()->with('success', 'Student & User Created Successfully');
    }



    public function student_list()
    {
        // dd("student-list");
        $students = Student::all();
        return view('Admin.student_list', compact('students'));
    }
}