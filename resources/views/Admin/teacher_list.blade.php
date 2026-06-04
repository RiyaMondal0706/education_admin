<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Teacher Directory</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body class="bg-gray-100 font-sans antialiased text-gray-800">

    <div class="flex h-screen overflow-hidden">

        @include('Admin.layouts.sidebar')

        <div class="flex-1 flex flex-col h-full overflow-hidden">

            <!-- HEADER -->
            <header class="h-16 bg-white border-b border-gray-200 flex items-center justify-between px-6">

                <div>

                    <h1 class="text-xl font-bold text-gray-800">

                        Teacher Directory

                    </h1>

                </div>

            </header>

            <!-- MAIN -->
            <main class="flex-1 overflow-y-auto p-6 bg-gray-50/50">

                <!-- TOP -->
                <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">

                    <div>

                        <h2 class="text-2xl font-bold text-gray-900">

                            Teachers

                        </h2>

                        <p class="text-sm text-gray-500 mt-1">

                            Manage all teachers information.

                        </p>

                    </div>

                    <a href="{{ route('teacher.create') }}"
                        class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium px-4 py-2.5 rounded-lg shadow-sm transition-colors">

                        <i class="fa-solid fa-plus"></i>

                        Add Teacher

                    </a>

                </div>

                <!-- FILTER -->
                <form method="GET" action="{{ route('admin.teachers.list') }}">

                    <div
                        class="bg-white p-4 rounded-xl border border-gray-200 shadow-sm mb-6 flex flex-col lg:flex-row lg:items-center justify-between gap-4">

                        <div class="flex flex-wrap items-center gap-3 flex-1">

                            <!-- SEARCH -->
                            <div class="relative w-full sm:w-64">

                                <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">

                                    <i class="fa-solid fa-magnifying-glass text-sm"></i>

                                </span>

                                <input type="text" name="search" value="{{ request('search') }}"
                                    placeholder="Search teacher..."
                                    class="w-full pl-9 pr-4 py-2 border border-gray-200 rounded-lg text-sm bg-gray-50/50">

                            </div>

                            <!-- DEPARTMENT -->
                            <select name="department"
                                class="px-3 py-2 border border-gray-200 rounded-lg text-sm bg-white text-gray-600">

                                <option value="">All Departments</option>

                                <option value="Computer Science">

                                    Computer Science

                                </option>

                                <option value="Engineering">

                                    Engineering

                                </option>

                                <option value="Business">

                                    Business

                                </option>

                            </select>

                            <!-- BUTTON -->
                            <button type="submit"
                                class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg text-sm font-medium">

                                Filter

                            </button>

                        </div>

                    </div>

                </form>

                <!-- TABLE -->
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden">

                    <div class="overflow-x-auto">

                        <table class="w-full text-left border-collapse whitespace-nowrap">

                            <thead>

                                <tr
                                    class="bg-gray-50 border-b border-gray-200 text-xs font-semibold uppercase tracking-wider text-gray-500">

                                    <th class="px-6 py-4">

                                        Teacher

                                    </th>

                                    <th class="px-6 py-4">

                                        Teacher ID

                                    </th>

                                    <th class="px-6 py-4">

                                        Department

                                    </th>

                                    <th class="px-6 py-4">

                                        Designation

                                    </th>

                                    <th class="px-6 py-4 text-right">

                                        Actions

                                    </th>

                                </tr>

                            </thead>

                            <tbody class="divide-y divide-gray-200 text-sm">

                                @forelse($teachers as $teacher)
                                    <tr class="hover:bg-gray-50 transition-colors">

                                        <!-- TEACHER -->
                                        <td class="px-6 py-4 flex items-center gap-3">

                                            <img class="h-10 w-10 rounded-full object-cover border border-gray-200"
                                                src="{{ asset('uploads/teachers/' . $teacher->photo) }}" alt="">

                                            <div>

                                                <span class="font-semibold text-gray-900 block">

                                                    {{ $teacher->first_name }}
                                                    {{ $teacher->last_name }}

                                                </span>

                                                <span class="text-xs text-gray-400">

                                                    {{ $teacher->email }}

                                                </span>

                                            </div>

                                        </td>

                                        <!-- ID -->
                                        <td class="px-6 py-4 text-gray-600">

                                            {{ $teacher->teacher_id }}

                                        </td>

                                        <!-- DEPARTMENT -->
                                        <td class="px-6 py-4 text-gray-700">

                                            {{ $teacher->department }}

                                        </td>

                                        <!-- DESIGNATION -->
                                        <td class="px-6 py-4 text-gray-700">

                                            {{ $teacher->designation }}

                                        </td>

                                        <!-- ACTION -->
                                        <td class="px-6 py-4 text-right">

                                            <div class="flex justify-end gap-2">



                                                <a href="{{ route('teachers.show', Crypt::encryptString($teacher->id)) }}"
                                                    class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg">
                                                    <i class="fa-regular fa-eye"></i>
                                                </a>

                                                <a href="{{ route('teachers.edit', Crypt::encryptString($teacher->id)) }}"
                                                    class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>

                                                <form id="delete-form-{{ $teacher->id }}"
                                                    action="{{ route('teachers.delete', Crypt::encryptString($teacher->id)) }}"
                                                    method="POST" style="display:none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>

                                                <a href="javascript:void(0)"
                                                    onclick="confirmDelete({{ $teacher->id }})"
                                                    class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg">

                                                    <i class="fa-regular fa-trash-can"></i>

                                                </a>

                                            </div>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>

                                        <td colspan="5" class="text-center py-6 text-gray-500">

                                            No Teachers Found

                                        </td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                    <!-- PAGINATION -->
                    <div class="p-4">

                        {{ $teachers->links() }}

                    </div>

                </div>

            </main>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Delete Teacher?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {

                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }

            });
        }
    </script>



</body>

</html>
