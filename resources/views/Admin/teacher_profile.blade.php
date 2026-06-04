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

    <div class="flex min-h-screen">

        <!-- ========================================== -->
        <!-- 1. SIDEBAR (Persistent)                     -->
        <!-- ========================================== -->
        @include('Admin.layouts.sidebar')

        <!-- Right Content Wrapper -->

        <div class="max-w-7xl mx-auto px-6 py-8">

            <div class="bg-white rounded-2xl shadow-sm border overflow-hidden">

                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 p-8 text-white">

                    <div class="flex items-center gap-6">

                        <img src="{{ $teacher->photo ? asset('uploads/teachers/' . $teacher->photo) : 'https://ui-avatars.com/api/?name=' . $teacher->first_name }}"
                            class="w-32 h-32 rounded-full border-4 border-white object-cover">

                        <div>

                            <h1 class="text-3xl font-bold">
                                {{ $teacher->first_name }} {{ $teacher->last_name }}
                            </h1>

                            <p class="text-indigo-100 mt-2">
                                {{ $teacher->designation }}
                            </p>

                            <p class="text-indigo-100">
                                Teacher ID : {{ $teacher->teacher_id }}
                            </p>

                        </div>

                    </div>

                </div>

                <div class="p-8">

                    <div class="grid md:grid-cols-2 gap-6">

                        <div class="bg-gray-50 rounded-xl p-5">
                            <h3 class="font-semibold text-gray-700 mb-4">
                                Personal Information
                            </h3>

                            <div class="space-y-3">

                                <p><strong>First Name :</strong> {{ $teacher->first_name }}</p>

                                <p><strong>Last Name :</strong> {{ $teacher->last_name }}</p>

                                <p><strong>Date of Birth :</strong> {{ $teacher->dob }}</p>

                                <p><strong>Gender :</strong> {{ ucfirst($teacher->gender) }}</p>

                                <p><strong>Blood Group :</strong> {{ $teacher->blood_group }}</p>

                                <p><strong>Nationality :</strong> {{ $teacher->nationality }}</p>

                            </div>
                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">

                            <h3 class="font-semibold text-gray-700 mb-4">
                                Professional Information
                            </h3>

                            <div class="space-y-3">

                                <p><strong>Teacher ID :</strong> {{ $teacher->teacher_id }}</p>

                                <p><strong>Joining Date :</strong> {{ $teacher->joining_date }}</p>

                                <p><strong>Department :</strong> {{ $teacher->department }}</p>

                                <p><strong>Designation :</strong> {{ $teacher->designation }}</p>

                                <p><strong>Qualification :</strong> {{ $teacher->qualification }}</p>

                                <p><strong>Experience :</strong> {{ $teacher->experience }}</p>

                            </div>

                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">

                            <h3 class="font-semibold text-gray-700 mb-4">
                                Contact Information
                            </h3>

                            <div class="space-y-3">

                                <p><strong>Email :</strong> {{ $teacher->email }}</p>

                                <p><strong>Phone :</strong> {{ $teacher->phone }}</p>

                            </div>

                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">

                            <h3 class="font-semibold text-gray-700 mb-4">
                                Address Information
                            </h3>

                            <div class="space-y-3">

                                <p><strong>Address :</strong> {{ $teacher->address }}</p>

                                <p><strong>City :</strong> {{ $teacher->city }}</p>

                                <p><strong>State :</strong> {{ $teacher->state }}</p>

                                <p><strong>ZIP :</strong> {{ $teacher->zip }}</p>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>




</body>

</html>
