<x-app-layout pageTitle="All Users">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.users') }}" class="text-secondary">Users</a>
                </h1>
            </header>

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-800  shadow rounded-lg">

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Verified</th>
                            <th>Role </th>
                            <th>Gender</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @isset($users)

                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        @if ($user->is_active)
                                            <x-badge type="success">{{ __('active') }} </x-badge>
                                        @else
                                            <x-badge type="danger">{{ __('not active') }} </x-badge>
                                        @endif
                                    </td>
                                    <td> {{ $user->email_verified_at !== null ? 'yes' : 'no' }} </td>
                                    <td>{{ $user->roles()->first()->name }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="flex flex-col md:flex-row justify-center items-center gap-3">
                                            @if ($user->id !== auth()->user()->id)

                                                <x-primary-linkbutton href="{{ route('admin.users.edit', $user->id) }}">
                                                    Edit 
                                                </x-primary-linkbutton>

                                                <x-view-modal key="{{ $user->id }}" heading="User Details" button="More">
                                                    <div class="overflow-x-auto">
                                                        <table
                                                            class="min-w-full table-auto border border-gray-600 dark:border-gray-700 rounded-md shadow-sm">
                                                            <tbody class="divide-y divide-gray-700 text-sm text-gray-700 dark:text-neutral-200">
                                                                <tr>
                                                                    <td class="font-medium px-4 py-3 w-1/3 uppercase">Name</td>
                                                                    <td class="px-4 py-3">{{ $user->name }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-medium px-4 py-3 uppercase">Email</td>
                                                                    <td class="px-4 py-3">{{ $user->email }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-medium px-4 py-3 uppercase">Gender</td>
                                                                    <td class="px-4 py-3 capitalize">{{ $user->gender }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-medium px-4 py-3 uppercase">Timezone</td>
                                                                    <td class="px-4 py-3">{{ $user->timezone }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="font-medium px-4 py-3 uppercase">Created</td>
                                                                    <td class="px-4 py-3">{{ $user->created_at->toFormattedDayDateString() }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </x-view-modal>

                                            @else
                                                <x-primary-linkbutton href="{{ route('profile.edit') }}"> Profile
                                                </x-primary-linkbutton>

                                            @endif



                                            {{-- <form action="{{ route('admin.diplomas.delete') }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" value="{{ $diploma->id }}">
                                                <x-danger-button> Del</x-danger-button>
                                            </form>  --}}
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
                            <th>Status</th>
                            <th>Verified</th>
                            <th>Role</th>
                            <th>Gender</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
