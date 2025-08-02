<section>

    <form method="post" action="{{ route('admin.courses.store') }}" class="mt-6 space-y-6">
        @csrf
        
        <div>
            <x-input-label for="name" :value="__('Name *')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>


        <div>
            <x-input-label for="code" :value="__('Course Code *')" />
            <x-text-input id="code" name="code" type="text" class="mt-1 block w-full" :value="old('code')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('code')" />
        </div>


        <div>
            <x-input-label for="credit" :value="__('Credit Value *')" />
            <x-text-input id="credit" name="credit" type="number" class="mt-1 block w-full" :value="old('credit')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('credit')" />
        </div>


        <div class="">
            <div class="w-full">
                <x-input-label for="description" :value="__('Description *')" />
                <x-textarea id="description" name="description" class="mt-1 block w-full">{{ old('description') }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

        </div>

         <div>
            <x-input-label for="semester" :value="__('Semester *')" />
            <x-select-input id="semester" name="semester" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Semester') }}</option>
                
                @isset($semesters)
                    @foreach ($semesters as $semester )
                         <option value="{{ $semester->id }}">{{ __($semester->name) }}</option>
                    @endforeach
                @endisset

            </x-select-input>
             <x-input-error class="mt-2" :messages="$errors->get('semester')" />
        </div>

        <div>
            <x-input-label for="level" :value="__('Select a Level *')" />
            <x-select-input id="level" name="level" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Level') }}</option>

                @isset($levels)
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}" {{ old('level') === $level->id ? 'selected' : '' }}>
                            {{ __($level->name) }}</option>
                    @endforeach
                @endisset

            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('level')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>

            @if (session('status') === 'course-created')
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