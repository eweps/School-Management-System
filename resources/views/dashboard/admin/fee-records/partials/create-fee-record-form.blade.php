<section>

    <form method="post" action="{{ route('admin.fees.store') }}" class="mt-6 space-y-6">
        @csrf
    

        <div>
            <x-input-label for="student" :value="__('Select Student *')" />
            <x-select-input id="student" name="student" class="searchable mt-1 block w-full">
                @isset($students)
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}" {{ old('student') === $student->id ? 'selected' : '' }}>
                            {{ __($student->user->name) }}</option>
                    @endforeach
                @endisset
            </x-select-input>
            <x-input-error class="mt-2" :messages="$errors->get('student')" />
        </div>


        
        <div>
            <x-input-label for="fee" :value="__('Fee *')" />
            <x-select-input id="fee" name="fee" class="mt-1 block w-full">
                <option selected disabled>{{ __('Select fee') }}</option>
            </x-select-input>
             <x-input-error class="mt-2" :messages="$errors->get('fee')" />
        </div>


        <div>
            <x-input-label for="amount" :value="__('Amount (XAF) *')" />
            <x-text-input id="amount" name="amount" type="number" class="mt-1 block w-full" :value="old('amount')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('amount')" />
        </div>

        <div class="">
            <div class="w-full">
                <x-input-label for="receipt" :value="__('Upload Receipt Document (pdf,doc,docx,ppt,pptx,zip,jpg,png) max: 6MB *')" />
                <x-upload-input class="mt-1 block w-full" for="receipt" accept=".pdf,.doc,.docx,.ppt,.pptx,.zip,.jpg,.png" />
                <x-input-error class="mt-2" :messages="$errors->get('receipt')" />
            </div>
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


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const studentField = document.querySelector('#student');
        const feeField = document.querySelector('#fee');

        studentField.addEventListener('change', () => {

            let studentId = studentField.value;
            // Clear existing options
            feeField.innerHTML = '<option value="">Loading fees...</option>';

            // Formatter for Cameroon FCFA
            const formatter = new Intl.NumberFormat('fr-CM', {
                style: 'currency',
                currency: 'XAF', // FCFA Central African Franc
                minimumFractionDigits: 0
            });

            axios.get(`/api/student/fees/${studentId}`)
                .then(response => {

                    const fees = response.data.fees;
                    
                    feeField.innerHTML = '<option value="">Select fee</option>'; 
                    fees.forEach(fee => {
                        const option = document.createElement('option');
                        option.value = fee.id; 
                        option.textContent = `${fee.title} - ${formatter.format(fee.amount)}`;
                        feeField.appendChild(option);
                    });
                })
                .catch(error => {
                    console.error(error);
                });

        });

    });
</script>