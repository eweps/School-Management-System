<x-app-layout pageTitle="Enter CA Marks">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.ca-marks.create', $course->id) }}" class="text-secondary">Enter CA Marks For Course {{ $course->name }}</a>
                </h1>
            </header>


            <x-session-status key="ca-saved" message="Mark Saved Successfully" />
            <x-session-error />

            <form action="{{ route('admin.ca-marks.store', $course->id) }}" method="post">
                @csrf
                <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-800 shadow rounded-lg">

                    <div class="flex items-center justify-center gap-2">
                        <x-primary-linkbutton href="{{ route('admin.ca-marks.pdf', $course->id) }}">
                            Generate PDF
                        </x-primary-linkbutton>

                    </div>

                    <table class="dt-table display">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Matricule</th>
                                <th>Course</th>
                                <th>Mark / {{ getSetting('TOTAL_CA_MARK') }}</th>
                            </tr>
                        </thead>

                        <tbody>

                            @isset($students)

                            @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->user->name }}</td>
                                <td>{{ $student->matricule }}</td>
                                <td>{{ $course->name }}</td>
                                <td>
                                    @php
                                    $existingMark = $caMarks[$student->id]->mark ?? '';
                                    @endphp
                                    <x-text-input name="marks[{{ $student->id }}][mark]" class="w-[120px] text-center" min="0" max="30" value="{{ old('marks.' . $student->id . '.mark', $existingMark) }}" required />
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

                <div class="flex items-center gap-4 mt-5">
                    <x-primary-button>{{ __('Submit') }}</x-primary-button>

                    @if (session('status') === 'ca-saved')
                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                    @endif
                </div>

            </form>


        </div>
    </div>
</x-app-layout>
