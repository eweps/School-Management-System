<x-app-layout pageTitle="All Learning Resources">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('teacher.resources') }}" class="text-secondary">Learning Resources</a>
                </h1>
            </header>

            <x-session-error />

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-800 shadow rounded-lg">

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @isset($resources)

                            @foreach ($resources as $resource)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $resource->name }}</td>
                                    <td>{{ $resource->course->name }}</td>
                                    <td>{{ $course->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="flex flex-col md:flex-row justify-center items-center gap-3">

                                            <x-view-modal key="{{ $resource->id }}" heading="Resource Details" button="More">
                                                <div class="overflow-x-auto">
                                                    <table
                                                        class="min-w-full table-auto border border-gray-600 dark:border-gray-700 rounded-md shadow-sm">
                                                        <tbody
                                                            class="divide-y divide-gray-700 text-sm text-gray-700 dark:text-neutral-200">
                                                            <tr>
                                                                <td class="font-medium px-4 py-3 w-1/3 uppercase">Name</td>
                                                                <td class="px-4 py-3">{{ $resource->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Description</td>
                                                                <td class="px-4 py-3 capitalize">{{ $resource->description }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </x-view-modal>
       
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
                            <th>Course</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
