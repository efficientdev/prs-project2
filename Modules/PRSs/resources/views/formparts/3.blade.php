<div 
    x-data="otherRecordsComponent({!! json_encode(old('other_record', [])) !!})" 
    class="  w-full  my-5 mx-auto space-y-6"
>
    <h2 class="text-xl font-semibold text-gray-800">Other School Records</h2>

    <!-- Add new record input -->
    <div class="flex items-center gap-3">
        <input 
            type="text" 
            x-model="newRecord" 
            placeholder="Enter new record" 
            class="flex-1 border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-blue-300"
        />
        <button 
            type="button" 
            @click="addRecord()" 
            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition"
        >
            Add
        </button>
    </div>

<div class="grid md:grid-cols-3">
    <!-- Record List -->
    <template x-for="(record, index) in records" :key="index">
        <div class="flex items-center space-x-3">
            <input 
                type="checkbox" 
                :id="`other-record-${index}`" 
                :name="`other_record[${record}]`" 
                x-model="selectedRecords" 
                :value="record"
                class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
            />
            <label 
                :for="`other-record-${index}`" 
                class="text-gray-700"
                x-text="record"
            ></label>
        </div>
    </template></div>
</div>

<script>
    function otherRecordsComponent(oldSelected) {
        return {
            newRecord: '',
            selectedRecords: oldSelected,
            records: [...oldSelected], // Restore all previous records

            addRecord() {
                const trimmed = this.newRecord.trim();
                if (trimmed && !this.records.includes(trimmed)) {
                    this.records.push(trimmed);
                    this.selectedRecords.push(trimmed);
                }
                this.newRecord = '';
            }
        };
    }
</script>
