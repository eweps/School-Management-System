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
                            <th>Student</th>
                            <th>Fee</th>
                            <th>Total Fee</th>
                            <th>Paid Amount</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @isset($feeRecords)

                        @foreach ($feeRecords as $feeRecord)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $feeRecord->student->user->name }}</td>
                            <td>{{ $feeRecord->fee->title }}</td>
                            <td> {{ Number::currency($feeRecord->fee->amount, 'XAF', 'en') }}</td>
                            <td> {{ Number::currency($feeRecord->amount_paid, 'XAF', 'en') }}</td>
                            <td>{{ $feeRecord->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="flex flex-col md:flex-row justify-center items-center gap-3">


                                    <x-view-modal key="{{ $feeRecord->id }}" heading="Fee Record Details" button="More">
                                        <div class="overflow-x-auto">

                                            <table class="min-w-full table-auto border border-gray-600 dark:border-gray-700 rounded-md shadow-sm">
                                                <tbody class="divide-y divide-gray-700 text-sm text-gray-700 dark:text-neutral-200">

                                                    <tr>
                                                        <td class="font-medium px-4 py-3 uppercase">Reference
                                                        </td>
                                                        <td class="px-4 py-3 capitalize">
                                                            {{ $feeRecord->reference }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="font-medium px-4 py-3 uppercase">Total Amount
                                                        </td>
                                                        <td class="px-4 py-3 capitalize">
                                                            {{ Number::currency($feeRecord->fee->amount, 'XAF', 'en') }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="font-medium px-4 py-3 uppercase">Amount Paid
                                                        </td>
                                                        <td class="px-4 py-3 capitalize">
                                                            {{ Number::currency($feeRecord->amount_paid, 'XAF', 'en') }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="font-medium px-4 py-3 uppercase">Amount Left
                                                        </td>
                                                        <td class="px-4 py-3 capitalize">
                                                            {{ Number::currency($feeRecord->amount_left, 'XAF', 'en') }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td class="font-medium px-4 py-3 uppercase">Paid
                                                        </td>
                                                        <td class="px-4 py-3 capitalize">
                                                            {{ $feeRecord->created_at }}</td>
                                                    </tr>


                                                </tbody>
                                            </table>
                                        </div>
                                    </x-view-modal>
                                
                                    <form class="delete-form" action="{{ route('admin.fee-records.delete') }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <input type="hidden" name="id" value="{{ $feeRecord->id }}">
                                        <input type="hidden" name="student_id" value="{{ $feeRecord->student_id }}">
                                        <input type="hidden" name="fee_id" value="{{ $feeRecord->fee_id }}">
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
                            <th>Student</th>
                            <th>Fee</th>
                            <th>Total Fee</th>
                            <th>Paid Amount</th>
                            <th>Created</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
