<div 
    x-data="schoolRecordsComponent({!! json_encode(old('school_record', [])) !!})" 
    class=" my-5 w-full   mx-auto space-y-4"
>
    <h2 class="text-xl font-semibold text-gray-800">School Records Checklist</h2>

    <!-- Select All Toggle -->
    <div class="flex items-center space-x-3">
        <input 
            type="checkbox"
            id="selectAll"
            x-model="selectAll"
            @change="toggleAll()"
            class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
        />
        <label for="selectAll" class="text-gray-700 font-medium">Select All / Deselect All</label>
    </div>
<div class="grid md:grid-cols-3">
    <!-- Record Checkboxes -->
    <template x-for="(record, index) in records" :key="index">
        <div class="flex items-center space-x-3">
            <input 
                type="checkbox" 
                :name="`school_record[${record}]`"
                :id="`record-${index}`"
                x-model="selectedRecords"
                :value="record"
                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
            />
            <label 
                :for="`record-${index}`" 
                class="text-gray-700"
                x-text="record"
            ></label>
        </div>
    </template></div>
</div>

<script>
    function schoolRecordsComponent(oldSelected) {
        const allRecords = [
            'Class attendance register',
            'Admission register',
            'Class diaries',
            'Time book',
            'Visitors’ book',
            'School time table',
            'Log book',
            'National Policy on Education',
            'Scheme of work',
            'Lesson notes',
            'Staff Movement Book',
            'Lesson plan',
            'Staff Meeting book'
        ];

        return {
            records: allRecords,
            selectedRecords: oldSelected,
            selectAll: oldSelected.length === allRecords.length,

            toggleAll() {
                if (this.selectAll) {
                    this.selectedRecords = [...this.records];
                } else {
                    this.selectedRecords = [];
                }
            }
        };
    }
</script>
