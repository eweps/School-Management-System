<x-app-layout pageTitle="All Semesters">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.semesters') }}" class="text-secondary">Semesters</a></h1>
            </header>

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-800  shadow rounded-lg">

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                       @isset($semesters)

                            @foreach ($semesters as $semester)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $semester->name }}</td>
                                    <td> {{ \Illuminate\Support\Str::limit($semester->description, 20) }}</td>
                                    <td>{{ $semester->created_at->diffForHumans() }}</td>
                                    <td>
                                       <div class="flex flex-col md:flex-row justify-center items-center gap-3">
                                            <x-primary-linkbutton href="{{ route('admin.semesters.edit', $semester->id) }}"> Edit </x-primary-linkbutton>

                                            <form id="delete-{{ $semester->id }}" class="delete-form" action="{{ route('admin.semesters.delete') }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" value="{{ $semester->id }}">
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
                            <th>Description</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
