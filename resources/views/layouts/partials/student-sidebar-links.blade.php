<!-- Navitem with link -->
<li class="nav-item group {{ request()->routeIs('student.dashboard') ? 'active' : '' }}">
    <a href="{{ route('student.dashboard') }}"
        class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
        <i class="ri-home-2-line"></i>
        <span>Dashboard</span>
    </a>
</li>


<!-- Navitem with link -->
<li class="nav-item group {{ request()->routeIs('student.fee-records*') ? 'active' : '' }}">
    <a href="{{ route('student.fee-records') }}"
        class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
        <i class="ri-article-line"></i>
        <span>Fee Records</span>
    </a>
</li>

<!-- Navitem with link -->
<li class="nav-item group {{ request()->routeIs('student.courses') ? 'active' : '' }}">
    <a href="{{ route('student.courses') }}"
        class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
        <i class="ri-file-list-line"></i>
        <span>Courses</span>
    </a>
</li>

<!-- Navitem with link -->
<li class="nav-item group {{ request()->routeIs('student.ca-results') ? 'active' : '' }}">
    <a href="{{ route('student.ca-results') }}"
        class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
        <i class="ri-file-list-line"></i>
        <span>CA Results</span>
    </a>
</li>

<!-- Navitem with link -->
<li class="nav-item group {{ request()->routeIs('student.exam-results') ? 'active' : '' }}">
    <a href="{{ route('student.exam-results') }}"
        class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
        <i class="ri-file-list-line"></i>
        <span>Exam Results</span>
    </a>
</li>

<!-- Navitem with link -->
<li class="nav-item group {{ request()->routeIs('student.resources') ? 'active' : '' }}">
    <a href="{{ route('student.resources') }}"
        class="text-gray-300 hover:text-white flex items-center gap-3 text-base font-medium py-2 px-3 rounded-lg group-[.active]:bg-primary-light dark:group-[.active]:bg-gray-700 group-[.active]:text-white group-[.selected]:bg-primary-light dark:group-[.selected]:bg-gray-700 group-[.selected]:text-gray-100 hover:bg-primary-lighter dark:hover:bg-gray-700">
        <i class="ri-book-2-line"></i>
        <span>Resources</span>
    </a>
</li>
