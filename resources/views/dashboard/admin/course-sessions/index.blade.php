<x-app-layout pageTitle="All Course Sessions">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.course-sessions') }}" class="text-secondary">Course Sessions</a></h1>
            </header>

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-100 shadow rounded-lg">

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Start</th>
                            <th>End</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                       @isset($courseSessions)

                            @foreach ($courseSessions as $courseSession)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $courseSession->name }}</td>
                                    <td> {{ \Illuminate\Support\Str::limit($courseSession->description, 20) }}</td>
                                    <td> {{ $courseSession->start_time->format('g:i A') }} </td>
                                    <td> {{ $courseSession->end_time->format('g:i A') }} </d>
                                    <td>{{ $courseSession->created_at->diffForHumans() }}</td>
                                    <td>
                                       <div class="flex flex-col md:flex-row justify-center items-center gap-3">
                                            <x-primary-linkbutton href="{{ route('admin.course-sessions.edit', $courseSession->id) }}"> Edit </x-primary-linkbutton>

                                            {{-- <form action="{{ route('admin.diplomas.delete') }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" value="{{ $diploma->id }}">
                                                <x-danger-button> Del</x-danger-button>
                                            </form> --}}
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
                            <th>Start</th>
                            <th>End</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
