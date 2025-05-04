<x-page-layout pageTitle="Home">


    <header class="w-full py-5 px-8 xl:px-0 mb-8">
        
       <div class="container mx-auto lg:flex lg:items-center lg:justify-between lg:gap-3 text-center">
            <a href="#" class="block w-32 lg:w-48 flex-shrink-0 mx-auto mb-8 lg:mb-0">
                <img class="w-full" src="{{ asset('images/logo.png') }}" alt="Logo">
            </a>

            <nav class="w-full flex items-center justify-center gap-5 mb-8 lg:mb-0">
                <a class="text-neutral-600 hover:text-primary font-semibold flex-shrink-0" href="#">Home</a>
                <a class="text-neutral-600 hover:text-primary font-semibold flex-shrink-0" href="#">About Us</a>
                <a class="text-neutral-600 hover:text-primary font-semibold flex-shrink-0" href="#">Features</a>
                <a class="text-neutral-600 hover:text-primary font-semibold flex-shrink-0" href="#">Contact</a>
            </nav>

            <a href="#" class="bg-primary hover:bg-primary-dark transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Apply Now</a>

           @guest
            <a href="{{ route('login') }}" class="bg-secondary hover:bg-secondary-dark transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Login</a>
           @endguest

           @auth
            <a href="{{ route('admin.dashboard') }}" class="bg-secondary hover:bg-secondary-dark transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Dashboard</a>
           @endauth
       </div>

    </header>

    <section class="w-full mb-10 px-8 xl:px-0">
        <div class="container mx-auto flex flex-col lg:flex-row text-center lg:text-start lg:items-center justify-between">

            <div class="basis-1/2 mb-8 lg:mb-0">
               <h1 class="text-3xl lg:text-4xl xl:text-5xl font-semibold leading-snug xl:leading-normal capitalize mb-8"> Organize students, staff <br /> and more all in one place</h1>
                
                <p class="text-neutral-600 mb-5"><strong>Schoolm</strong> is a management system that is committed to providing high quality features <br /> for the management of schools at their different assets</p>

                <p class="text-neutral-600 mb-8">If you're facing problems managing your school. Worry no more, because our system <br /> got you covered with all important features.</p>

                <div class="flex items-center justify-center lg:justify-start gap-3">
                    <a href="#" class="text-white bg-primary rounded-lg block w-fit py-2 px-3 hover:bg-primary-dark transition-all ease-in-out">Apply Now</a>

                    @guest
                     <a href="{{ route('login') }}" class="bg-secondary hover:bg-secondary-dark transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Login</a>
                    @endguest
        
                    @auth
                     <a href="{{ route('admin.dashboard') }}" class="bg-secondary hover:bg-secondary-dark transition-colors ease-in-out text-white py-2 px-3 rounded-lg w-fit flex-shrink-0">Dashboard</a>
                    @endauth
                </div>


            </div>

            <div class="basis-1/2">
                <img src="{{ asset('images/hero.png') }}" class="w-full cursor-pointer transition-all ease-in-out hover:scale-95" alt="The Hero Image" title="Need Help? No worries we can help you" />
            </div>

       </div>
    </section>

    <section class="w-full mx-auto bg-neutral-50 bg-rough backdrop:blur-xl border-y-2 py-10 px-8 xl:px-0">

        <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between gap-16">
            <img class="w-40 lg:w-1/6" src="{{ asset('images/laravel.png') }}" alt="Laravel Logo">
            <img class="w-40 lg:w-1/6" src="{{ asset('images/Mysql_logo.png') }}" alt="MySQL Logo">
            <img class="w-40 lg:w-[12%]" src="{{ asset('images/php.svg') }}" alt="PHP Logo">
            <img class="w-40 lg:w-1/6" src="{{ asset('images/tailwindcss.png') }}" alt="Tailwindcss Logo">
            <img class="w-40 lg:w-1/6" src="{{ asset('images/alpine.svg') }}" alt="Alpine JS Logo">
        </div>

   </section>

    

</x-page-layout>