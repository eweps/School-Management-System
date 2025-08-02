<section>
    <x-session-status key="fee-record-created" message="Record Created Successfully" />
    <x-session-error />


    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 my-10">
        <div id="totalFee" class="bg-gray-100 dark:bg-gray-900 rounded py-6 px-4 flex flex-col justify-between items-center md:flex-row relative">
            <div>
                <h5 class="uppercase text-gray-900 dark:text-gray-200 text-sm tracking-widest font-semibold">Total Fee</h5>
                <p class="fee-name bg-green-700 font-semibold text-sm absolute -top-2 left-0 w-[100%] text-center rounded text-white truncate">Not Selected</p>
            </div>

            <div>
                <p class="fee-amount text-gray-900 dark:text-gray-200 font-semibold text-sm uppercase">{{ Number::currency(0, 'XAF', 'en') }}</p>
            </div>
        </div>
        <div id="amountLeft" class="bg-gray-100 dark:bg-gray-900 rounded py-6 px-4 flex flex-col justify-between items-center md:flex-row relative">
            <div>
                <h5 class="uppercase text-gray-900 dark:text-gray-200 text-sm tracking-widest font-semibold">Amount left</h5>
                <p class="fee-name bg-red-700 font-semibold text-sm absolute -top-2 left-0 w-[100%] text-center rounded text-white truncate">Not Selected</p>
            </div>

            <div>
                <p class="fee-amount text-gray-900 dark:text-gray-200 font-semibold text-sm uppercase">{{ Number::currency(0, 'XAF', 'en') }}</p>
            </div>
        </div>

        <div id="totalPaid" class="bg-gray-100 dark:bg-gray-900 rounded py-6 px-4 flex flex-col justify-between items-center md:flex-row relative">
            <div>
                <h5 class="uppercase text-gray-900 dark:text-gray-200 text-sm tracking-widest font-semibold">Total Paid</h5>
                <p class="fee-name bg-yellow-700 font-semibold text-sm absolute -top-2 left-0 w-[100%] text-center rounded text-white truncate">Not Selected</p>
            </div>

            <div>
                <p class="fee-amount text-gray-900 dark:text-gray-200 font-semibold text-sm uppercase">{{ Number::currency(0, 'XAF', 'en') }}</p>
            </div>
        </div>

        <div id="payingNow" class="bg-gray-100 dark:bg-gray-900 rounded py-6 px-4 flex flex-col justify-between items-center md:flex-row relative">
            <div>
                <h5 class="uppercase text-gray-900 dark:text-gray-200 text-sm tracking-widest font-semibold">Paying now</h5>
                <p class="fee-name bg-blue-700 font-semibold text-sm absolute -top-2 left-0 w-[100%] text-center rounded text-white truncate">Not Selected</p>
            </div>

            <div>
                <p class="fee-amount text-gray-900 dark:text-gray-200 font-semibold text-sm uppercase">{{ Number::currency(0, 'XAF', 'en') }}</p>
            </div>
        </div>

    </div>

    <form method="post" action="{{ route('admin.fee-records.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="student" :value="__('Select Student *')" />
            <x-select-input id="student" name="student" class="searchable mt-1 block w-full">
                @isset($students)
                @foreach ($students as $student)
                <option value="{{ $student->id }}" {{ old('student') === $student->id ? 'selected' : '' }}>
                    {{ __($student->user->name) }} - {{ $student->matricule }}</option>
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
                <x-input-label for="receipt" :value="__('Upload Receipt Document (pdf,jpg,png) max: 6MB *')" />
                <x-upload-input class="mt-1 block w-full" for="receipt" accept=".pdf,.jpg,.png" />
                <x-input-error class="mt-2" :messages="$errors->get('receipt')" />
            </div>
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Create') }}</x-primary-button>

            @if (session('status') === 'fee-record-created')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>


