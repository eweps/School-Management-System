<section>

    <form method="post" action="{{ route('admin.fees.store') }}" class="mt-6 space-y-6">
        @csrf
        
        <div>
            <x-input-label for="title" :value="__('Title *')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus autocomplete="title" />
            <x-input-error class="mt-2" :messages="$errors->get('title')" />
        </div>


        <div>
            <x-input-label for="amount" :value="__('Amount (XAF) *')" />
            <x-text-input id="amount" name="amount" type="number" class="mt-1 block w-full" :value="old('amount')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('amount')" />
        </div>


        <div>
            <x-input-label for="department" :value="__('Department *')" />
            <x-select-input id="department" name="department" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Department') }}</option>
                
                @isset($departments)
                    @foreach ($departments as $department )
                         <option value="{{ $department->id }}">{{ __($department->name) }}</option>
                    @endforeach
                @endisset

            </x-select-input>
             <x-input-error class="mt-2" :messages="$errors->get('department')" />
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>

            @if (session('status') === 'fee-created')
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