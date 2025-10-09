
<div x-data="otherFeesForm()" class="space-y-4">
    <template x-for="(other_fees, index) in other_feess" :key="index">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div  >
                <template x-if="index === 0">
                    <label class="block text-sm font-medium text-gray-700">
                         Other Fees Name <b class="text-red-600">*</b>
                    </label>
                </template>
                <input
                    type="text"
                    :name="`other_fees[${index + 1}]`"
                    :placeholder="`Other Fees ${index + 1}`"
                    x-model="other_fees.name"
                    class="form-input w-full mt-1 block border-gray-300 rounded-md"
                    :required="index < 2"
                />
            </div>
            <div  >
                <template x-if="index === 0">
                    <label class="block text-sm font-medium text-gray-700">
                         Other Fees Amount <b class="text-red-600">*</b>
                    </label>
                </template>
                <input
                    type="text"
                    :name="`amount[${index + 1}]`"
                    :placeholder="`Other Fees ${index + 1} amount`"
                    x-model="other_fees.amount"
                    class="form-input w-full mt-1 block border-gray-300 rounded-md"
                    :required="index < 2"
                />
            </div>
        </div>
    </template>

    <!-- Buttons -->
    <div class="flex gap-2">
        <button
            type="button"
            @click="addOtherFees"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >+ Add Another Fees</button>

        <button
            type="button"
            @click="removeOtherFees"
            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
            x-show="other_feess.length > 1"
        >− Remove</button>
    </div>
</div>

<!-- Alpine.js Component -->
<script>
    function otherFeesForm() {
        return {
            other_feess: [
                {
                    name: '{{ old("other_fees.1") }}',
                    amount: '{{ old("amount.1") }}',
                },
            ],
            addOtherFees() {
                this.other_feess.push({ name: '', amount: '' });
            },
            removeOtherFees() {
                if (this.other_feess.length > 1) {
                    this.other_feess.pop();
                }
            }
        }
    }
</script>
