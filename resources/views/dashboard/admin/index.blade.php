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

                <div class="shadow border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg  py-4 px-3 flex flex-col-reverse text-center sm:text-start sm:flex-row items-center justify-between text-base cursor-pointer transition-transform delay-150 ease-in-out hover:scale-[1.03] dark:text-neutral-200">
                        <div class="flex-shrink-0">
                            <p class="font-semibold">{{ $totalTeachers }}</p>
                            <h3 class="text-neutral-500 dark:text-neutral-400 font-medium">Total Teachers</h3>
                        </div>

                        <div class="flex-shrink-0">
                            <i class="ri-group-line bg-amber-100 py-2 px-3 rounded-lg text-amber-700"></i>
                        </div>
                </div>

                <div class="shadow border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg  py-4 px-3 flex flex-col-reverse text-center sm:text-start sm:flex-row items-center justify-between text-base cursor-pointer transition-transform delay-150 ease-in-out hover:scale-[1.03] dark:text-neutral-200">
                    <div>
                        <p class="font-semibold">{{ $totalStudents }}</p>
                        <h3 class="text-neutral-500 dark:text-neutral-400 font-medium">Total Students</h3>
                    </div>

                    <div>
                        <i class="ri-group-line bg-blue-100 py-2 px-3 rounded-lg text-blue-700"></i>
                    </div>
                </div>
          
                <div class="shadow border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg py-4 px-3 flex flex-col-reverse text-center sm:text-start sm:flex-row items-center justify-between text-base cursor-pointer transition-transform delay-150 ease-in-out hover:scale-[1.03] dark:text-neutral-200">
                    <div>
                        <p class="font-semibold">{{ $totalPendingApplications }}</p>
                        <h3 class="text-neutral-500 dark:text-neutral-400 font-medium">Total Applications</h3>
                    </div>

                    <div>
                        <i class="ri-layout-top-line bg-green-100 py-2 px-3 rounded-lg text-green-700"></i>
                    </div>
                </div>

                <div class="shadow border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 rounded-lg py-4 px-3 flex flex-col-reverse text-center sm:text-start sm:flex-row items-center justify-between text-base cursor-pointer transition-transform delay-150 ease-in-out hover:scale-[1.03] dark:text-neutral-200">
                    <div>
                        <p class="font-semibold"><span class="line-through">300,000 FCFA</span></p>
                        <h3 class="text-neutral-500 dark:text-neutral-400 font-medium">Annual Fee</h3>
                    </div>

                    <div>
                        <i class="ri-wallet-3-line bg-red-100 py-2 px-3 rounded-lg text-red-700"></i>
                    </div>
                </div>
            
            </div>

            
           <div class="grid grid-cols-1 xl:grid-cols-5 gap-y-20 gap-x-0 xl:gap-y-0 xl:gap-x-5 mt-20">
               <div class="col-span-1 xl:col-span-3">
                    <h4 class="text-base uppercase tracking-wider font-semibold dark:text-neutral-200">Monthly Transactions</h4>
                    <div class="bg-white dark:bg-gray-800 py-5 px-8 rounded-lg mt-4 shadow overflow-hidden  flex items-center justify-center h-full">
                        <div id="transactionChart" class="!w-[100%]"></div>
                    </div>
               </div>

                <div class="col-span-1 xl:col-span-2">
                    <h4 class="text-base uppercase tracking-wider font-semibold dark:text-neutral-200">Browser Usage</h4>
                    <div class="bg-white dark:bg-gray-800 py-5 px-8 rounded-lg mt-4 shadow overflow-hidden flex items-center justify-center h-full">
                        <div id="browserChart" class="!w-[100%] mb-8"></div>
                    </div>
               </div>
           </div>


        </div>
    </div>
</x-app-layout>
