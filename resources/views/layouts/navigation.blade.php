<nav class="nav py-2 px-8 bg-primary flex items-center justify-between border-b border-b-neutral-100 sticky top-0 z-20 shrink-0 h-20 sm:h-auto">
    <div class="nav-left">

        <button id="sidebarToggle" data-sidebar-state="open" class="bg-primary-light text-white rounded-lg px-3 py-2 me-2">
            <i class="ri-menu-line" class="text-4xl"></i>
        </button>

        <a href="#">
            <span class="uppercase tracking-wider font-semibold text-white text-2xl">
                <x-application-logo class="w-32 inline-block" />
            </span>
        </a>
    </div>

    <div class="nav-right flex items-center gap-3">

        <a href="#">
            <i class="ri-notification-line text-white text-2xl"></i>
            <span class="sr-only">Notification</span>
        </a>


          <!-- Settings Dropdown -->
          <div class="hidden sm:flex sm:items-center sm:ms-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                   
                    <button type="button"
                    class="flex items-center gap-3 border border-neutral-100 py-2 px-3 rounded-lg text-white">
                        <img src="https://placehold.co/600x600" class="w-8 h-8 rounded-full object-cover" alt="profile image" />
                
                        <span>{{ Auth::user()->name }}</span>
                
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                            <path
                                d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                        </svg>
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
