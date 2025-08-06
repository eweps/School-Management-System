<x-app-layout pageTitle="All CA Marks">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('student.exam-results') }}" class="text-secondary">Exam Results</a>
                </h1>
            </header>

            <x-session-error />

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-800 shadow rounded-lg">

                  <form action="{{ route('student.exam-results.pdf') }}" class="flex justify-center items-center flex-col mb-5 md:flex-row md:mb-0 gap-2" method="POST">
                    @csrf

                    <div>
                        <x-select-input id="semester" name="semester" class="mt-1 block w-full">
                            <option selected disabled>{{ __('Select a Semester') }}</option>
                            
                            @isset($semesters)
                                @foreach ($semesters as $semester )
                                    <option value="{{ $semester->id }}">{{ __($semester->name) }}</option>
                                @endforeach
                            @endisset

                        </x-select-input>
                        <x-input-error class="mt-2" :messages="$errors->get('semester')" />
                    </div>
                    
                    <x-primary-button type="submit">
                        Get Exam Results
                    </x-primary-button>
                </form>

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Level</th>
                            <th>Semester</th>
                            <th>Credit</th>
                            <th>Mark</th>
                        </tr>
                    </thead>

                    <tbody>

                        @isset($examResults)

                        @foreach ($examResults as $result)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $result->course->name }}</td>
                            <td>{{ $result->course->code}}</td>
                            <td>{{ $result->course->level?->name }}</td>
                            <td>{{ $result->course->semester->name }}</td>
                            <td><span class="text-center block">{{ $result->course->credit_value }}</span></td>
                            <td><span class="block text-center">{{ $result->mark }}</span></td>
                        </tr>
                        @endforeach

                        @endisset

                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Level</th>
                            <th>Semester</th>
                            <th>Credit</th>
                            <th>Mark</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
