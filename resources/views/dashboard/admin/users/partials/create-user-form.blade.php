<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('User Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Fill in the users account informations") }} <span class="text-red-700 dark:text-red-500">(You cannot change the user role after creating!)</span>
        </p>
    </header> 

    <form method="post" action="{{ route('admin.users.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="email" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="role" :value="__('Role')" />
            <x-select-input id="role" name="role" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a role') }}</option>
                <option value="admin">Admin</option>
                <option value="teacher">Teacher</option>
            </x-select-input>
             <x-input-error class="mt-2" :messages="$errors->get('role')" />
        </div>

          <div>
            <x-input-label for="gender" :value="__('Gender')" />
            <x-select-input id="gender" name="gender" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a gender') }}</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </x-select-input>
             <x-input-error class="mt-2" :messages="$errors->get('gender')" />
        </div>
        
        <div>
            <x-input-label for="update_password_password" :value="__('New Password')" />
            <x-text-input id="update_password_password" name="password" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'user-created')
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
