<aside id="sidebar"
    class="sidebar-scrollbar min-h-screen w-60 bg-primary-dark dark:bg-gray-950/60 backdrop-blur-md text-white px-5 py-8 overflow-y-auto scrollbar h-[100%] transition-[width] duration-300 ease-in-out fixed top-[80px] sm:top-[55px] left-0 contain-content">
    <ul id="sidebar-nav" class="block mb-20 space-y-1">
       
        @if(auth()->user()->hasRole('admin'))
            @include('layouts.partials.admin-sidebar-links')
        @endif
        
        @if(auth()->user()->hasRole('teacher'))
            @include('layouts.partials.teacher-sidebar-links')
        @endif

        @if(auth()->user()->hasRole('student'))
            @include('layouts.partials.student-sidebar-links')
        @endif

        @include('layouts.partials.user-sidebar-links')

    </ul>
</aside>
