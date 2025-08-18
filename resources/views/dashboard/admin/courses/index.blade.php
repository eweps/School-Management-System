<x-app-layout pageTitle="All Courses">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.courses') }}" class="text-secondary">Courses</a>
                </h1>
            </header>

            <x-session-error />

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-800 shadow rounded-lg">

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Credit</th>
                            <th>Semester</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @isset($courses)

                        @foreach ($courses as $course)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $course->name ?? '' }}</td>
                            <td>{{ $course->code }}</td>
                            <td>{{ $course->credit_value }}</td>
                            <td>{{ $course->semester->name ?? '' }}</td>
                            <td>{{ $course->level->name ?? 'none' }}</td>
                            <td>
                                <div class="flex flex-col md:flex-row justify-center items-center gap-3">

                                    <x-view-modal key="{{ $course->id }}" heading="Course Details" button="More">
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full table-auto border border-gray-600 dark:border-gray-700 rounded-md shadow-sm">
                                                <tbody class="divide-y divide-gray-700 text-sm text-gray-700 dark:text-neutral-200">
                                                    <tr>
                                                        <td class="font-medium px-4 py-3 w-1/3 uppercase">Name</td>
                                                        <td class="px-4 py-3">{{ $course->name ?? "" }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-medium px-4 py-3 uppercase">Level</td>
                                                        <td class="px-4 py-3 capitalize">{{ $course->level->name ?? 'none' }}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-medium px-4 py-3 uppercase">Description</td>
                                                        <td class="px-4 py-3 capitalize">{{ $course->description }}
                                                        </td>
                                                    </tr>

                                                    <td class="font-medium px-4 py-3 uppercase">Teachers</td>
                                                    <td class="px-4 py-3 capitalize">
                                                       
                                                        @if(count($course->teachers) === 0)
                                                            <p>No assigned teacher</p>

                                                        @else
                                                            @foreach ($course->teachers as $teacher)
                                                                <p>{{ $teacher->user->name ?? "" }}</p>
                                                            @endforeach
                                                        @endif
                                                    </td>

                                                    <tr>
                                                        <td class="font-medium px-4 py-3 uppercase">Code</td>
                                                        <td class="px-4 py-3">{{ $course->code }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-medium px-4 py-3 uppercase">Credit</td>
                                                        <td class="px-4 py-3 capitalize">
                                                            {{ $course->credit_value }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-medium px-4 py-3 uppercase">Semester</td>
                                                        <td class="px-4 py-3">{{ $course->semester->name ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="font-medium px-4 py-3 uppercase">Created</td>
                                                        <td class="px-4 py-3">
                                                            {{ $course->created_at->toFormattedDayDateString() }}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </x-view-modal>

                                    <x-primary-linkbutton href="{{ route('admin.courses.edit', $course->id) }}">
                                        Edit </x-primary-linkbutton>

                                    <form class="delete-form" action="{{ route('admin.courses.delete') }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $course->id }}">
                                        <x-danger-button> Del</x-danger-button>
                                    </form>
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
                            <th>Code</th>
                            <th>Credit</th>
                            <th>Semester</th>
                            <th>Level</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
