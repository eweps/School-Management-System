<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-[1550px] mx-auto sm:px-6 lg:px-8">
            
            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-xl">Dashboard / <a href="{{ route('admin.diplomas') }}" class="text-secondary">Create Diplomas</a></h1>
            </header>

            <div class="w-full max-w-lg">
                @include("dashboard.admin.diplomas.partials.create-diploma-form")
            </div>


        </div>
    </div>
</x-app-layout>
