<aside id="sidebar"
    class="min-h-screen w-72 bg-primary-dark text-white px-5 py-8 overflow-y-auto h-full transition-all duration-300 ease-in-out fixed top-[68px] left-0">
    <ul id="sidebar-nav" class="mb-20 space-y-4">
        <!-- Navitem with link -->
        <li class="nav-item mb-2 group {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-lg font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light group-[.active]:text-white group-[.selected]:bg-primary-light group-[.selected]:text-gray-100 hover:bg-primary-lighter">
                <i class="ri-home-2-line"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <!-- Navitem with sub items -->
        <li class="nav-dropdown mb-2 group">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-lg font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light group-[.active]:text-white group-[.selected]:bg-primary-light group-[.selected]:text-gray-100 hover:bg-primary-lighter">
                <i class="ri-group-line"></i>
                <span>Teachers</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>

            <ul class="dropdown pl-7 mt-6 hidden">
                <li class="mb-4 group">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">All
                        Teachers</a>
                </li>

                <li class="mb-4 group">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">Add
                        Teacher</a>
                </li>
            </ul>
        </li>

        <!-- Navitem with sub items -->
        <li class="nav-dropdown mb-2 group">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-lg font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light group-[.active]:text-white group-[.selected]:bg-primary-light group-[.selected]:text-gray-100 hover:bg-primary-lighter">
                <i class="ri-graduation-cap-line"></i>
                <span>Students</span>
                <i class="ri-arrow-right-s-line ml-auto  group-[.selected]:rotate-90"></i>
            </a>

            <ul class="dropdown pl-7 mt-6 hidden">
                <li class="mb-4 group">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">All
                        Students</a>
                </li>

                <li class="mb-4 group">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">Registered</a>
                </li>

                <li class="mb-4 group">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">Add
                        Student</a>
                </li>
            </ul>
        </li>

        <!-- Navitem with sub items -->
        <li class="nav-dropdown mb-2 group">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-lg font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light group-[.active]:text-white group-[.selected]:bg-primary-light group-[.selected]:text-gray-100 hover:bg-primary-lighter">
                <i class="ri-admin-line"></i>
                <span>Administrators</span>
                <i class="ri-arrow-right-s-line ml-auto  group-[.selected]:rotate-90"></i>
            </a>

            <ul class="dropdown pl-7 mt-6 hidden">
                <li class="mb-4 group">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">All
                        Administrators</a>
                </li>

                <li class="mb-4 group">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">Add
                        Administrator</a>
                </li>
            </ul>
        </li>

        <!-- Navitem with sub items -->
        <li class="nav-dropdown mb-2 group">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-lg font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light group-[.active]:text-white group-[.selected]:bg-primary-light group-[.selected]:text-gray-100 hover:bg-primary-lighter">
                <i class="ri-community-line"></i>
                <span>Departments</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>

            <ul class="dropdown pl-7 mt-6 hidden">
                <li class="mb-4 group">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">All
                        Departments</a>
                </li>

                <li class="mb-4 group">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">Add
                        Department</a>
                </li>
            </ul>
        </li>


        <!-- Navitem with sub items -->
        <li class="nav-dropdown mb-2 group">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-lg font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light group-[.active]:text-white group-[.selected]:bg-primary-light group-[.selected]:text-gray-100 hover:bg-primary-lighter">
                <i class="ri-git-repository-line"></i>
                <span>Courses</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>

            <ul class="dropdown pl-7 mt-6 hidden">
                <li class="mb-4 group">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">All
                        Courses</a>
                </li>

                <li class="mb-4 group">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">Add
                        Course</a>
                </li>
            </ul>
        </li>

        <!-- Navitem with sub items -->
        <li class="nav-dropdown mb-2 group">
            <a href="#"
                class="text-gray-300 hover:text-white flex items-center gap-3 text-lg font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light group-[.active]:text-white group-[.selected]:bg-primary-light group-[.selected]:text-gray-100 hover:bg-primary-lighter">
                <i class="ri-instance-line"></i>
                <span>Settings</span>
                <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
            </a>

            <ul class="dropdown pl-7 mt-6 hidden">
                <li class="mb-4 group active">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">General
                        Settings</a>
                </li>

                <li class="mb-4 group">
                    <a href="#"
                        class="text-gray-300 text-lg flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]:text-primary-lightest group-[.active]:font-bold">Profile
                        Settings</a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
