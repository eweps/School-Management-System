<aside id="sidebar"
    class="min-h-screen w-60 bg-primary-dark text-white px-5 py-8 overflow-y-auto h-full transition-all duration-300 ease-in-out fixed top-[80px] sm:top-[55px] left-0">
    <ul id="sidebar-nav" class="mb-20 space-y-2">

        <!-- Navitem with link -->
        <li class="nav-item group {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light group-[.active]:text-white group-[.selected]:bg-primary-light group-[.selected]:text-gray-100 hover:bg-primary-lighter">
                <i class="ri-home-2-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

         <!-- Navitem with sub items -->
         <li class="nav-dropdown group {{ request()->routeIs('admin.departments*') ? 'active' : '' }}">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light group-[.active]:text-white group-[.selected]:bg-primary-light group-[.selected]:text-gray-100 hover:bg-primary-lighter">
                <i class="ri-group-line"></i>
                <span>Departments</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>

            <ul class="dropdown pl-7 mt-2 {{ request()->routeIs('admin.departments*') ? '' : 'hidden' }}">
                <li class="mb-4 group {{ request()->routeIs('admin.departments*') ? 'active' : '' }}">
                    <a href="{{ route('admin.departments') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">
                        All Departments</a>
                </li>
            </ul>
        </li>


        <!-- Navitem with sub items -->
        <li class="nav-dropdown group {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light group-[.active]:text-white group-[.selected]:bg-primary-light group-[.selected]:text-gray-100 hover:bg-primary-lighter">
                <i class="ri-group-line"></i>
                <span>Settings</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>

            <ul class="dropdown pl-7 mt-2 {{ request()->routeIs('profile.edit') ? '' : 'hidden' }}">
                <li class="mb-4 group {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <a href="{{ route('profile.edit') }}"
                        class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">
                        Profile</a>
                </li>
            </ul>
        </li>

   
    </ul>
</aside>
