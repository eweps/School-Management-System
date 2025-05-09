<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[1550px] mx-auto sm:px-6 lg:px-8">
            
            <header class="mb-8 dark:text-white">
                <h1 class="text-3xl">Dashboard / Analytics</h1>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

                <div class="shadow border border-gray-200 bg-white rounded-lg  py-4 px-3  flex items-center justify-between text-base">
                        <div>
                            <p class="font-semibold">50</p>
                            <h3 class="text-amber-700 font-semibold">Total Teachers</h3>
                        </div>

                        <div>
                            <i class="ri-group-line bg-amber-100 py-2 px-3 rounded-lg text-amber-700"></i>
                        </div>
                </div>

                <div class="shadow border border-gray-200 bg-white rounded-lg  py-4 px-3  flex items-center justify-between text-base">
                    <div>
                        <p class="font-semibold">50</p>
                        <h3 class="text-blue-700 font-semibold">Total Students</h3>
                    </div>

                    <div>
                        <i class="ri-group-line bg-blue-100 py-2 px-3 rounded-lg text-blue-700"></i>
                    </div>
                </div>
          
                <div class="shadow border border-gray-200 bg-white rounded-lg py-4 px-3  flex items-center justify-between text-base">
                    <div>
                        <p class="font-semibold">50</p>
                        <h3 class="text-green-700 font-semibold">Total Applications</h3>
                    </div>

                    <div>
                        <i class="ri-layout-top-line text-2xl bg-green-100 py-2 px-3 rounded-lg text-green-700"></i>
                    </div>
                </div>

                <div class="shadow border border-gray-200 bg-white rounded-lg py-4 px-3 flex items-center justify-between text-base">
                    <div>
                        <p class="font-semibold">300,000 FCFA</p>
                        <h3 class="text-red-700 font-semibold">Annual Fee</h3>
                    </div>

                    <div>
                        <i class="ri-wallet-3-line bg-red-100 py-2 px-3 rounded-lg text-red-700"></i>
                    </div>
                </div>
            
            </div>

            <div class="bg-white py-5 px-8 rounded-lg my-8 shadow">
                <h4 class="text-xl uppercase tracking-wider font-semibold">Transactions</h4>
                <div id="transactionChart"></div>
            </div>


        </div>
    </div>
</x-app-layout>
