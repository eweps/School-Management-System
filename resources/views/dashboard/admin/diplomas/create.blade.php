<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-[1550px] mx-auto sm:px-6 lg:px-8">
            <header class="mb-8 dark:tex-white">
                    <h1 class="text-3xl">Dashboard / Add Departments</h1>
                </header>

                <div class="max-w-7xl space-y-6">
                  <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('dashboard.admin.diplomas.partials.create-diploma-form')

</div>
                </div>
</div>
            </div>
</div>
        
</x-app-layout>
