<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduAdmin Pro - Student Directory</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans antialiased text-gray-800">

    <div class="flex h-screen overflow-hidden">

        <!-- ========================================== -->
        <!-- 1. SIDEBAR (Persistent)                     -->
        <!-- ========================================== -->
        @include('Admin.layouts.sidebar')

        <!-- Right Content Wrapper -->

        <div class="max-w-6xl mx-auto p-6">

            <div class="bg-white rounded-xl shadow-lg overflow-hidden">

                <div class="bg-indigo-600 px-6 py-4">
                    <h2 class="text-2xl font-bold text-white">
                        Student Profile
                    </h2>
                </div>

                <div class="p-6">

                    <div class="flex items-center gap-6 mb-8">

                        <img src="{{ asset('uploads/students/' . $student->photo) }}" alt="Student Photo"
                            class="w-32 h-32 rounded-full border-4 border-indigo-100 object-cover">

                        <div>
                            <h3 class="text-2xl font-bold text-gray-800">
                                {{ $student->first_name }} {{ $student->last_name }}
                            </h3>

                            <p class="text-gray-500">
                                Student ID : {{ $student->student_id }}
                            </p>

                            <p class="text-gray-500">
                                @if ($student->department == 'eng')
                                    Engineering
                                @elseif($student->department == 'cs')
                                    Computer Science
                                @elseif($student->department == 'biz')
                                    Business
                                @else
                                    {{ $student->department }}
                                @endif
                            </p>
                        </div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <div class="border rounded-lg p-4">
                            <h4 class="font-semibold mb-2">Personal Information</h4>

                            <p><strong>Date of Birth:</strong> {{ $student->dob }}</p>
                            <p><strong>Gender:</strong> {{ $student->gender }}</p>
                            <p><strong>Blood Group:</strong> {{ $student->blood_group }}</p>
                            <p><strong>Nationality:</strong> {{ $student->nationality }}</p>
                        </div>

                        <div class="border rounded-lg p-4">
                            <h4 class="font-semibold mb-2">Academic Information</h4>

                            <p><strong>Department:</strong> {{ $student->department }}</p>
                            <p><strong>Semester:</strong> {{ $student->semester }}</p>
                            <p><strong>Admission Date:</strong> {{ $student->admission_date }}</p>
                        </div>

                        <div class="border rounded-lg p-4">
                            <h4 class="font-semibold mb-2">Contact Information</h4>

                            <p><strong>Email:</strong> {{ $student->email }}</p>
                            <p><strong>Phone:</strong> {{ $student->phone }}</p>
                        </div>

                        <div class="border rounded-lg p-4">
                            <h4 class="font-semibold mb-2">Address</h4>

                            <p>{{ $student->address }}</p>
                            <p>{{ $student->city }}</p>
                            <p>{{ $student->state }}</p>
                            <p>{{ $student->zip }}</p>
                        </div>

                    </div>

                    <div class="mt-8">

                        <a href="{{ url()->previous() }}"
                            class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">
                            Back
                        </a>

                    </div>

                </div>

            </div>

        </div>




</body>

</html>
