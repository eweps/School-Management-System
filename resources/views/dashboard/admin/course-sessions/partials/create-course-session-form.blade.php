<section>

    <form method="post" action="{{ route('admin.course-sessions.store') }}" class="mt-6 space-y-6">
        @csrf
        
        <div>
            <x-input-label for="name" :value="__('Name *')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div class="">
            <div class="w-full">
                <x-input-label for="description" :value="__('Description *')" />
                <x-textarea id="description" name="description" class="mt-1 block w-full">{{ old('description') }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
            <div class="w-full">
                <x-input-label for="start_time" :value="__('Start time *')" />
                <x-text-input id="name" name="start_time" type="time" class="mt-1 block w-full" :value="old('start_time')" required autofocus />
                <x-input-error class="mt-2" :messages="$errors->get('start_time')" />
            </div>

              <div class="w-full">
                 <x-input-label for="end_time" :value="__('End Time *')" />
                 <x-text-input id="name" name="end_time" type="time" class="mt-1 block w-full" :value="old('end_time')" required autofocus />
                 <x-input-error class="mt-2" :messages="$errors->get('end_time')" />
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>

            @if (session('status') === 'course-session-created')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>