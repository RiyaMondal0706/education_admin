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

                <span
                    class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">

                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>

                    Active

                </span>

            </td>

            <!-- Actions -->
            <td class="px-6 py-4 text-right">

                <div class="flex items-center justify-end gap-2">

                    <a href="#"
                        class="p-1.5 text-gray-400 hover:text-indigo-600 rounded-lg hover:bg-gray-100 transition-all">

                        <i class="fa-regular fa-eye text-base"></i>

                    </a>

                    <a href="#"
                        class="p-1.5 text-gray-400 hover:text-amber-600 rounded-lg hover:bg-gray-100 transition-all">

                        <i class="fa-regular fa-pen-to-square text-base"></i>

                    </a>

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