<script>
    document.addEventListener('DOMContentLoaded', () => {
        const studentField = document.querySelector('#student');
        const feeField = document.querySelector('#fee');
        const payingNow = document.querySelector('#payingNow');
        const amountInput = document.querySelector('#amount');

        // Formatter for Cameroon FCFA
        const formatter = new Intl.NumberFormat('fr-CM', {
            style: 'currency'
            , currency: 'XAF', // FCFA Central African Franc
            minimumFractionDigits: 0
        });

        studentField.addEventListener('change', () => {

            const studentId = parseInt(studentField.value);

            // Clear existing options
            feeField.innerHTML = '<option value="">Loading fees...</option>';

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


        feeField.addEventListener('change', () => {

            const feeId = parseInt(feeField.value);
            const studentId = parseInt(studentField.value);

            getFee(feeId).then(data => {
                const totalFee = document.querySelector('#totalFee');
                const fee = data.fee;

                if (totalFee !== null) {

                    const feeNames = document.querySelectorAll('.fee-name');
                    const feeAmount = totalFee.querySelector('.fee-amount');

                    feeNames.forEach(feeName => {
                        feeName.textContent = fee.title;
                    });
                    feeAmount.textContent = formatter.format(fee.amount);

                }
            });



            getStudentLastPaidFee(studentId, feeId).then(data => {

                const amountLeft = document.querySelector('#amountLeft');
                const totalPaid = document.querySelector('#totalPaid');

                if (data !== undefined && data.record !== undefined) {
                    const record = data.record;

                    if (amountLeft !== null) {
                        const leftFeeAmount = amountLeft.querySelector('.fee-amount');
                        leftFeeAmount.textContent = formatter.format(record.amount_left);
                    }

                    if (totalPaid !== null) {
                        const paidFeeAmount = totalPaid.querySelector('.fee-amount');
                        let totalFee = record.total_amount;
                        let amountLeft = record.amount_left;
                        let amountPaid = totalFee - amountLeft;
                        paidFeeAmount.textContent = formatter.format(amountPaid);

                    }
                }

            });

        });


        amountInput.addEventListener('input', () => {

            const feeId = parseInt(feeField.value);
            const studentId = parseInt(studentField.value);

            getStudentLastPaidFee(studentId, feeId).then(data => {


                if (data !== undefined && data.record !== undefined) {
                    const feeRecord = data.record;

                    if (payingNow !== null) {
                        const payingNowAmount = payingNow.querySelector('.fee-amount');
                        const leftFeeAmount = amountLeft.querySelector('.fee-amount');
                        const paidFeeAmount = totalPaid.querySelector('.fee-amount');

                        const inputAmount = amountInput.value;
                        let parsedInput = parseFloat(inputAmount);

                        if (inputAmount !== '' && !isNaN(parsedInput) && parsedInput > 0) {
                            payingNowAmount.textContent = formatter.format(parsedInput);

                            let leftFee = parseFloat(feeRecord.amount_left);
                            let totalFee = parseFloat(feeRecord.total_amount);
                            let paidFee = totalFee - leftFee;

                            let currentLeftAmount = leftFee - parsedInput;
                            leftFeeAmount.textContent = formatter.format(currentLeftAmount);

                            let currentPaidAmount = paidFee + parsedInput;
                            paidFeeAmount.textContent = formatter.format(currentPaidAmount);

                        } else {

                            let leftFee = parseFloat(feeRecord.amount_left);
                            let totalFee = parseFloat(feeRecord.total_amount);
                            let paidFee = totalFee - leftFee;

                            payingNowAmount.textContent = formatter.format(0);
                            leftFeeAmount.textContent = formatter.format(leftFee);
                            paidFeeAmount.textContent = formatter.format(paidFee);
                        }

                    }
                }

            });


        });

    });

    async function getStudentLastPaidFee(studentId, feeId) {
        try {
            const response = await axios.get(`/api/student/fee/lastpaid/${studentId}/${feeId}`);
            return response.data;
        } catch (error) {
            if (error.response && error.response.status === 400) {
                return null;
            }
            // console.error("Error fetching data:", error);
        }
    }

    async function getFee(feeId) {
        try {
            const response = await axios.get(`/api/fee/${feeId}`);
            return response.data;
        } catch (error) {
            if (error.response && error.response.status === 400) {
                return null;
            }
            // console.error("Error fetching data:", error);
        }
    }


    function parseCurrency(str) {
        // Remove currency symbols and letters (e.g., FCFA)
        let cleaned = str.replace(/[^\d,.\-]/g, '');
        // Replace French decimal comma with dot
        cleaned = cleaned.replace(',', '.');
        // Remove any thousands separators (spaces or thin spaces)
        cleaned = cleaned.replace(/\s/g, '');
        return parseFloat(cleaned);
    }

</script>
