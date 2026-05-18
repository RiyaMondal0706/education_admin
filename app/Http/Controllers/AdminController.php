<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class AdminController extends Controller
{

    public function student_store(Request $request)
    {
        // dd("ok");
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'student_id' => 'required',
            'admission_date' => 'required',
            'department' => 'required',
            'semester' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('students', 'public');
        }

        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'blood_group' => $request->blood_group,
            'nationality' => $request->nationality,
            'student_id' => $request->student_id,
            'admission_date' => $request->admission_date,
            'department' => $request->department,
            'semester' => $request->semester,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'photo' => $photoPath
        ]);

        return back()->with('success', 'Student Saved Successfully');
    }
}