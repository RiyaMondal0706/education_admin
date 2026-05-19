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
        try {

            $request->validate([

                'first_name'     => 'required',
                'last_name'      => 'required',
                'dob'            => 'required',
                'gender'         => 'required',
                'student_id'     => 'required|unique:students,student_id',

                'admission_date' => 'required',
                'department'     => 'required',
                'semester'       => 'required',
                'email'          => 'required|email|unique:users,email',
                'phone'          => 'required|regex:/^[6-9][0-9]{9}$/',

                'address'        => 'required',
                'city'           => 'required',
                'state'          => 'required',
                'zip'            => 'required|digits:6',
                'photo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

            ], [

                'student_id.unique' => 'This Student ID already exists.',

                'email.unique'      => 'This Email already exists.',

                'phone.regex'       => 'Mobile number must start from 6 to 9 and contain 10 digits.',

                'zip.digits'        => 'PIN Code must be 6 digits only.',
            ]);

            $photoName = null;

            if ($request->hasFile('photo')) {

                $photo = $request->file('photo');

                $photoName = time() . '.' . $photo->getClientOriginalExtension();

                // Upload Image
                $photo->move(public_path('uploads/students'), $photoName);
            }
            Student::create([

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
            User::create([

                'name' => $request->first_name . ' ' . $request->last_name,

                'email' => $request->email,

                // PASSWORD = DOB
                'password' => Hash::make($request->dob),
            ]);

            return redirect()->back()
                ->with('success', 'Student & User Created Successfully');
        } catch (\Exception $e) {

            return redirect()->back()
                ->withInput()
                ->with('error', $e->getMessage());
        }
    }


  public function student_list(Request $request)
{
    $students = Student::query();

    // SEARCH
    if ($request->search) {

        $students->where(function ($query) use ($request) {

            $query->where('first_name', 'LIKE', '%' . $request->search . '%')

                ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')

                ->orWhere('email', 'LIKE', '%' . $request->search . '%')

                ->orWhere('student_id', 'LIKE', '%' . $request->search . '%');
        });
    }

    // DEPARTMENT
    if ($request->department) {

        $students->where('department', $request->department);
    }

    // SEMESTER
    if ($request->semester) {

        $students->where('semester', $request->semester);
    }

    $students = $students->latest()->paginate(10);

    // AJAX RESPONSE
    if ($request->ajax()) {

        return view('Admin.ajax.student_table', compact('students'))->render();
    }

    return view('Admin.student_list', compact('students'));
}
}