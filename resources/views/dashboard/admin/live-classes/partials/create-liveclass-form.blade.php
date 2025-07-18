<section>

    <form method="post" action="{{ route('admin.liveclasses.store') }}" class="mt-6 space-y-6">
        @csrf
        
        <div>
            <x-input-label for="title" :value="__('Title *')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>



        <div class="">
            <div class="w-full">
                <x-input-label for="description" :value="__('Description *')" />
                <x-textarea id="description" name="description" class="mt-1 block w-full">{{ old('description') }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

        </div>


        <div>
            <x-input-label for="link" :value="__('Link *')" />
            <x-text-input id="link" name="link" type="url" class="mt-1 block w-full" :value="old('link')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('link')" />
        </div>

        <div>
            <x-input-label for="date" :value="__('Date *')" />
            <x-text-input id="date" name="date" type="date" class="mt-1 block w-full" :value="old('date')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('date')" />
        </div>


        <div>
            <x-input-label for="start_time" :value="__('Start time *')" />
            <x-text-input id="start_time" name="start_time" type="time" class="mt-1 block w-full" :value="old('start_time')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('start_time')" />
        </div>
        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>

            @if (session('status') === 'liveclass-created')
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