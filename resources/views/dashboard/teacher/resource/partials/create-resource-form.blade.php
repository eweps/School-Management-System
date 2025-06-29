<section>

    <form method="post" action="{{ route('teacher.resources.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
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

        <input type="hidden" name="teacher" value="{{ auth()->user()->teacher->id }}" />

         <div>
            <x-input-label for="course" :value="__('Course *')" />
            <x-select-input id="course" name="course" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Course') }}</option>
                
                @isset($courses)
                    @foreach ($courses as $course )
                         <option value="{{ $course->id }}">{{ __($course->name) }}</option>
                    @endforeach
                @endisset

            </x-select-input>
             <x-input-error class="mt-2" :messages="$errors->get('course')" />
        </div>



        <div class="">
            <div class="w-full">
                <x-input-label for="learningResource" :value="__('Upload Document *')" />
                <x-upload-input class="mt-1 block w-full" for="learningResource" />
                <x-input-error class="mt-2" :messages="$errors->get('learningResource')" />
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>

            @if (session('status') === 'diploma-created')
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