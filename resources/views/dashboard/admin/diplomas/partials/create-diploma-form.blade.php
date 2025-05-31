<section>
    <form method="post" action="#" class="mt-6 space-y-6">
        @csrf
        @method('post')
        <div>
            <x-input-label for="name" :value="__('DiplomaName)')"/>
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"/> 
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
            </div>

            <div>
                <x-input-label for="description" :value="__('Description')"/>

                
                <x-textarea name="description" id="description" class="w-full"/>
                <x-input-error class="mt-2" :messages="$errors->get('description')"/>
                </div>

                <div class="flex item-center gap-4">
                    <x-primary-button>{{ __('save') }}</x-primary-button>
                        @if (session('status') === 'diploma-created')

                        <p
                        x-data="{show: true}"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(()=> show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('saved') }}</p>
                        @endif
                    </div>
</form>
</section>