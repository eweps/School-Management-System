<x-app-layout pageTitle="All Departments">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.departments') }}"
                        class="text-secondary">Departments</a></h1>
            </header>

            <x-session-error />

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-800 shadow rounded-lg">

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Courses</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @isset($departments)

                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $department->name }}</td>
                                    <td> [{{ $department->courses()->count() }}] </td>
                                    <td>{{ $department->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="flex flex-col md:flex-row justify-center items-center gap-3">

                                            <x-view-modal key="{{ $department->id }}" heading="Department Details"
                                                button="More">
                                                <div class="overflow-x-auto">
                                                    <table
                                                        class="min-w-full table-auto border border-gray-600 dark:border-gray-700 rounded-md shadow-sm">
                                                        <tbody
                                                            class="divide-y divide-gray-700 text-sm text-gray-700 dark:text-neutral-200">
                                                            <tr>
                                                                <td class="font-medium px-4 py-3 w-1/3 uppercase">Name</td>
                                                                <td class="px-4 py-3">{{ $department->name }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Description</td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $department->description }}
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Num of Courses
                                                                </td>
                                                                <td class="px-4 py-3 capitalize">
                                                                    {{ $department->courses()->count() }}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="font-medium px-4 py-3 uppercase">Created</td>
                                                                <td class="px-4 py-3">
                                                                    {{ $department->created_at->toFormattedDayDateString() }}
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </x-view-modal>

                                            <x-primary-linkbutton
                                                href="{{ route('admin.departments.edit', $department->id) }}"> Edit
                                            </x-primary-linkbutton>

                                            <form class="delete-form" action="{{ route('admin.departments.delete') }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" value="{{ $department->id }}">
                                                <x-danger-button> Del</x-danger-button>
                                            </form>

                                            <x-primary-linkbutton
                                                href="{{ route('admin.departments.courses', $department->id) }}"> Courses
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
                            <th>Courses</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
