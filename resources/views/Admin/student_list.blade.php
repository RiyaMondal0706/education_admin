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
        <div class="flex-1 flex flex-col h-full overflow-hidden">

            <!-- ========================================== -->
            <!-- 2. HEADER (Persistent)                     -->
            <!-- ========================================== -->
            <header
                class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 z-10 flex-shrink-0">
                <div class="flex items-center gap-4">
                    <button class="text-gray-500 hover:text-gray-700 md:hidden block">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    <!-- Breadcrumbs trail -->
                    <div class="flex items-center gap-2 text-sm font-medium text-gray-500">
                        <span class="text-gray-900">Students</span>
                        <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                        <span class="text-gray-400 font-normal">Directory List</span>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <span
                        class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-md text-xs font-medium bg-amber-50 text-amber-800 border border-amber-200">
                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                        AY 2025-2026
                    </span>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- 3. MAIN STUDENT LISTING DATA               -->
            <!-- ========================================== -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50/50">

                <!-- Action Title Header -->
                <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Student Directory</h1>
                        <p class="text-sm text-gray-500 mt-1">View, search, and manage comprehensive enrolled student
                            profiles.</p>
                    </div>
                    <a href="{{ route('student.create') }}"
                        class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg shadow-sm transition-colors">
                        <i class="fa-solid fa-plus"></i> Register New Student
                    </a>
                </div>

                <!-- Filters & Utilities Bar -->
                <div
                    class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm mb-6 flex flex-col lg:flex-row lg:items-center justify-between gap-4">
                    <!-- Left: Search Inputs & Select Fields -->
                    <div class="flex flex-wrap items-center gap-3 flex-1">
                        <div class="relative w-full sm:w-64">
                            <span
                                class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                                <i class="fa-solid fa-magnifying-glass text-sm"></i>
                            </span>
                            <input type="text" placeholder="Search by name, ID or email..."
                                class="w-full pl-9 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                        </div>

                        <select
                            class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white text-gray-600">
                            <option value="">All Departments</option>
                            <option value="cs">Computer Science</option>
                            <option value="eng">Engineering</option>
                            <option value="biz">Business Analytics</option>
                        </select>

                        <select
                            class="px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-white text-gray-600">
                            <option value="">All Semesters</option>
                            <option value="1">1st Semester</option>
                            <option value="2">2nd Semester</option>
                            <option value="3">3rd Semester</option>
                        </select>
                    </div>

                    <!-- Right: Utilities (Export, Print etc) -->
                    <div class="flex items-center gap-2 self-end lg:self-auto">
                        <button
                            class="inline-flex items-center gap-2 px-3 py-2 border border-gray-200 hover:bg-gray-50 text-gray-700 rounded-lg text-sm font-medium transition-colors">
                            <i class="fa-solid fa-download"></i> Export CSV
                        </button>
                        <button
                            class="p-2 border border-gray-200 hover:bg-gray-50 text-gray-500 hover:text-gray-700 rounded-lg transition-colors">
                            <i class="fa-solid fa-sliders"></i>
                        </button>
                    </div>
                </div>

                <!-- Structured Data Table Container -->
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse whitespace-nowrap">
                            <thead>
                                <tr
                                    class="bg-gray-50/75 border-b border-gray-200 text-xs font-semibold uppercase tracking-wider text-gray-500">
                                    <th class="px-6 py-4">Student Info</th>
                                    <th class="px-6 py-4">Student ID</th>
                                    <th class="px-6 py-4">Department</th>
                                    <th class="px-6 py-4">Semester</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 text-sm">

                                @forelse($students as $student)
                                    <tr class="hover:bg-gray-50/50 transition-colors">

                                        <!-- Student Info -->
                                        <td class="px-6 py-4 flex items-center gap-3">

                                            <img class="h-10 w-10 rounded-full object-cover border border-gray-200"
                                                src="{{ asset('uploads/students/' . $student->photo) }}" alt="">

                                            <div>
                                                <span class="font-semibold text-gray-900 block">
                                                    {{ $student->first_name }} {{ $student->last_name }}
                                                </span>

                                                <span class="text-xs text-gray-400">
                                                    {{ $student->email }}
                                                </span>
                                            </div>
                                        </td>

                                        <!-- Student ID -->
                                        <td class="px-6 py-4 font-mono text-xs text-gray-600">
                                            {{ $student->student_id }}
                                        </td>

                                        <!-- Department -->
                                        <td class="px-6 py-4 text-gray-700">
                                            {{ $student->department }}
                                        </td>

                                        <!-- Semester -->
                                        <td class="px-6 py-4 text-gray-600">
                                            {{ $student->semester }}
                                        </td>

                                        <!-- Status -->
                                        <td class="px-6 py-4">

                                            <span
                                                class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">

                                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>

                                                Active
                                            </span>

                                        </td>

                                        <!-- Actions -->
                                        <td class="px-6 py-4 text-right">

                                            <div class="flex items-center justify-end gap-2">

                                                <!-- View -->
                                                <a href="#"
                                                    class="p-1.5 text-gray-400 hover:text-indigo-600 rounded-lg hover:bg-gray-100 transition-all">

                                                    <i class="fa-regular fa-eye text-base"></i>
                                                </a>

                                                <!-- Edit -->
                                                <a href="#"
                                                    class="p-1.5 text-gray-400 hover:text-amber-600 rounded-lg hover:bg-gray-100 transition-all">

                                                    <i class="fa-regular fa-pen-to-square text-base"></i>
                                                </a>

                                                <!-- Delete -->
                                                <a href="#"
                                                    class="p-1.5 text-gray-400 hover:text-rose-600 rounded-lg hover:bg-gray-100 transition-all">

                                                    <i class="fa-regular fa-trash-can text-base"></i>
                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="6" class="text-center py-6 text-gray-500">
                                            No Students Found
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>

                    <!-- Table Pagination Footer -->
                    <div class="bg-white border-t border-gray-200 px-6 py-4 flex items-center justify-between">
                        <span class="text-sm text-gray-500">Showing <span class="font-medium text-gray-700">1</span>
                            to <span class="font-medium text-gray-700">3</span> of <span
                                class="font-medium text-gray-700">42</span> students</span>
                        <div class="inline-flex items-center gap-2">
                            <button disabled
                                class="px-3 py-1.5 border border-gray-200 text-gray-400 rounded-lg text-xs font-medium cursor-not-allowed bg-gray-50">Previous</button>
                            <button
                                class="px-3 py-1.5 border border-gray-200 hover:bg-gray-50 text-gray-700 rounded-lg text-xs font-medium transition-colors">Next</button>
                        </div>
                    </div>
                </div>

            </main>
        </div>
    </div>

</body>

</html>
