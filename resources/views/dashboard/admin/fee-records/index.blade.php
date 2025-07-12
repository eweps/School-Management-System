<x-app-layout pageTitle="All Fee Records">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.fee-records') }}" class="text-secondary">Fee Records</a></h1>
            </header>

            <x-session-error />

            <div class="w-full overflow-x-auto py-5 px-4 bg-white dark:bg-gray-800 shadow rounded-lg">

                <table class="dt-table display">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fee</th>
                            <th>Student</th>
                            <th>Total Fee</th>
                            <th>Paid Amount</th>
                            <th>Amount Left</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                       @isset($feeRecords)

                            @foreach ($feeRecords as $feeRecord)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $feeRecord->fee->title }}</td>
                                    <td>{{ $feeRecord->student->user->name }}</td>
                                    <td> {{ Number::currency($feeRecord->fee->amount, 'XAF', 'en'); }}</td>
                                    <td> {{ Number::currency($feeRecord->amount_paid, 'XAF', 'en') }}</td>
                                    <td> {{ Number::currency($feeRecord->amount_left, 'XAF', 'en'); }}</td>
                                    <td>{{ $feeRecord->created_at->diffForHumans() }}</td>
                                    <td>
                                       <div class="flex flex-col md:flex-row justify-center items-center gap-3">
                                            {{-- <x-primary-linkbutton href="{{ route('admin.fees.edit', $fee->id) }}"> Edit </x-primary-linkbutton>

                                            <form class="delete-form" action="{{ route('admin.fees.delete') }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="id" value="{{ $fee->id }}">
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
                            <th>Fee</th>
                            <th>Student</th>
                            <th>Total Fee</th>
                            <th>Paid Amount</th>
                            <th>Amount Left</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
