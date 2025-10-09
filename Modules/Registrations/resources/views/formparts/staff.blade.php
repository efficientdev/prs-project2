<div x-data="staffForm()" class="space-y-6">
    <template x-for="(staff, index) in staffList" :key="index">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
            <!-- Surname -->
            <div>
                <template x-if="index === 0">
                    <label class="block text-sm font-medium text-gray-700">
                        Surname of Staff <span class="text-red-600">*</span>
                    </label>
                </template>
                <input type="text"
                       :name="`staff_surname[${index}]`"
                       x-model="staff.surname"
                       :required="index === 0"
                       :placeholder="index === 0 ? 'Eg. Lawal' : `Staff ${index + 1} Surname`"
                       class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Other Names -->
            <div>
                <template x-if="index === 0">
                    <label class="block text-sm font-medium text-gray-700">
                        Other Names of Staff <span class="text-red-600">*</span>
                    </label>
                </template>
                <input type="text"
                       :name="`staff_other_names[${index}]`"
                       x-model="staff.otherNames"
                       :required="index === 0"
                       :placeholder="index === 0 ? 'Eg. Tunde' : `Staff ${index + 1} Names`"
                       class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Qualifications -->
            <div class="flex gap-2">
                <div class="flex-1">
                    <template x-if="index === 0">
                        <label class="block text-sm font-medium text-gray-700">
                            Qualifications, with Dates <span class="text-red-600">*</span>
                        </label>
                    </template>
                    <input type="text"
                           :name="`staff_qualification[${index}]`"
                           x-model="staff.qualification"
                           :required="index === 0"
                           :placeholder="index === 0 ? 'Eg. NCE' : `Staff ${index + 1} Qualifications`"
                           class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
                <!-- Remove button -->
                <button type="button"
                        x-show="index !== 0"
                        @click="removeStaff(index)"
                        class="text-red-600 hover:text-red-800 text-lg font-bold pt-6">
                    &times;
                </button>
            </div>
        </div>
    </template>


    <!-- Add Staff Button -->
    <div>
        <button type="button"
                @click="addStaff()"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm">
            + Add Staff
        </button>
    </div>
</div>

@push('scripts')
<script>
function staffForm() {
    return {
        staffList: [
            @php
                $surnames = old('staff_surname',$data['staff_surname']?? []);
                $otherNames = old('staff_other_names', $data['staff_other_names']?? []);
                $qualifications = old('staff_qualification',$data['staff_qualification']??  []);
                $count = max(count($surnames), count($otherNames), count($qualifications), 1);

                for ($i = 0; $i < $count; $i++) {
                    echo json_encode([
                        'surname' => $surnames[$i] ?? '',
                        'otherNames' => $otherNames[$i] ?? '',
                        'qualification' => $qualifications[$i] ?? ''
                    ]);

                    if ($i < $count - 1) {
                        echo ',';
                    }
                }
            @endphp
        ],
        addStaff() {
            this.staffList.push({ surname: '', otherNames: '', qualification: '' });
        },
        removeStaff(index) {
            this.staffList.splice(index, 1);
        }
    }
}
</script>
@endpush
