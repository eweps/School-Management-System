<x-app-layout pageTitle="Enter CA Marks">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('teacher.ca-marks.create', $course->id) }}" class="text-secondary">Enter CA Marks For {{ $course->name }}</a>
                </h1>
            </header>

            <x-session-error />

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-800 shadow rounded-lg">

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Matricule</th>
                            <th>Course</th>
                            <th>Mark</th>
                        </tr>
                    </thead>

                    <tbody>

                        @isset($courses)

                            @foreach ($courses as $course)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td>{{ $course->code }}</td>
                                    <td>{{ $course->semester->name }}</td>
                                    <td>{{ $course->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="flex flex-col md:flex-row justify-center items-center gap-3">

                                            <x-primary-linkbutton href="{{ route('teacher.ca-marks.create', $course->id) }}">
                                                Enter </x-primary-linkbutton>
       
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
                            <th>Matricule</th>
                            <th>Course</th>
                            <th>Mark</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
