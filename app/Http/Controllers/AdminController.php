<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Teacher;


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

    public function teacher_list(Request $request)
    {
        $teachers = Teacher::query();

        if ($request->search) {

            $teachers->where(function ($query) use ($request) {

                $query->where('first_name', 'LIKE', '%' . $request->search . '%')

                    ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')

                    ->orWhere('email', 'LIKE', '%' . $request->search . '%')

                    ->orWhere('teacher_id', 'LIKE', '%' . $request->search . '%');
            });
        }

        // DEPARTMENT FILTER
        if ($request->department) {

            $teachers->where('department', $request->department);
        }

        $teachers = $teachers->latest()->paginate(10);

        return view('Admin.teacher_list', compact('teachers'));
    }



    public function teacher_create()
    {
        return view('Admin.teacher_create');
    }


    public function teacher_store(Request $request)
    {
        $request->validate([

            'first_name'     => 'required',

            'last_name'      => 'required',

            'dob'            => 'required',

            'gender'         => 'required',

            'teacher_id'     => 'required|unique:teachers,teacher_id',

            'joining_date'   => 'required',

            'department'     => 'required',

            'designation'    => 'required',

            'qualification'  => 'required',

            'email'          => 'required|email|unique:users,email',

            'phone'          => 'required|regex:/^[6-9][0-9]{9}$/',

            'address'        => 'required',

            'city'           => 'required',

            'state'          => 'required',

            'zip'            => 'required|digits:6',

            'photo'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048',

        ], [

            'teacher_id.unique' => 'Teacher ID already exists.',

            'email.unique'      => 'Email already exists.',

            'phone.regex'       => 'Phone number must be 10 digits and start from 6 to 9.',

            'zip.digits'        => 'PIN Code must be 6 digits.',

        ]);

        $photoName = null;

        // PHOTO UPLOAD
        if ($request->hasFile('photo')) {

            $photo = $request->file('photo');

            $photoName = time() . '.' . $photo->getClientOriginalExtension();

            $photo->move(public_path('uploads/teachers'), $photoName);
        }

        // SAVE TEACHER
        Teacher::create([

            'first_name'     => $request->first_name,

            'last_name'      => $request->last_name,

            'dob'            => $request->dob,

            'gender'         => $request->gender,

            'blood_group'    => $request->blood_group,

            'nationality'    => $request->nationality,

            'teacher_id'     => $request->teacher_id,

            'joining_date'   => $request->joining_date,

            'department'     => $request->department,

            'designation'    => $request->designation,

            'qualification'  => $request->qualification,

            'experience'     => $request->experience,

            'email'          => $request->email,

            'phone'          => $request->phone,

            'address'        => $request->address,

            'city'           => $request->city,

            'state'          => $request->state,

            'zip'            => $request->zip,

            'photo'          => $photoName,
        ]);

        // CREATE LOGIN USER
        User::create([

            'name' => $request->first_name . ' ' . $request->last_name,

            'email' => $request->email,

            'password' => Hash::make($request->dob),
        ]);

        return redirect()
            ->route('admin.teachers.list')
            ->with('success', 'Teacher Created Successfully');
    }

    public function exportCsv(Request $request)
    {
        $students = Student::query();

        // SEARCH FILTER
        if ($request->filled('search')) {

            $students->where(function ($query) use ($request) {

                $query->where('first_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('email', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('student_id', 'LIKE', '%' . $request->search . '%');
            });
        }

        // DEPARTMENT FILTER
        if ($request->filled('department')) {
            $students->where('department', $request->department);
        }

        // SEMESTER FILTER
        if ($request->filled('semester')) {
            $students->where('semester', $request->semester);
        }

        $students = $students->latest()->get();

        $fileName = 'students_' . date('Y-m-d_H-i-s') . '.csv';

        $headers = [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];

        $callback = function () use ($students) {

            $file = fopen('php://output', 'w');

            // UTF-8 BOM for Excel
            fprintf($file, chr(0xEF) . chr(0xBB) . chr(0xBF));

            // CSV HEADER
            fputcsv($file, [
                'ID',
                'Student ID',
                'First Name',
                'Last Name',
                'Email',
                'Phone',
                'Department',
                'Semester',
                'Gender',
                'DOB',
                'Blood Group',
                'Nationality',
                'Admission Date',
                'Address',
                'City',
                'State',
                'Zip'
            ]);

            // DATA
            foreach ($students as $student) {

                fputcsv($file, [

                    $student->id,

                    '="' . $student->student_id . '"',

                    $student->first_name,

                    $student->last_name,

                    $student->email,

                    '="' . $student->phone . '"',

                    $student->department,

                    $student->semester,

                    $student->gender,

                    '="' . $student->dob . '"',

                    $student->blood_group,

                    $student->nationality,

                    '="' . $student->admission_date . '"',

                    str_replace(["\r", "\n"], ' ', $student->address),

                    $student->city,

                    $student->state,

                    '="' . $student->zip . '"',
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function toggleStatus($id)
    {
        $student = Student::findOrFail($id);

        $student->status = !$student->status;

        $student->save();

        return back()->with('success', 'Status updated successfully.');
    }

    public function show($id)
{
    $student = Student::findOrFail($id);

    return view('Admin.student_profile', compact('student'));
}
}