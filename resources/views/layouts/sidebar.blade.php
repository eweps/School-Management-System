<aside id="sidebar"
    class="min-h-screen w-60 bg-primary-dark dark:bg-gray-950 text-white px-5 py-8 overflow-y-auto h-full transition-all duration-300 ease-in-out fixed top-[80px] sm:top-[55px] left-0">
    <ul id="sidebar-nav" class="mb-20 space-y-2">

        <!-- Navitem with link -->
        <li class="nav-item group {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
                <i class="ri-home-2-line"></i>
                <span>Dashboard</span>
            </a>
        </li>
       
        
         <!-- Navitem with link -->
        <li class="nav-item group {{ request()->routeIs('admin.applications*') ? 'active' : '' }}">
            <a href="{{ route('admin.applications') }}"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
                <i class="ri-file-list-line"></i>
                <span>Applications</span>
            </a>
        </li>


        <!-- Navitem with sub items -->
        <li class="nav-dropdown group {{ request()->routeIs('admin.semesters*') ? 'active' : '' }}">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
                <i class="ri-calendar-schedule-line"></i>
                <span>Semesters</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="dropdown pl-7 mt-2 {{ request()->routeIs('admin.semesters*') ? '' : 'hidden' }}">
                <li class="mb-4 group/item {{ request()->routeIs('admin.semesters') ? 'active' : '' }}">
                    <a href="{{ route('admin.semesters') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        All Semesters</a>
                </li>
                <li class="mb-4 group/item {{ request()->routeIs('admin.semesters.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.semesters.create') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        Add Semester</a>
                </li>

            </ul>
        </li>


         <!-- Navitem with sub items -->
        <li class="nav-dropdown group {{ request()->routeIs('admin.levels*') ? 'active' : '' }}">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
                <i class="ri-stairs-line"></i>
                <span>Levels</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="dropdown pl-7 mt-2 {{ request()->routeIs('admin.levels*') ? '' : 'hidden' }}">
                <li class="mb-4 group/item {{ request()->routeIs('admin.levels') ? 'active' : '' }}">
                    <a href="{{ route('admin.levels') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        All Levels</a>
                </li>
                <li class="mb-4 group/item {{ request()->routeIs('admin.levels.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.levels.create') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        Add Level</a>
                </li>

            </ul>
        </li>

         <!-- Navitem with sub items -->
        <li class="nav-dropdown group {{ request()->routeIs('admin.course-sessions*') ? 'active' : '' }}">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
                <i class="ri-time-line"></i>
                <span>Sessions</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>
            <ul class="dropdown pl-7 mt-2 {{ request()->routeIs('admin.course-sessions*') ? '' : 'hidden' }}">
                <li class="mb-4 group/item {{ request()->routeIs('admin.course-sessions') ? 'active' : '' }}">
                    <a href="{{ route('admin.course-sessions') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        All Sessions</a>
                </li>
                <li class="mb-4 group/item {{ request()->routeIs('admin.course-sessions.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.course-sessions.create') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        Add Session</a>
                </li>

            </ul>
        </li>

    

        <!-- Navitem with sub items -->
        <li class="nav-dropdown group {{ request()->routeIs('admin.diplomas*') ? 'active' : '' }}">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
                <i class="ri-graduation-cap-line"></i>
                <span>Diplomas</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>

            <ul class="dropdown pl-7 mt-2 {{ request()->routeIs('admin.diplomas*') ? '' : 'hidden' }}">

                <li class="mb-4 group/item {{ request()->routeIs('admin.diplomas') ? 'active' : '' }}">
                    <a href="{{ route('admin.diplomas') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        All Diplomas</a>
                </li>

                <li class="mb-4 group/item {{ request()->routeIs('admin.diplomas.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.diplomas.create') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        Add Diploma</a>
                </li>

            </ul>
        </li>


        <!-- Navitem with sub items -->
        <li class="nav-dropdown group {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
                <i class="ri-group-line"></i>
                <span>Users</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>

            <ul class="dropdown pl-7 mt-2 {{ request()->routeIs('admin.users*') ? '' : 'hidden' }}">

                <li class="mb-4 group/item {{ request()->routeIs('admin.users') ? 'active' : '' }}">
                    <a href="{{ route('admin.users') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        All Users</a>
                </li>


                <li class="mb-4 group/item {{ request()->routeIs('admin.users.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.create') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        Add User</a>
                </li>

            </ul>
        </li>


         <!-- Navitem with link -->
        <li class="nav-item group {{ request()->routeIs('admin.activities') ? 'active' : '' }}">
            <a href="{{ route('admin.activities') }}"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
                <i class="ri-login-box-line"></i>
                <span>Activity</span>
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

                <li class="mb-4 group/item {{ request()->routeIs('admin.settings.system') ? 'active' : '' }}">
                    <a href="{{ route('admin.settings.system') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                        System</a>
                </li>
            </ul>
        </li>


    </ul>
</aside>
