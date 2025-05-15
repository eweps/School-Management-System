<nav class="nav py-2 px-8 bg-primary dark:bg-gray-800 flex items-center justify-between sticky top-0 z-20 shrink-0 h-20 sm:h-auto border-b border-b-primary-lightest dark:border-b-gray-800">
    <div class="nav-left">

        <button id="sidebarToggle" data-sidebar-state="open" class="bg-primary-light dark:bg-slate-700 text-white rounded-lg px-3 py-2 me-2">
            <i class="ri-menu-line" class="text-4xl"></i>
        </button>

        <a href="{{ route('admin.dashboard') }}">
            <span class="uppercase tracking-wider font-semibold text-white text-2xl">
                <x-application-logo class="w-32 inline-block" />
            </span>
        </a>
    </div>

    <div class="nav-right flex items-center gap-3">

        <a href="#" class="transition-transform delay-150 ease-in-out hover:scale-110">
            <i class="ri-notification-line text-white text-lg"></i>
            <span class="sr-only">Notification</span>
        </a>


          <!-- Settings Dropdown -->
          <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                   
                    <button type="button"
                    class="flex items-center gap-3 rounded-lg text-white text-sm">
                        <img src="https://placehold.co/600x600" class="w-7 h-7 rounded-full object-cover" alt="profile image" />
                
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
