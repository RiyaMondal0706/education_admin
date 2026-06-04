<tbody class="divide-y divide-gray-200 text-sm">

    @forelse($students as $student)
        <tr class="hover:bg-gray-50/50 transition-colors">

            <!-- Student Info -->
            <td class="px-6 py-4 flex items-center gap-3">

                <img class="h-10 w-10 rounded-full object-cover border border-gray-200"
                    src="{{ asset('uploads/students/' . $student->photo) }}" alt="">

                <div>

                    <span class="font-semibold text-gray-900 block">

                        {{ $student->first_name }}
                        {{ $student->last_name }}

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
                <form action="{{ route('students.toggle-status', $student->id) }}" method="POST">
                    @csrf

                    <button type="submit">
                        @if ($student->status)
                            <span
                                class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                Active
                            </span>
                        @else
                            <span
                                class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700 border border-red-100">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                Inactive
                            </span>
                        @endif
                    </button>
                </form>
            </td>

            <!-- Actions -->
            <td class="px-6 py-4 text-right">

                <div class="flex justify-end gap-2">

                    <a href="{{ route('students.show', $student->id) }}"
                        class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg">
                        <i class="fa-regular fa-eye"></i>
                    </a>

                    <a href="#" class="p-2 text-amber-600 hover:bg-amber-50 rounded-lg">

                        <i class="fa-regular fa-pen-to-square"></i>

                    </a>

                    <a href="#" class="p-2 text-rose-600 hover:bg-rose-50 rounded-lg">

                        <i class="fa-regular fa-trash-can"></i>

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
