<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduAdmin Pro - Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans antialiased text-gray-800">

    <div class="flex h-screen overflow-hidden">

        <!-- ========================================== -->
        <!-- 1. SIDEBAR                                 -->
        <!-- ========================================== -->
        @include('Admin.layouts.sidebar')

        <!-- Right Side Container (Header + Main Content) -->
        <div class="flex-1 flex flex-col h-full overflow-hidden">

            <!-- ========================================== -->
            <!-- 2. HEADER                                  -->
            <!-- ========================================== -->
            <header
                class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6 z-10 flex-shrink-0">
                <!-- Left: Search and Mobile Menu Trigger -->
                <div class="flex items-center gap-4 w-96">
                    <button class="text-gray-500 hover:text-gray-700 md:hidden block">
                        <i class="fa-solid fa-bars text-xl"></i>
                    </button>
                    <div class="relative w-full hidden sm:block">
                        <span
                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-400">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <input type="text" placeholder="Search students, courses, analytics..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-50">
                    </div>
                </div>

                <!-- Right: Action Items & Profile -->
                <div class="flex items-center gap-4">
                    <!-- Notifications -->
                    <button
                        class="relative p-2 text-gray-400 hover:text-gray-600 rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fa-regular fa-bell text-xl"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-rose-500 rounded-full"></span>
                    </button>

                    <!-- Messages -->
                    <button
                        class="p-2 text-gray-400 hover:text-gray-600 rounded-full hover:bg-gray-100 transition-colors">
                        <i class="fa-regular fa-comment-dots text-xl"></i>
                    </button>

                    <!-- Divider -->
                    <div class="h-6 w-px bg-gray-200 mx-1"></div>

                    <!-- Academic Year Badge -->
                    <span
                        class="hidden lg:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-md text-xs font-medium bg-amber-50 text-amber-800 border border-amber-200">
                        <span class="h-1.5 w-1.5 rounded-full bg-amber-500"></span>
                        AY 2025-2026
                    </span>
                </div>
            </header>

            <!-- ========================================== -->
            <!-- 3. MAIN CONTENT BODY                       -->
            <!-- ========================================== -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
                <!-- Welcome Banner -->
                <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Welcome Back, Alex</h1>
                        <p class="text-sm text-gray-500 mt-1">Here's what is happening across your institution today.
                        </p>
                    </div>
                    <a href="{{ route('student.create') }}"
                        class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg shadow-sm transition-colors">
                        <i class="fa-solid fa-plus"></i> Register New Student
                    </a>
                </div>

                <!-- Quick Stats Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <!-- Card 1 -->
                    <div
                        class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Total Students</p>
                            <h3 class="text-3xl font-bold text-gray-900 mt-1">1,240</h3>
                            <span class="text-xs text-emerald-600 font-medium mt-2 inline-flex items-center gap-1">
                                <i class="fa-solid fa-arrow-trend-up"></i> +4.2% from last semester
                            </span>
                        </div>
                        <div class="p-4 bg-indigo-50 text-indigo-600 rounded-xl">
                            <i class="fa-solid fa-user-graduate text-2xl"></i>
                        </div>
                    </div>

                    <!-- Card 2 -->
                    <div
                        class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Active Teachers</p>
                            <h3 class="text-3xl font-bold text-gray-900 mt-1">84</h3>
                            <span class="text-xs text-gray-500 font-medium mt-2 inline-flex items-center gap-1">
                                <i class="fa-solid fa-minus"></i> Stable allocation
                            </span>
                        </div>
                        <div class="p-4 bg-emerald-50 text-emerald-600 rounded-xl">
                            <i class="fa-solid fa-chalkboard-user text-2xl"></i>
                        </div>
                    </div>

                    <!-- Card 3 -->
                    <div
                        class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Active Courses</p>
                            <h3 class="text-3xl font-bold text-gray-900 mt-1">42</h3>
                            <span class="text-xs text-emerald-600 font-medium mt-2 inline-flex items-center gap-1">
                                <i class="fa-solid fa-arrow-trend-up"></i> +2 new additions
                            </span>
                        </div>
                        <div class="p-4 bg-amber-50 text-amber-500 rounded-xl">
                            <i class="fa-solid fa-book text-2xl"></i>
                        </div>
                    </div>

                    <!-- Card 4 -->
                    <div
                        class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Fees Collected</p>
                            <h3 class="text-3xl font-bold text-gray-900 mt-1">$68.5k</h3>
                            <span class="text-xs text-rose-600 font-medium mt-2 inline-flex items-center gap-1">
                                <i class="fa-solid fa-arrow-trend-down"></i> -1.5% pending dues
                            </span>
                        </div>
                        <div class="p-4 bg-rose-50 text-rose-500 rounded-xl">
                            <i class="fa-solid fa-credit-card text-2xl"></i>
                        </div>
                    </div>
                </div>

                <!-- Placeholder Area for Tables / Charts -->
                <div
                    class="border-2 border-dashed border-gray-200 rounded-xl h-96 flex items-center justify-center text-gray-400">
                    <div class="text-center">
                        <i class="fa-solid fa-chart-line text-4xl mb-3 block"></i>
                        <p class="font-medium">Data Visualizations & Performance Tables Space</p>
                        <p class="text-xs mt-1">Integrate libraries like Chart.js or DataTables here.</p>
                    </div>
                </div>

            </main>
        </div>
    </div>

</body>

</html>
