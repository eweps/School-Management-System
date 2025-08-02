<section>

    <x-session-status key="student-updated" message="Student Updated Successfully" />
    <x-session-error />


    <form method="post" action="{{ route('admin.students.update', $student->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div>
            <x-input-label for="user" :value="__('Select User *')" />
            <x-select-input id="user" name="user" class="mt-1 block w-full">
                <option selected disabled hidden>{{ __('Select a User') }}</option>

                @isset($users)
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ old('user', $student->user->id) === $user->id ? 'selected' : '' }}>
                            {{ __($user->name) }}</option>
                    @endforeach
                @endisset

            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('user')" />
        </div>

        <div>
            <x-input-label for="courseSession" :value="__('Select Course Session *')" />
            <x-select-input id="courseSession" name="courseSession" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Course Session') }}</option>

                @isset($courseSessions)
                    @foreach ($courseSessions as $session)
                        <option value="{{ $session->id }}" {{ old('courseSession', $student->course_session_id) === $session->id ? 'selected' : '' }}>
                            {{ __($session->name) }}</option>
                    @endforeach
                @endisset

            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('courseSession')" />
        </div>

        <div>
            <x-input-label for="diploma" :value="__('Select a Diploma *')" />
            <x-select-input id="diploma" name="diploma" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Diploma') }}</option>

                @isset($diplomas)
                    @foreach ($diplomas as $diploma)
                        <option value="{{ $diploma->id }}" {{ old('diploma', $student->diploma_id) === $diploma->id ? 'selected' : '' }}>
                            {{ __($diploma->name) }}</option>
                    @endforeach
                @endisset

            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('diploma')" />
        </div>

        <div>
            <x-input-label for="department" :value="__('Select a Department (with courses) *')" />
            <x-select-input id="department" name="department" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Department') }}</option>

                @isset($departments)
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}" {{ old('department', $student->department_id) === $department->id ? 'selected' : '' }}>
                            {{ __($department->name) }}</option>
                    @endforeach
                @endisset

            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('department')" />
        </div>


        <div>
            <x-input-label for="level" :value="__('Select a Level *')" />
            <x-select-input id="level" name="level" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Level') }}</option>

                @isset($levels)
                    @foreach ($levels as $level)
                        <option value="{{ $level->id }}" {{ old('level', $student->level_id) === $level->id ? 'selected' : '' }}>
                            {{ __($level->name) }}</option>
                    @endforeach
                @endisset

            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('level')" />
        </div>


        <div>
            <x-input-label for="idCardNumber" :value="__('ID Card Number *')" />
            <x-text-input id="idCardNumber" name="idCardNumber" type="text" class="mt-1 block w-full"
                :value="old('idCardNumber', $student->id_card_number)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('idCardNumber')" />
        </div>


        <div>
            <x-input-label for="address" :value="__('Address *')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('name', $student->address)"
                required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

         <div>
            <h4 class="block font-medium text-sm text-gray-700 dark:text-gray-300">Marital Status *</h4>

            <div class="radio-group flex items-center gap-x-3 flex-wrap">
                <div class="item flex-shrink-0">
                    <input type="radio" name="maritalStatus" id="single" value="single"
                        {{ old('maritalStatus', $student->marital_status) == 'single' ? 'checked' : '' }}>
                    <x-input-label for="single" class="inline-block cursor-pointer" :value="__('Single')" />
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="maritalStatus" id="married" value="married"
                        {{ old('maritalStatus', $student->marital_status) == 'married' ? 'checked' : '' }}>
                    <x-input-label for="married" class="inline-block cursor-pointer" :value="__('Married')" />
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="maritalStatus" id="divorced" value="divorced"
                        {{ old('maritalStatus', $student->marital_status) == 'divorced' ? 'checked' : '' }}>
                    <x-input-label for="divorced" class="inline-block cursor-pointer" :value="__('Divorced')" />
                </div>


            </div>

            <x-input-error class="mt-2" :messages="$errors->get('maritalStatus')" />

        </div>

        <div>
            <x-input-label for="phoneNumber" :value="__('Phone Number *')" />
            <x-text-input id="phoneNumber" name="phoneNumber" type="text" class="mt-1 block w-full"
                :value="old('phoneNumber', $student->phone_number)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('phoneNumber')" />
        </div>


        <div>
            <x-input-label for="dateOfBirth" :value="__('Date of Birth *')" />
            <x-text-input id="dateOfBirth" name="dateOfBirth" type="date" class="mt-1 block w-full"
                :value="old('dateOfBirth', $student->date_of_birth)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('dateOfBirth')" />
        </div>

        <div>
            <x-input-label for="placeOfBirth" :value="__('Place of Birth *')" />
            <x-text-input id="placeOfBirth" name="placeOfBirth" type="text" class="mt-1 block w-full"
                :value="old('placeOfBirth', $student->place_of_birth)" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('placeOfBirth')" />
        </div>


           <div>
            <h4 class="block font-medium text-sm text-gray-700 dark:text-gray-300">Salutation *</h4>

            <div class="radio-group flex items-center gap-x-3 flex-wrap">
                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="miss" value="miss" {{ old('salutation', $student->salutation) == 'miss' ? 'checked' : '' }}>
                    <x-input-label for="miss" class="inline-block cursor-pointer" :value="__('Miss')"/>
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="mr" value="mr" {{ old('salutation', $student->salutation) == 'mr' ? 'checked' : '' }}>
                    <x-input-label for="mr" class="inline-block cursor-pointer" :value="__('Mr')"/>    
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="mrs" value="mrs" {{ old('salutation', $student->salutation) == 'mrs' ? 'checked' : '' }}>
                    <x-input-label for="mrs" class="inline-block cursor-pointer" :value="__('Mrs')"/>    
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="dr" value="dr" {{ old('salutation', $student->salutation) == 'dr' ? 'checked' : '' }}>
                    <x-input-label for="dr" class="inline-block cursor-pointer" :value="__('Dr')"/>    
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="prof" value="prof" {{ old('salutation', $student->salutation) == 'prof' ? 'checked' : '' }}>
                    <x-input-label for="prof" class="inline-block cursor-pointer" :value="__('Prof')"/>    
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="chief" value="chief" {{ old('salutation', $student->salutation) == 'chief' ? 'checked' : '' }}>
                    <x-input-label for="chief" class="inline-block cursor-pointer" :value="__('Chief')"/>    
                </div>

                <div class="item flex-shrink-0">
                    <input type="radio" name="salutation" id="engr" value="engr" {{ old('salutation', $student->salutation) == 'engr' ? 'checked' : '' }}>
                    <x-input-label for="engr" class="inline-block cursor-pointer" :value="__('Engr')"/>    
                </div>

            </div>

            <x-input-error class="mt-2" :messages="$errors->get('salutation')" />
            
        </div>


            
            <div>
                <h4 class="block font-medium text-sm text-gray-700 dark:text-gray-300">Preferred Language *</h4>
                <div class="radio-group flex items-center gap-x-3 flex-wrap">
                    <div class="item flex-shrink-0">
                        <input type="radio" name="preferredLanguage" id="english" value="english" {{ old('preferredLanguage', $student->preferred_language) == 'english' ? 'checked' : '' }}>
                        <x-input-label for="english" class="inline-block cursor-pointer" :value="__('English')"/>
                    </div>
        
                    <div class="item flex-shrink-0">
                        <input type="radio" name="preferredLanguage" id="french" value="french" {{ old('preferredLanguage', $student->preferred_language) == 'french' ? 'checked' : '' }}>
                        <x-input-label for="french" class="inline-block cursor-pointer" :value="__('French')"/>    
                    </div>
                </div>
                <x-input-error class="mt-2" :messages="$errors->get('preferredLanguage')" />
            </div>


           <div class="w-full">
                <x-input-label for="academicDiplomas" :value="__('Academic Diplomas')" />
                <x-textarea id="academicDiplomas" name="academicDiplomas" class="mt-1 block w-full">{{ old('academicDiplomas', $student->academic_diplomas) }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('academicDiplomas')" />
            </div>

            <div class="w-full">
                <x-input-label for="professionalDiplomas" :value="__('Professional Diplomas')" />
                <x-textarea id="professionalDiplomas" name="professionalDiplomas" class="mt-1 block w-full">{{ old('professionalDiplomas', $student->professional_diplomas) }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('professionalDiplomas')" />
            </div>


            <div class="w-full">
                <x-input-label for="professionalExperience" :value="__('Professional Experience')" />
                <x-textarea id="professionalExperience" name="professionalExperience" class="mt-1 block w-full">{{ old('professionalExperience', $student->professional_experience ) }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('professionalExperience')" />
            </div>

            <div class="w-full">
                <x-input-label for="otherRelevantInformation" :value="__('Other Relevant Information')" />
                <x-textarea id="otherRelevantInformation" name="otherRelevantInformation" class="mt-1 block w-full">{{ old('otherRelevantInformation', $student->other_relevant_info) }}</x-textarea>
                <x-input-error class="mt-2" :messages="$errors->get('otherRelevantInformation')" />
            </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            @if (session('status') === 'student-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
