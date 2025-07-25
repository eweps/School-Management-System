<nav class="nav py-2 px-8 bg-primary flex items-center justify-between sticky top-0 z-20 shrink-0 h-20 sm:h-auto">
    <div class="nav-left">

        <button id="sidebarToggle" data-sidebar-state="open" class="bg-primary-light text-white rounded-lg px-3 py-2 me-2">
            <i class="ri-menu-line" class="text-4xl"></i>
        </button>

        @if (auth()->user()->hasRole('admin'))
            <a href="{{ route('admin.dashboard') }}">
                <span class="uppercase tracking-wider font-semibold text-white text-2xl">
                    <x-application-logo class="w-32 inline-block" />
                </span>
            </a>
        @endif


        @if (auth()->user()->hasRole('teacher'))
            <a href="{{ route('teacher.dashboard') }}">
                <span class="uppercase tracking-wider font-semibold text-white text-2xl">
                    <x-application-logo class="w-32 inline-block" />
                </span>
            </a>
        @endif


    </div>

    <div class="nav-right flex items-center gap-3">

        <a href="{{ route('notifications') }}" class="transition-transform delay-150 ease-in-out hover:scale-110 relative flex">
            @if(auth()->user()->unReadNotifications()->count() > 0)
                 <span class="absolute inline-flex h-2.5 w-2.5  top-1 left-4 animate-ping rounded-full bg-sky-400 opacity-75"></span>
                <span class="relative inline-flex h-2 w-2  top-1 left-4 size-3 rounded-full bg-sky-500"></span>
            @endif
            <i class="ri-notification-line text-white text-lg"></i>
            <span class="sr-only">Notification</span>
        </a>


        <!-- Settings Dropdown -->
        <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">

                    <button type="button" class="flex items-center gap-3 rounded-lg text-white text-sm">
                        <img src="https://placehold.co/600x600" class="w-7 h-7 rounded-full object-cover"
                            alt="profile image" />

                        <span>{{ Auth::user()->name }}</span>
                        <i class="ri-arrow-down-s-line text-xl"></i>
                    </button>

                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>

    </div>
</nav>
