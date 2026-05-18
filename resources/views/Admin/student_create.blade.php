<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduAdmin Pro - Register New Student</title>
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
                    <!-- Breadcrumbs navigation trail -->
                    <div class="flex items-center gap-2 text-sm font-medium text-gray-500">
                        <a href="#" class="hover:text-indigo-600">Students</a>
                        <i class="fa-solid fa-chevron-right text-xs text-gray-400"></i>
                        <span class="text-gray-900">Register Student</span>
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
            <!-- 3. STUDENT REGISTRATION FORM AREA          -->
            <!-- ========================================== -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50/50">

                <!-- Page Title Header -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Student Admission Form</h1>
                    <p class="text-sm text-gray-500 mt-1">Fill in the accurate credentials to register a student record
                        into the central information system.</p>
                </div>

                <!-- Main Grid Layout -->
                <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Form Columns Left Side (Main Inputs) -->
                    <div class="xl:col-span-2 space-y-6">

                        <!-- Block 1: Personal Information -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h2
                                class="text-base font-semibold text-gray-900 border-b border-gray-100 pb-3 mb-4 flex items-center gap-2">
                                <i class="fa-regular fa-user text-indigo-500"></i> Personal Information
                            </h2>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">First
                                        Name *</label>
                                    <input type="text" required placeholder="John" name="first_name"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">Last
                                        Name *</label>
                                    <input type="text" required placeholder="Doe" name="last_name"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">Date
                                        of Birth *</label>
                                    <input type="date" required name="dob"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">Gender
                                        *</label>
                                    <select required name="gender"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                        <option value="" disabled selected>Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">Blood
                                        Group</label>
                                    <select name="blood_group"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                        <option value="">Unknown</option>
                                        <option value="A+">A+</option>
                                        <option value="O+">O+</option>
                                        <option value="B+">B+</option>
                                        <option value="AB+">AB+</option>
                                    </select>
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">Nationality</label>
                                    <input type="text" placeholder="American" name="nationality"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                </div>
                            </div>
                        </div>

                        <!-- Block 2: Academic Assignments -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h2
                                class="text-base font-semibold text-gray-900 border-b border-gray-100 pb-3 mb-4 flex items-center gap-2">
                                <i class="fa-solid fa-book-open text-indigo-500"></i> Academic Enrolment
                            </h2>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">Roll
                                        Number / Student ID *</label>
                                    <input type="text" required placeholder="STU-2026-048" name="student_id"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">Admission
                                        Date *</label>
                                    <input type="date" required name="admission_date"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">Department
                                        / Stream *</label>
                                    <select required name="department"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                        <option value="" disabled selected>Select Track</option>
                                        <option value="cs">Computer Science</option>
                                        <option value="eng">Engineering</option>
                                        <option value="biz">Business Analytics</option>
                                    </select>
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">Class
                                        / Semester *</label>
                                    <select required name="semester"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                        <option value="" disabled selected>Select Semester</option>
                                        <option value="1">1st Semester</option>
                                        <option value="2">2nd Semester</option>
                                        <option value="3">3rd Semester</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Block 3: Contact & Address Information -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm">
                            <h2
                                class="text-base font-semibold text-gray-900 border-b border-gray-100 pb-3 mb-4 flex items-center gap-2">
                                <i class="fa-regular fa-address-book text-indigo-500"></i> Communication & Location
                                Details
                            </h2>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">Primary
                                        Email *</label>
                                    <input type="email" required placeholder="johndoe@student.edu" name="email"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">Phone
                                        Number *</label>
                                    <input type="tel" required placeholder="+1 (555) 000-0000" name="phone"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div>
                                    <label
                                        class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">Street
                                        Address *</label>
                                    <input type="text" required placeholder="123 Education Way, Apt 4B"
                                        name="address"
                                        class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                </div>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                                    <div class="col-span-2 sm:col-span-1">
                                        <label
                                            class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">City
                                            *</label>
                                        <input type="text" required placeholder="Boston" name="city"
                                            class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                    </div>
                                    <div>
                                        <label
                                            class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">State
                                            *</label>
                                        <input type="text" required placeholder="MA" name="state"
                                            class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                    </div>
                                    <div>
                                        <label
                                            class="block text-xs font-semibold uppercase tracking-wider text-gray-500 mb-1.5">pin
                                            Code *</label>
                                        <input type="text" required placeholder="02108" name="zip"
                                            class="w-full px-3 py-2 border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 bg-gray-50/50">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Right Column Side (Photo Upload & Actions) -->
                    <div class="space-y-6">

                        <!-- Block 4: Avatar Profile Photo Upload -->
                        <div class="bg-white p-6 rounded-xl border border-gray-200 shadow-sm text-center">
                            <h2
                                class="text-sm font-semibold text-gray-900 mb-4 text-left uppercase tracking-wider text-gray-400">
                                Profile Media</h2>

                            <div class="flex flex-col items-center">
                                <!-- Dynamic Avatar Placeholder -->
                                <div
                                    class="w-32 h-32 rounded-full bg-gray-100 border-2 border-dashed border-gray-300 flex items-center justify-center text-gray-400 relative overflow-hidden group mb-4">
                                    <i class="fa-solid fa-user text-4xl group-hover:opacity-0 transition-opacity"></i>
                                    <div
                                        class="absolute inset-0 bg-black/40 flex items-center justify-center text-white opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer text-xs font-medium">
                                        Change Photo
                                    </div>
                                </div>

                                <p class="text-xs text-gray-400 max-w-[200px] mb-4">Upload a high-resolution JPG or
                                    PNG. Max size 2MB.</p>

                                <label
                                    class="w-full py-2 px-3 border border-gray-200 hover:bg-gray-50 text-gray-700 rounded-lg text-sm font-medium transition-colors cursor-pointer block text-center">
                                    Browse Files
                                    <input type="file" class="hidden" accept="image/*" name="photo">
                                </label>
                            </div>
                        </div>

                        <!-- Block 5: Action Panel Buttons -->
                        <div class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm space-y-3">
                            <button type="submit"
                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-2.5 rounded-lg text-sm transition-all shadow-sm">
                                Save Student Record
                            </button>
                            <button type="button"
                                class="w-full bg-white hover:bg-gray-50 text-gray-700 border border-gray-200 font-medium py-2.5 rounded-lg text-sm transition-all">
                                Cancel & Discard
                            </button>
                        </div>

                    </div>

                </form>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2500
        });
    </script>


    <script>
        document.getElementById("studentForm").addEventListener("submit", function(e) {

            let fields = [
                'first_name', 'last_name', 'dob', 'gender', 'student_id',
                'admission_date', 'department', 'semester', 'email', 'phone',
                'address', 'city', 'state', 'zip'
            ];

            for (let f of fields) {
                let input = document.querySelector(`[name="${f}"]`);
                if (!input.value.trim()) {
                    alert(f.replace('_', ' ') + " is required!");
                    input.focus();
                    e.preventDefault();
                    return;
                }
            }

            let email = document.querySelector("[name='email']").value;
            let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;

            if (!email.match(pattern)) {
                alert("Enter valid email!");
                e.preventDefault();
                return;
            }
        });
    </script>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif


</body>

</html>
