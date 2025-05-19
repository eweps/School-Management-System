<section>

    @if (session('status') === 'application-successful')
            <div
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="w-full bg-green-500 text-white py-2 px-3 my-3 text-center rounded-lg"
            >{{ __('Application Submitted Successfully.') }}</div>
    @endif

    <form method="post" action="{{ route('apply.store') }}" class="mt-6 space-y-6">
        @csrf
        <div>
            <h4 class="block font-medium text-sm text-gray-700 dark:text-gray-300">Salutation *</h4>

            <div class="radio-group flex items-center gap-x-3 flex-wrap">
                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="miss" value="miss" {{ old('salutation') == 'miss' ? 'checked' : '' }}>
                    <x-input-label for="miss" class="inline-block cursor-pointer" :value="__('Miss')"/>
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="mr" value="mr" {{ old('salutation') == 'mr' ? 'checked' : '' }}>
                    <x-input-label for="mr" class="inline-block cursor-pointer" :value="__('Mr')"/>    
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="mrs" value="mrs" {{ old('salutation') == 'mrs' ? 'checked' : '' }}>
                    <x-input-label for="mrs" class="inline-block cursor-pointer" :value="__('Mrs')"/>    
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="dr" value="dr" {{ old('salutation') == 'dr' ? 'checked' : '' }}>
                    <x-input-label for="dr" class="inline-block cursor-pointer" :value="__('Dr')"/>    
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="prof" value="prof" {{ old('salutation') == 'prof' ? 'checked' : '' }}>
                    <x-input-label for="prof" class="inline-block cursor-pointer" :value="__('Prof')"/>    
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="chief" value="chief" {{ old('salutation') == 'chief' ? 'checked' : '' }}>
                    <x-input-label for="chief" class="inline-block cursor-pointer" :value="__('Chief')"/>    
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="engr" value="engr" {{ old('salutation') == 'engr' ? 'checked' : '' }}>
                    <x-input-label for="engr" class="inline-block cursor-pointer" :value="__('Engr')"/>    
                </div>

            </div>

            <x-input-error class="mt-2" :messages="$errors->get('salutation')" />
            
        </div>
        
     
        <div>
            <x-input-label for="name" :value="__('Name (As on Birth Certificate)*')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="idCardNumber" :value="__('ID Card Number*')" />
            <x-text-input id="idCardNumber" name="idCardNumber" type="text" class="mt-1 block w-full" :value="old('idCardNumber')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('idCardNumber')" />
        </div>

        <div class="flex items-center flex-col lg:flex-row gap-3">
            <div class="w-full lg:basis-2/3">
                <x-input-label for="email" :value="__('Email*')" />
                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email')" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>

            <div class="w-full lg:basis-1/3">
                <x-input-label for="phone" :value="__('Telephone Number*')" />
                <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone')" />
                <x-input-error class="mt-2" :messages="$errors->get('phone')" />
            </div>
        </div>

        <div>
            <x-input-label for="address" :value="__('Current Address*')" />
           <x-textarea id="address" name="address" class="mt-1 block w-full">{{ old('address') }}</x-textarea>
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div class="flex flex-col gap-y-8 lg:gap-y-0 lg:flex-row lg:items-center lg:justify-start gap-x-32">
            <div>
                <h4 class="block font-medium text-sm text-gray-700 dark:text-gray-300">Preferred Language *</h4>
                <div class="radio-group flex items-center gap-x-3 flex-wrap">
                    <div class="item flex-shrink-0">
                        <input type="radio" name="preferredLanguage" id="english" value="english" {{ old('preferredLanguage') == 'english' ? 'checked' : '' }}>
                        <x-input-label for="english" class="inline-block cursor-pointer" :value="__('English')"/>
                    </div>
        
                    <div class="item flex-shrink-0">
                        <input type="radio" name="preferredLanguage" id="french" value="french" {{ old('preferredLanguage') == 'french' ? 'checked' : '' }}>
                        <x-input-label for="french" class="inline-block cursor-pointer" :value="__('French')"/>    
                    </div>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('preferredLanguage')" />
            </div>

            <div>
                <h4 class="block font-medium text-sm text-gray-700 dark:text-gray-300">Sex *</h4>
                <div class="radio-group flex items-center gap-x-3 flex-wrap">
                    <div class="item flex-shrink-0">
                        <input type="radio" name="gender" id="male" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}>
                        <x-input-label for="male" class="inline-block cursor-pointer" :value="__('Male')"/>
                    </div>
        
                    <div class="item flex-shrink-0">
                        <input type="radio" name="gender" id="female" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}>
                        <x-input-label for="female" class="inline-block cursor-pointer" :value="__('Female')"/>    
                    </div>
                </div>

                <x-input-error class="mt-2" :messages="$errors->get('gender')" />
            </div>
        </div>


        <div>
            <h4 class="block font-medium text-sm text-gray-700 dark:text-gray-300">Marital Status *</h4>

            <div class="radio-group flex items-center gap-x-3 flex-wrap">
                <div class="item flex-shrink-0">
                    <input type="radio" name="maritalStatus" id="single" value="single" {{ old('maritalStatus') == 'single' ? 'checked' : '' }}>
                    <x-input-label for="single" class="inline-block cursor-pointer" :value="__('Single')"/>
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="maritalStatus" id="married" value="married" {{ old('maritalStatus') == 'married' ? 'checked' : '' }}>
                    <x-input-label for="married" class="inline-block cursor-pointer" :value="__('Married')"/>    
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="maritalStatus" id="divorced" value="divorced" {{ old('maritalStatus') == 'divorced' ? 'checked' : '' }}>
                    <x-input-label for="divorced" class="inline-block cursor-pointer" :value="__('Divorced')"/>    
                </div>


            </div>

            <x-input-error class="mt-2" :messages="$errors->get('maritalStatus')" />
            
        </div>

        <div class="flex items-center flex-col lg:flex-row gap-3">
            <div class="w-full">
                <x-input-label for="dateOfBirth" :value="__('Date of Birth *')" />
                <x-text-input id="dateOfBirth" name="dateOfBirth" type="date" class="mt-1 block w-full" :value="old('dateOfBirth')" required />
                <x-input-error class="mt-2" :messages="$errors->get('dateOfBirth')" />
            </div>

            <div class="w-full">
                <x-input-label for="placeOfBirth" :value="__('Place of Birth*')" />
                <x-text-input id="placeOfBirth" name="placeOfBirth" type="text" class="mt-1 block w-full" :value="old('placeOfBirth')" />
                <x-input-error class="mt-2" :messages="$errors->get('placeOfBirth')" />
            </div>
        </div>


        <div class="flex items-center flex-col lg:flex-row gap-3">
            <div class="w-full">
                <x-input-label for="academicDiplomas" :value="__('Academic Diplomas')" />
                <x-textarea id="academicDiplomas" name="academicDiplomas" class="mt-1 block w-full">{{ old('academicDiplomas') }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('academicDiplomas')" />
            </div>

            <div class="w-full">
                <x-input-label for="professionalDiplomas" :value="__('Professional Diplomas')" />
                <x-textarea id="professionalDiplomas" name="professionalDiplomas" class="mt-1 block w-full">{{ old('professionalDiplomas') }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('professionalDiplomas')" />
            </div>
        </div>

        <div class="flex items-center flex-col lg:flex-row gap-3">
            <div class="w-full">
                <x-input-label for="professionalExperience" :value="__('Professional Experience')" />
                <x-textarea id="professionalExperience" name="professionalExperience" class="mt-1 block w-full">{{ old('professionalExperience') }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('professionalExperience')" />
            </div>

            <div class="w-full">
                <x-input-label for="otherRelevantInformation" :value="__('Other Relevant Information')" />
                <x-textarea id="otherRelevantInformation" name="otherRelevantInformation" class="mt-1 block w-full">{{ old('otherRelevantInformation') }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('otherRelevantInformation')" />
            </div>
        </div>


        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Program Selection') }}
        </h2>
        

        <div>
            <h4 class="block font-medium text-sm text-gray-700 dark:text-gray-300">Preferred Session *</h4>

            <div class="radio-group flex items-center gap-x-3 flex-wrap">

                @isset($courseSessions)

                    @foreach ($courseSessions as $courseSession)
                        <div class="item flex-shrink-0">
                            <input type="radio" name="preferredSession" id="csession{{ $courseSession->id }}" value="{{ $courseSession->id }}" {{ old('preferredSession') == $courseSession->id ? 'checked' : '' }}>
                            <x-input-label for="csession{{ $courseSession->id }}" class="inline-block cursor-pointer" :value="__($courseSession->description)"/>
                        </div>
                    @endforeach

                @endisset

            </div>

            <x-input-error class="mt-2" :messages="$errors->get('maritalStatus')" />
            
        </div>


        <div>
            <h4 class="block font-medium text-sm text-gray-700 dark:text-gray-300">Type of Diploma *</h4>

            <div class="radio-group flex items-center gap-x-3 flex-wrap">

                @isset($diplomas)
                    @foreach ($diplomas as $diploma )
                        <div class="item flex-shrink-0">
                            <input type="radio" name="diploma" id="diploma{{ $diploma->id }}" value="{{ $diploma->id }}" {{ old('diploma') == $diploma->id ? 'checked' : '' }}>
                            <x-input-label for="diploma{{ $diploma->id }}" class="inline-block cursor-pointer" :value="__($diploma->name)"/>
                        </div>
                    @endforeach
                @endisset

            </div>

            <x-input-error class="mt-2" :messages="$errors->get('maritalStatus')" />
            
        </div>

        <input type="hidden" name="timezone" id="timezone" />

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Submit Your Application') }}</x-primary-button>
        </div>
    </form>
</section>
