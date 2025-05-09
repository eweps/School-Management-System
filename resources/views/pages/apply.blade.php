<x-page-layout pageTitle="Apply">


    <header class="w-full py-5 px-8 xl:px-0 mb-8">
        @include('pages.partials.navigation')
    </header>

    
    <div class="max-w-3xl mx-auto px-8 xl:px-0 mb-20">

        <header class="text-center">
            <h1 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Apply') }}
            </h1>
    
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("Fill in the required fields below to apply.") }}
            </p>
        </header>
        
        @include('pages.partials.application-form')
    </div>
    

</x-page-layout>