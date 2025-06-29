<!-- Navitem with link -->
<li class="nav-item group {{ request()->routeIs('teacher.dashboard') ? 'active' : '' }}">
    <a href="{{ route('teacher.dashboard') }}"
        class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
        <i class="ri-home-2-line"></i>
        <span>Dashboard</span>
    </a>
</li>


<!-- Navitem with link -->
<li class="nav-item group {{ request()->routeIs('teacher.course') ? 'active' : '' }}">
    <a href="{{ route('teacher.course') }}"
        class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
        <i class="ri-file-list-line"></i>
        <span>Courses</span>
    </a>
</li>


<!-- Navitem with sub items -->
<li class="nav-dropdown group {{ request()->routeIs('admin.semesters*') ? 'active' : '' }}">
    <a href="#"
        class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
        <i class="ri-book-2-line"></i>
        <span>Resources</span>
        <i class="ri-arrow-right-s-line ml-auto group-[.selected]:rotate-90"></i>
    </a>
    <ul class="dropdown pl-7 mt-2 {{ request()->routeIs('admin.semesters*') ? '' : 'hidden' }}">
        <li class="mb-4 group/item {{ request()->routeIs('admin.semesters') ? 'active' : '' }}">
            <a href="{{ route('admin.semesters') }}"
                class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                All Resources</a>
        </li>
        <li class="mb-4 group/item {{ request()->routeIs('admin.semesters.create') ? 'active' : '' }}">
            <a href="{{ route('admin.semesters.create') }}"
                class="text-gray-300 text-base flex items-center hover:text-gray-100 before:contents-[''] before:w-1 before:h-1 before:rounded-full before:bg-gray-300 before:mr-3 group-[.active]/item:text-primary-lightest group-[.active]/item:font-bold">
                Add Resource</a>
        </li>

    </ul>
</li>
