<x-app-layout pageTitle="All Students">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.students') }}"
                        class="text-secondary">Students</a></h1>
            </header>

            <x-session-error />

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-800 shadow rounded-lg">

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>ID Number</th>
                            <th>Matricule</th>
                            <th>Level</th>
                            <th>Gender</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @isset($students)

                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $student->user->name }}</td>
                                    <td>{{ $student->id_card_number }}</td>
                                    <td>{{ $student->matricule }}</td>
                                    <td>{{ $student->level->name }}</td>
                                    <td>{{ $student->user->gender }}</td>
                                    <td>{{ $student->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="flex flex-col md:flex-row justify-center items-center gap-3">

                                            <x-primary-linkbutton href="{{ route('admin.students.edit', $student->id) }}">
                                                Edit
                                            </x-primary-linkbutton>

                                            <x-view-modal key="{{ $student->id }}" heading="Student Details"
                                                button="More">
                                                <div class="overflow-x-auto">

                                                     <table
                                                        class="min-w-full table-auto border border-gray-600 dark:border-gray-700 rounded-md shadow-sm mb-5">
                                                        <tbody
                                                            class="divide-y divide-gray-700 text-sm text-gray-700 dark:text-neutral-200">

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Diploma
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->diploma->name }}</td>
                                                            </tr>


                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Department
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->department->name }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Course Session
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->courseSession->name }}</td>
                                                            </tr>

                                                           
                                                        </tbody>
                                                    </table>

                                                    <table
                                                        class="min-w-full table-auto border border-gray-600 dark:border-gray-700 rounded-md shadow-sm">
                                                        <tbody
                                                            class="divide-y divide-gray-700 text-sm text-gray-700 dark:text-neutral-200">

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Address
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->address }}</td>
                                                            </tr>


                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Phone Number
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->phone_number }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Date of Birth
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->date_of_birth }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Place of Birth
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->place_of_birth }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Salutation
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->salutation }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Marital Status
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->marital_status }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Preffered
                                                                    Language
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->preferred_language }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Academic
                                                                    Diplomas
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->academic_diplomas }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Professional
                                                                    Diplomas
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->professional_diplomas }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Professional
                                                                    Experience
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->professional_experience }}</td>
                                                            </tr>


                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Other Relevant
                                                                    Info
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $student->other_relevant_info }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Created</td>
                                                                <td class="px-4 py-3">
                                                                    {{ $student->created_at->toFormattedDayDateString() }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </x-view-modal>

                                            {{-- <x-primary-linkbutton
                                                 href="{{ route('admin.teachers.courses', $student->id) }}"> Courses
                                             </x-primary-linkbutton> --}}

                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        @endisset

                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>ID Number</th>
                            <th>Matricule</th>
                            <th>Level</th>
                            <th>Gender</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
