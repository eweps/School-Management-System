<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('System Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update the systems settings") }}
        </p>
    </header>

    <form method="post" action="{{ route('admin.settings.system.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        @isset($settings)

        @foreach($settings as $setting)

        @if($setting->type === 'text')

        <div>
            <x-input-label for="{{ $setting->name }}" class="cursor-pointer" :value="__(strtoupper(str_replace('_',' ', $setting->name)))" />
            <x-text-input id="{{ $setting->name }}" name="{{ $setting->name }}" type="text" class="mt-1 block w-full" :value="old($setting->name, $setting->value)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get($setting->name)" />
        </div>


        @elseif($setting->type === 'int')

        <div>
            <x-input-label for="{{ $setting->name }}" class="cursor-pointer" :value="__(strtoupper(str_replace('_',' ', $setting->name)))" />
            <x-text-input id="{{ $setting->name }}" name="{{ $setting->name }}" type="number" class="mt-1 block w-full" :value="old($setting->name, $setting->value)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get($setting->name)" />
        </div>

        @elseif($setting->type === 'boolean')

        <div>
            <x-input-label for="{{ $setting->name }}" class="cursor-pointer" :value="__(strtoupper(str_replace('_',' ', $setting->name)))" />
            <x-select-input id="{{ $setting->name }}" name="{{ $setting->name }}" class="mt-1 block w-full">
                <option class="{{ $setting->value === NULL ? '' : 'hidden' }}" {{ $setting->value === NULL ? 'selected disabled': '' }}>Select a Value</option>
                <option value="1" {{ $setting->value === '1' ? 'selected' : '' }}>True</option>
                <option value="0" {{ $setting->value === '0' ? 'selected' : '' }}>False</option>
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get($setting->name)" />
        </div>

        @elseif($setting->type === 'image')

        <div>
            <div class="w-full">
                <x-input-label for="{{ $setting->name }}" :value="__('UPLOAD ' . strtoupper(str_replace('_',' ', $setting->name)) . ' (jpg,png) max: 3MB *')" />
                <x-upload-input class="mt-1 block w-full" for="{{ $setting->name }}" accept=".jpg,.png" />
                <x-input-error class="mt-2" :messages="$errors->get($setting->name)" />
            </div>


        </div>

        <div>
            <h3 class="block font-medium text-sm text-gray-700 dark:text-gray-300 uppercase">Current {{ strtoupper(str_replace('_',' ', $setting->name)) }}</h3>
            <div class="w-[100%] bg-neutral-300 overflow-hidden h-[150px] flex items-center justify-center rounded-lg border-primary-dark">
                @if(!empty($setting->value))
                <img id="letterHeadPreview" src="{{ asset('storage/'.$setting->value) }}" class="w-full" alt="Letter Head Image" />
                @else
                <img id="letterHeadPreview" src="{{ asset('images/no-image.png') }}" class="w-full" alt="No Image Found" />
                @endif
            </div>
        </div>

        @endif


        @endforeach

        @endisset

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'settings-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
