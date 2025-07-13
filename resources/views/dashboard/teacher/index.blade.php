<x-app-layout  pageTitle="Home">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <header class="mb-8 dark:text-neutral-200 uppercase tracking-wider font-semibold">
                <h1 class="text-base">Dashboard / <a href="{{ route('teacher.dashboard') }}" class="text-secondary">Analytics</a></h1>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

                 <x-stats class="text-amber-700 bg-amber-100 ri-book-2-line" heading="Learning resources" value="{{ $learningResources ?? 0 }}" />

                <x-stats class="text-blue-700 bg-blue-100 ri-folder-chart-2-line" heading="Total Courses" value="{{ $totalCourses ?? 0 }}" />

                <x-stats class="text-pink-700 bg-pink-100 ri-group-line" heading="Total Students" value="{{ $totalStudents ?? 0 }}" />

                <x-stats class="text-teal-700 bg-teal-100 ri-notification-line" heading="Unread Notifications" value="{{ $unreadNotifications ?? 0 }}" />
            
            </div>

            
            <div class="grid grid-cols-1 mt-16">
             
           </div>


        </div>
    </div>
</x-app-layout>
