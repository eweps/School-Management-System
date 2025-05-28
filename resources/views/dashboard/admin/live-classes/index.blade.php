<x-app-layout pageTitle="All Live Classes">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.liveclasses') }}" class="text-secondary">Live
                        Classes</a></h1>
            </header>

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-800 shadow rounded-lg">

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Start Date </th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @isset($liveClasses)

                            @foreach ($liveClasses as $liveClass)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $liveClass->title }}</td>
                                    <td>
                                        @if ($liveClass->is_expired)
                                            <x-badge type="danger">{{ __('expired') }} </x-badge>
                                        @else
                                            <x-badge type="success">{{ __('active') }} </x-badge>
                                        @endif
                                    </td>
                                    <td>{{ $liveClass->date->toDateString() }}</td>
                                    <td>{{ $liveClass->created_at->diffForHumans() }}</td>
                                    <td>
                                        <div class="flex flex-col md:flex-row justify-center items-center gap-3">
                                            <x-view-modal key="{{ $liveClass->id }}" heading="Live Class Description"
                                                button="More">

                                                <table
                                                    class="min-w-full table-auto border border-gray-600 dark:border-gray-700 rounded-md shadow-sm">
                                                    <tbody
                                                        class="divide-y divide-gray-700 text-sm text-gray-700 dark:text-neutral-200">
                                                        <tr>
                                                            <td class="font-medium px-4 py-3 w-1/3 uppercase">Description
                                                            </td>
                                                            <td class="px-4 py-3">{{ $liveClass->description }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-medium px-4 py-3 uppercase">Start Date</td>
                                                            <td class="px-4 py-3">
                                                                {{ $liveClass->date->toFormattedDayDateString() }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-medium px-4 py-3 uppercase">Start Time</td>
                                                            <td class="px-4 py-3 capitalize">
                                                                {{ $liveClass->start_time->format('H:i a') }}</td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                                <div class="mb-3">
                                                    <h3 class="text-center font-semibold mb-3 dark:text-neutral-200">Copy
                                                        and
                                                        Share Live Class Link
                                                    </h3>

                                                    <div class="flex items-center gap-2">
                                                        <!-- Target -->
                                                        <input id="clipboardCopy{{ $liveClass->id }}"
                                                            value="{{ $liveClass->link }}"
                                                            class="clipboardCopy w-full rounded-lg border read-only:bg-slate-200 dark:text-neutral-900"
                                                            readonly>

                                                        <!-- Trigger -->
                                                        <button
                                                            class="clipBtn py-3 px-1 w-10 h-full t bg-primary hover:bg-primary-dark text-white rounded-lg"
                                                            data-clipboard-target="#clipboardCopy{{ $liveClass->id }}">

                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-clipboard mx-auto" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1z" />
                                                                <path
                                                                    d="M9.5 1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0z" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            </x-view-modal>

                                            <x-primary-linkbutton
                                                href="{{ route('admin.liveclasses.edit', ['id' => $liveClass->id]) }}">
                                                {{ __('Edit') }}
                                            </x-primary-linkbutton>

                                            <form id="delete-{{ $liveClass->id }}" class="delete-form"
                                                action="{{ route('admin.liveclasses.delete') }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" value="{{ $liveClass->id }}">
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
                            <th>Title</th>
                            <th>Status</th>
                            <th>Start Date </th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
