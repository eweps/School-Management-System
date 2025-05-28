<section>

    <form method="post" action="{{ route('admin.courses.update', $course->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
        <div>
            <x-input-label for="name" :value="__('Name *')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $course->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

         <div>
            <x-input-label for="code" :value="__('Course Code *')" />
            <x-text-input id="code" name="code" type="text" class="mt-1 block w-full" :value="old('code', $course->code)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('code')" />
        </div>


        <div>
            <x-input-label for="credit" :value="__('Credit Value *')" />
            <x-text-input id="credit" name="credit" type="number" class="mt-1 block w-full" :value="old('credit', $course->credit_value)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('credit')" />
        </div>


        <div class="">
            <div class="w-full">
                <x-input-label for="description" :value="__('Description *')" />
                <x-textarea id="description" name="description" class="mt-1 block w-full">{{ old('description', $course->description) }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

        </div>
        
         <div>
            <x-input-label for="semester" :value="__('Semester *')" />
            <x-select-input id="semester" name="semester" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Semester') }}</option>
                
                @isset($semesters)
                    @foreach ($semesters as $semester )
                         <option value="{{ $semester->id }}" {{ $course->semester->id === $semester->id ? 'selected': '' }}>{{ __($semester->name) }}</option>
                    @endforeach
                @endisset

            </x-select-input>
             <x-input-error class="mt-2" :messages="$errors->get('semester')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            @if (session('status') === 'course-updated')
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