<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Color Theme') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Change between the light, dark or system theme") }}
        </p>
    </header>

    <div class="mt-6 space-y-6">
         <div>
            <x-input-label for="theme" class="cursor-pointer" :value="__('Select theme')" />
            <x-select-input  id="theme" class="mt-1 block w-full cursor-pointer">
                <option value="system">System</option>
                <option value="light">Light</option>
                <option value="dark">Dark</option>
            </x-select-input>
        </div>
    </div>

</section>
