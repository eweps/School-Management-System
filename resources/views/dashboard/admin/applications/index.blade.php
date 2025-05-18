<x-app-layout pageTitle="All Applications">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.applications') }}" class="text-secondary">Applications</a></h1>
            </header>

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-100 shadow rounded-lg">

            <div class="flex justify-center items-center">
                  <x-primary-linkbutton href="{{ route('admin.applications.empty.pdf') }}">
                    <img src="{{ asset('images/pdf.svg') }}" class="me-1" />
                    Get Empty Form
                  </x-primary-linkbutton>
            </div>

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>IdCard</th>
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
                                    <td>{{ $application->email }}</td>
                                    <td>{{ $application->gender }}</td>
                                    <td>{{ $application->id_card_number }}</td>
                                    <td>{{ $application->created_at->diffForHumans() }}</td>
                                    <td>
                                       <div class="flex flex-col md:flex-row justify-center items-center gap-3">
                                            <x-primary-linkbutton href="{{ route('admin.applications.show', $application->id) }}">
                                                <img src="{{ asset('images/eye.svg') }}" />
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
                            <th>Email</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Submitted</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
