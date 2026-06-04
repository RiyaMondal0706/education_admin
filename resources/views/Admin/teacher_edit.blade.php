<!-- ========================================= -->
<!-- CREATE VIEW -->
<!-- resources/views/Admin/teachers/teacher_create.blade.php -->
<!-- ========================================= -->

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Teacher</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="bg-gray-100 font-sans antialiased">

    <div class="flex h-screen overflow-hidden">

        @include('Admin.layouts.sidebar')

        <div class="flex-1 overflow-y-auto">

            <div class="p-6">

                <div class="mb-6">

                    <h1 class="text-2xl font-bold text-gray-900">

                        Add New Teacher

                    </h1>

                    <p class="text-sm text-gray-500 mt-1">

                        Fill all teacher information.

                    </p>

                </div>

                <!-- SUCCESS -->
                @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">

                        {{ session('success') }}

                    </div>
                @endif

                <!-- ERRORS -->
                @if ($errors->any())

                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">

                        <ul class="list-disc pl-5">

                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif

                <!-- FORM -->
                <form action="{{ route('teachers.update', Crypt::encryptString($teacher->id)) }}" method="POST"
                    enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-sm border border-gray-200">

                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                        <!-- FIRST NAME -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                First Name

                            </label>

                            <input type="text" name="first_name" required value="{{ $teacher->first_name }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">

                        </div>

                        <!-- LAST NAME -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Last Name

                            </label>

                            <input type="text" name="last_name" required value="{{ $teacher->last_name }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500">

                        </div>

                        <!-- DOB -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Date of Birth

                            </label>

                            <input type="date" name="dob" required
                                value="{{ date('Y-m-d', strtotime($teacher->dob)) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">
                        </div>

                        <!-- GENDER -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Gender

                            </label>

                            <select name="gender" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                                <option value="">Select Gender</option>

                                <option value="Male" {{ $teacher->gender == 'Male' ? 'selected' : '' }}>Male</option>

                                <option value="Female" {{ $teacher->gender == 'Female' ? 'selected' : '' }}>Female
                                </option>

                            </select>

                        </div>

                        <!-- TEACHER ID -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Teacher ID

                            </label>

                            <input type="text" name="teacher_id" required value="{{ $teacher->teacher_id }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                        </div>

                        <!-- JOINING DATE -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Joining Date

                            </label>

                            <input type="date" name="joining_date" required
                                value="{{ old('joining_date', $teacher->joining_date) }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                        </div>

                        <!-- DEPARTMENT -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Department

                            </label>

                            <input type="text" name="department" required value="{{ $teacher->department }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                        </div>

                        <!-- DESIGNATION -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Designation

                            </label>

                            <input type="text" name="designation" required value="{{ $teacher->designation }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                        </div>

                        <!-- QUALIFICATION -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Qualification

                            </label>

                            <input type="text" name="qualification" required value="{{ $teacher->qualification }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                        </div>

                        <!-- EXPERIENCE -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Experience

                            </label>

                            <input type="text" name="experience" required value="{{ $teacher->experience }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                        </div>

                        <!-- EMAIL -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Email

                            </label>

                            <input type="email" name="email" required value="{{ $teacher->email }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                        </div>

                        <!-- PHONE -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Phone

                            </label>

                            <input type="tel" name="phone" required maxlength="10" pattern="[6-9]{1}[0-9]{9}"
                                value="{{ $teacher->phone }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                        </div>

                        <!-- CITY -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                City

                            </label>

                            <input type="text" name="city" required value="{{ $teacher->city }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                        </div>

                        <!-- STATE -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                State

                            </label>

                            <input type="text" name="state" required value="{{ $teacher->state }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                        </div>

                        <!-- ZIP -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                PIN Code

                            </label>

                            <input type="text" name="zip" required maxlength="6" pattern="[0-9]{6}"
                                value="{{ $teacher->zip }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                        </div>

                        <!-- PHOTO -->
                        <div>

                            <label class="block text-sm font-medium text-gray-700 mb-1">

                                Photo

                            </label>

                            <input type="file" name="photo"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg">

                        </div>

                    </div>

                    <!-- ADDRESS -->
                    <div class="mt-5">

                        <label class="block text-sm font-medium text-gray-700 mb-1">

                            Address

                        </label>

                        <textarea name="address" rows="4" required class="w-full px-4 py-2 border border-gray-300 rounded-lg">{{ $teacher->address }}</textarea>

                    </div>

                    <!-- BUTTON -->
                    <div class="mt-6">

                        <button type="submit"
                            class="bg-amber-600 hover:bg-amber-700 text-white px-6 py-3 rounded-lg font-medium">

                            Update Teacher

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
