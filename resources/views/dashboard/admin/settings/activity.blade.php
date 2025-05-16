<x-app-layout pageTitle="Auth Activities">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.activities') }}" class="text-secondary">Auth Log Activities</a></h1>
            </header>

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-100 shadow rounded-lg">

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th class="w-10">#</th>
                            <th class="w-10">User</th>
                            <th class="w-10">IP Address</th>
                            <th class="w-10">User Agent</th>
                            <th class="w-10">Login</th>
                            <th class="w-10">Auth Status </th>
                            <th class="w-10">Logout</th>
                        </tr>
                    </thead>

                    <tbody>

                       @isset($activities)

                            @foreach ($activities as $activity)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $activity->authenticatable_type::find($activity->authenticatable_id)->name }}</td>
                                    <td> {{ $activity->ip_address }} </td>
                                    <td> {{ $activity->user_agent }}</td>
                                    <td> {{ $activity->login_at?->diffForHumans() }} </td>
                                    <td> {{ $activity->login_successful == 1 ? 'success' : 'failed' }}  </td>
                                    <td> {{ $activity->logout_at?->diffForHumans() }}
                                </tr>
                            @endforeach
                       
                       @endisset

                    </tbody>

                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>User</th>
                            <th>IP Address</th>
                            <th>User Agent</th>
                            <th>Login</th>
                            <th>Auth Status </th>
                            <th>Logout</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
