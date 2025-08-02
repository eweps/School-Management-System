<x-app-layout  pageTitle="Home">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.dashboard') }}" class="text-secondary">Analytics</a></h1>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

                <x-stats class="text-amber-700 bg-amber-100 ri-group-line" heading="Total Teachers" value="{{ $totalTeachers ?? 0 }}" />

                <x-stats class="text-blue-700 bg-blue-100 ri-group-line" heading="Total Students" value="{{ $totalStudents ?? 0 }}" />

                <x-stats class="text-pink-700 bg-pink-100 ri-group-line" heading="Total Admins" value="{{ $totalAdmins ?? 0 }}" />

                <x-stats class="text-orange-700 bg-orange-100 ri-layout-top-line" heading="Pending Applications" value="{{ $totalPendingApplications ?? 0 }}" />
                
                <x-stats class="text-green-700 bg-green-100 ri-layout-top-line" heading="Approved Applications" value="{{ $totalApprovedApplications ?? 0 }}" />
                
                <x-stats class="text-purple-700 bg-purple-100 ri-layout-top-line" heading="Rejected Applications" value="{{ $totalRejectedApplications ?? 0 }}" />
                
                <x-stats class="text-teal-700 bg-teal-100 ri-notification-line" heading="Unread Notifications" value="{{ $unreadNotifications ?? 0 }}" />

                <x-stats class="text-red-700 bg-red-100 ri-wallet-3-line" heading="Annual Fee" value="{{ Number::currency($annualFee, 'XAF', 'en') }}" />
        
            </div>

            
           <div class="grid grid-cols-1 xl:grid-cols-5 gap-y-20 gap-x-0 xl:gap-y-0 xl:gap-x-5 mt-16">
               <div class="col-span-1 xl:col-span-3">
                    <h4 class="text-base uppercase tracking-wider font-semibold dark:text-neutral-200">Fee Records For  ({{ date('F') }})</h4>
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 py-5 px-8 rounded-lg mt-4 shadow overflow-hidden  flex items-center justify-center h-full">
                        <div id="transactionChart" class="!w-[100%]"></div>
                    </div>
               </div>

                <div class="col-span-1 xl:col-span-2">
                    <h4 class="text-base uppercase tracking-wider font-semibold dark:text-neutral-200">Browser Usage</h4>
                    <div class="bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 py-5 px-8 rounded-lg mt-4 shadow overflow-hidden flex items-center justify-center h-full">
                        <div id="browserChart" class="!w-[100%] mb-8"></div>
                    </div>
               </div>
           </div>


        </div>
    </div>
</x-app-layout>
