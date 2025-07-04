<x-app-layout pageTitle="All Applications">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.applications') }}"
                        class="text-secondary">Applications</a></h1>
            </header>

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-800 shadow rounded-lg">

                <div class="flex justify-center items-center">
                    <x-primary-linkbutton href="{{ route('admin.applications.empty.pdf') }}">
                        Get Empty Form
                    </x-primary-linkbutton>
                </div>

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Submitted</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @isset($applications)

                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $application->name }}</td>
                                    <td>{{ $application->gender }}</td>
                                    <td>
                                        @if ($application->status === \App\Enums\ApplicationStatus::PENDING)
                                            <x-badge type="warning">{{ $application->status }} </x-badge>
                                        @endif

                                        @if ($application->status === \App\Enums\ApplicationStatus::APPROVED)
                                            <x-badge type="success">{{ $application->status }} </x-badge>
                                        @endif

                                        @if ($application->status === \App\Enums\ApplicationStatus::REJECTED)
                                            <x-badge type="danger">{{ $application->status }} </x-badge>
                                        @endif

                                    </td>
                                    <td>
                                        {{ $application->created_at->diffForHumans() }}
                                        <div> {{ $application->created_at->toDayDateTimeString() }} </div>
                                    </td>
                                    <td>
                                        <div class="flex flex-col md:flex-row justify-center items-center gap-3">
                                            <x-primary-linkbutton
                                                href="{{ route('admin.applications.show', $application->id) }}">
                                                View
                                            </x-primary-linkbutton>
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
                            <th>Gender</th>
                            <th>Status</th>
                            <th>Submitted</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
