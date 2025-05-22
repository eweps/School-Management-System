<x-app-layout pageTitle="{{ $application->name }} Application">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.applications') }}" class="text-secondary">{{ $application->name }} Application</a> -
                    @if($application->status === 'pending')
                        <x-badge type="warning">{{  $application->status }} </x-badge>
                    @endif

                    @if($application->status === 'approved')
                        <x-badge type="success">{{  $application->status }} </x-badge>
                    @endif

                    @if($application->status === 'rejected')
                        <x-badge type="danger">{{  $application->status }} </x-badge>
                    @endif
                </h1>
            </header>

            <div class="w-full overflow-x-auto py-5 px-10 bg-white dark:bg-gray-800 dark:text-neutral-200 shadow rounded-lg">

               <div class="flex flex-col lg:flex-row items-center justify-between mb-8">
                     <h2 class="text-center uppercase tracking-widest">{{ $application->name }} - <span class="font-semibold">Application Form</span></h2>
                     <x-primary-linkbutton href="{{ route('admin.applications.pdf', $application->id) }}">
                        Generate PDF 
                    </x-primary-linkbutton>
               </div>

                <table id="applicationForm">

                        <tr>
                            <th colspan="5" class="theading border bg-slate-200 dark:bg-gray-900 uppercase tracking-widest">Personal Information</th>
                        </tr>

                        <tr class="border-b">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Gender</th>
                            <th>ID Card Number</th>
                            <th>Telephone Number </th>
                        </tr>

                        <tr>
                            <td>{{ ucwords($application->salutation) . " " . $application->name }}</td>
                            <td>{{ $application->email }}</td>
                            <td>{{ $application->gender }}</td>
                            <td>{{ $application->id_card_number }}</td>
                            <td>{{ $application->phone_number }}</td>
                        </tr>

                        
                        <tr class="border-b">
                            <th>Marital Status</th>
                            <th>Date of Birth</th>
                            <th>Place of Birth</th>
                            <th>Preferred Language</th>
                            <th>Address </th>
                        </tr>

                        <tr>
                            <td>{{ $application->marital_status }}</td>
                            <td>{{ $application->date_of_birth }}</td>
                            <td>{{ $application->place_of_birth }}</td>
                            <td>{{ $application->preferred_language }}</td>
                            <td>{{ $application->address }}</td>
                        </tr>

                        <tr>
                            <th colspan="5" class="theading border bg-slate-200 dark:bg-gray-900 uppercase tracking-widest">Program Selection</th>
                        </tr>

                        <tr>
                            <th colspan="3">Type of Diploma</th>
                            <th colspan="3">Course Session</th>
                        </tr>

                        <tr>
                            <td colspan="3" class="py-8">{{ $application->diploma->name }}</td>
                            <td colspan="3" class="py-8">{{ $application->courseSession->name }}</td>
                        </tr>

                        <tr>
                            <th colspan="5" class="theading border bg-slate-200 dark:bg-gray-900 uppercase tracking-widest">Academic Information</th>
                        </tr>


                        <tr>
                            <th colspan="3">Academic Diploma</th>
                            <th colspan="3">Professional Diploma</th>
                        </tr>

                        <tr>
                            <td colspan="3" class="py-8">{{ $application->academic_diploma ?? "------" }}</td>
                            <td colspan="3" class="py-8">{{ $application->professional_diploma ?? "------" }}</td>
                        </tr>

                        <tr>
                            <th colspan="3">Professional Experience</th>
                            <th colspan="3">Other Relevant Information</th>
                        </tr>

                        <tr>
                            <td colspan="3" class="py-8">{{ $application->professional_experience ?? "------" }}</td>
                            <td colspan="3" class="py-8">{{ $application->other_relevant_information ?? "------" }}</td>
                        </tr>

                  </tbody>

                </table>

            </div>


        </div>
    </div>
</x-app-layout>
