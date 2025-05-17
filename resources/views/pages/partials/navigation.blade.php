<div class="container mx-auto lg:flex lg:items-center lg:justify-between lg:gap-3 text-center">
    <a href="{{ route('home') }}" class="block w-48 flex-shrink-0 mx-auto mb-8 lg:mb-0">
        <img class="w-full" src="{{ asset('images/logo.png') }}" alt="Logo">
    </a>

    <nav class="w-full flex items-center justify-center gap-5 mb-8 lg:mb-0">
        <a class="text-neutral-600 dark:text-neutral-200 dark:hover:text-secondary-dark hover:text-primary-dark font-semibold flex-shrink-0 {{ request()->routeIs('home') ? "text-primary dark:text-secondary" : '' }}" href="{{ route('home') }}">Home</a>
        <a class="text-neutral-600 dark:text-neutral-200 dark:hover:text-secondary-dark hover:text-primary-dark font-semibold flex-shrink-0" href="#">About Us</a>
        <a class="text-neutral-600 dark:text-neutral-200 dark:hover:text-secondary-dark hover:text-primary-dark font-semibold flex-shrink-0" href="#">Features</a>
    </nav>

    <a href="{{ route('apply') }}" class="bg-primary hover:bg-primary-dark transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Apply Now</a>

   @guest
    <a href="{{ route('login') }}" class="bg-secondary hover:bg-secondary-dark transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Login</a>
   @endguest

   @auth
    <a href="{{ route('admin.dashboard') }}" class="bg-secondary hover:bg-secondary-dark transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Dashboard</a>
   @endauth
</div>

<hr class="dark:border-neutral-700 mt-5" />