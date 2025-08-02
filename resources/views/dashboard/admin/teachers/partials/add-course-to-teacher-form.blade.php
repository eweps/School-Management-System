<section>

    <form method="post" action="{{ route('admin.teachers.courses.store') }}" class="mt-6 space-y-6">
        @csrf
        
        <div>
            <x-input-label for="name" :value="__('Teacher *')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $teacher->user->name)" required autofocus autocomplete="name" disabled readonly />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <input type="hidden" name="teacher" value="{{ $teacher->id }}" />

         <div>
            <x-input-label for="course" :value="__('Course *')" />
            <x-select-input id="course" name="course" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Course') }}</option>
                
                @isset($courses)
                    @foreach ($courses as $course )
                         <option value="{{ $course->id }}">{{ __($course->name) }} -- {{ $course->level?->name }}</option>
                    @endforeach
                @endisset

            </x-select-input>
             <x-input-error class="mt-2" :messages="$errors->get('course')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Add to Teacher') }}</x-primary-button>

            @if (session('status') === 'course-added')
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