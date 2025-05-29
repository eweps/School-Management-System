<section>

    <form method="post" action="{{ route('admin.diplomas.update', $diploma->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')
        
        <div>
            <x-input-label for="name" :value="__('Name *')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $diploma->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="">
            <div class="w-full">
                <x-input-label for="description" :value="__('Description *')" />
                <x-textarea id="description" name="description" class="mt-1 block w-full">{{ old('description', $diploma->description) }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>

        </div>

        <div>
            <x-input-label for="type" :value="__('Diploma Type *')" />
            <x-select-input id="type" name="type" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Diploma Type') }}</option>
                
                @isset($diplomaTypes)
                    @foreach ($diplomaTypes as $diplomaType )
                         <option value="{{ $diplomaType->id }}" {{ $diploma->diplomaType->id === $diplomaType->id ? 'selected' : '' }}>{{ __($diplomaType->name) }}</option>
                    @endforeach
                @endisset

            </x-select-input>
             <x-input-error class="mt-2" :messages="$errors->get('diplomaType')" />
        </div>


        
        <div>
            <x-input-label for="department" :value="__('Department *')" />
            <x-select-input id="department" name="department" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Department') }}</option>
                
                @isset($departments)
                    @foreach ($departments as $department )
                         <option value="{{ $department->id }}" {{ $diploma->department->id === $department->id ? 'selected' : '' }}>{{ __($department->name) }}</option>
                    @endforeach
                @endisset

            </x-select-input>
             <x-input-error class="mt-2" :messages="$errors->get('department')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            @if (session('status') === 'diploma-updated')
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