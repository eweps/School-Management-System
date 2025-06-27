   <!-- Navitem with link -->
        <li class="nav-item group {{ request()->routeIs('notifications') ? 'active' : '' }}">
            <a href="{{ route('notifications') }}"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
                <i class="ri-notification-line"></i>
                <span>Notifications</span>
                @if(auth()->user()->unReadNotifications()->count() > 0)
                    <span class="flex items-center relative ml-auto">
                        <span class="relative inline-flex h-2.5 w-2.5 animate-ping rounded-full bg-sky-400 opacity-75"></span>
                        <span class="absolute inline-flex h-2.5 w-2.5 size-3 rounded-full bg-sky-500"></span>
                    </span>
                @endif
            </a>
        </li>

        <!-- Navitem with sub items -->
        <li class="nav-dropdown group {{ request()->routeIs('profile.edit') || request()->routeIs('admin.settings.system') ? 'active' : '' }}">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
                <i class="ri-settings-4-line"></i>
                <span>Settings</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>

            <ul class="dropdown pl-7 mt-2 {{ request()->routeIs('profile.edit') || request()->routeIs('admin.settings.system') ? '' : 'hidden' }}">
                <li class="mb-4 group/item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <a href="{{ route('profile.edit') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        Profile</a>
                </li>

                @if(auth()->user()->hasRole('admin'))

                <li class="mb-4 group/item {{ request()->routeIs('admin.settings.system') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.system') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        System</a>
                </li>

                @endif
            </ul>
        </li>
