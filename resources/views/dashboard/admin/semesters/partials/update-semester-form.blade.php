<section>

    <form method="post" action="{{ route('admin.semesters.update', $semester->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
        <div>
            <x-input-label for="name" :value="__('Name *')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $semester->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="">
            <div class="w-full">
                <x-input-label for="description" :value="__('Description *')" />
                <x-textarea id="description" name="description" class="mt-1 block w-full">{{ old('description', $semester->description) }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            @if (session('status') === 'semester-updated')
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