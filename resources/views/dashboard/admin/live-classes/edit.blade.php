<x-app-layout  pageTitle="Edit Live Class">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('admin.liveclasses.edit', $liveClass->id) }}" class="text-secondary">Edit Live Class</a></h1>
            </header>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include("dashboard.admin.live-classes.partials.update-liveclass-form")
                </div>
            </div>
        </div>
    </div>

     
</x-app-layout>
