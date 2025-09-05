<section>
     <x-session-error />
     
    <form action="{{ route('admin.students.transcript.pdf', $student->id) }}" class="space-y-3" method="POST">
        @csrf

        <div>
            <x-select-input id="semester" name="semester" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select a Semester') }}</option>

                @isset($semesters)
                @foreach ($semesters as $semester )
                <option value="{{ $semester->id }}">{{ __($semester->name) }}</option>
                @endforeach
                @endisset

            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('semester')" />
        </div>

        <x-primary-button type="submit">
            Get Transcript
        </x-primary-button>
    </form>
</section>
