<x-cies::layouts.master>
@php
//$data=$sectionC;
@endphp
<form method="POST" action="{{ route('cies.sectionC.store', $report->id) }}">
    @csrf

    <h2 class="text-lg font-bold mb-4">Section C: Staffing Data</h2>

    <div x-data="staffingTable()" class="mb-4">
        <table class="table-auto w-full border mb-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Category</th>
                    <th class="p-2 border">Male</th>
                    <th class="p-2 border">Female</th>
                    <th class="p-2 border">Total</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="(row, i) in rows" :key="i">
                    <tr>
                        <td class="border p-1">
                            <input type="text" :name="`staffing[${i}][category]`" x-model="row.category" class="w-full bg-gray-100" readonly>
                        </td>
                        <td class="border p-1">
                            <input 
                                type="number" 
                                :name="`staffing[${i}][male]`" 
                                x-model.number="row.male" 
                                class="w-full"
                                :readonly="isCalculatedRow(i)"
                            >
                        </td>
                        <td class="border p-1">
                            <input 
                                type="number" 
                                :name="`staffing[${i}][female]`" 
                                x-model.number="row.female" 
                                class="w-full"
                                :readonly="isCalculatedRow(i)"
                            >
                        </td>
                        <td class="border p-1 text-center" x-text="totalForRow(row)"></td>
                    </tr>
                </template>

                <!-- Final Total Row -->
                <tr class="bg-gray-100 font-bold">
                    <td class="border p-2 text-right" colspan="3">Final Total</td>
                    <td class="border p-2 text-center" x-text="finalTotal()"></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- JSON data block -->
<script id="staffing-data" type="application/json">
    {!! json_encode(old('staffing', $data['staffing'] ?? [
        ['category' => 'Qualified (TRCN)', 'male' => '', 'female' => ''],
        ['category' => 'Unqualified (no TRCN)', 'male' => '', 'female' => ''],
        ['category' => 'Head Teachers/Principals', 'male' => '', 'female' => ''],
        ['category' => 'Teaching Staff', 'male' => '', 'female' => ''],
        ['category' => 'Non-Teaching Staff', 'male' => '', 'female' => ''],
    ])) !!}
</script>

<!-- Alpine component -->
<script>
function staffingTable() {
    return {
        rows: JSON.parse(document.getElementById('staffing-data').textContent),

        isCalculatedRow(index) {
            // Index 3 = Teaching Staff (calculated)
            return index === 3;
        },

        totalForRow(row) {
            const male = parseInt(row.male) || 0;
            const female = parseInt(row.female) || 0;
            return male + female;
        },

        updateTeachingStaff() {
            const qualified = this.rows[0];
            const unqualified = this.rows[1];
            const head = this.rows[2];
            const teaching = this.rows[3];

            teaching.male =
                (parseInt(qualified.male) || 0) +
                (parseInt(unqualified.male) || 0) +
                (parseInt(head.male) || 0);

            teaching.female =
                (parseInt(qualified.female) || 0) +
                (parseInt(unqualified.female) || 0) +
                (parseInt(head.female) || 0);
        },

        finalTotal() {
            this.updateTeachingStaff();

            const teaching = this.rows[3];
            const nonTeaching = this.rows[4];

            return (
                (parseInt(teaching.male) || 0) +
                (parseInt(teaching.female) || 0) +
                (parseInt(nonTeaching.male) || 0) +
                (parseInt(nonTeaching.female) || 0)
            );
        }
    };
}
</script>



    <div>Qualifications Data</div>
    <div x-data="{ rows: {{ json_encode(old('teacher_qualifications', $data['teacher_qualifications'] ?? [
        ['category' => 'Phd', 'male' => '', 'female' => ''],
        ['category' => 'PGDE/Masters', 'male' => '', 'female' => ''],
        ['category' => 'DEGREE', 'male' => '', 'female' => ''],
        ['category' => 'HND', 'male' => '', 'female' => ''],
        ['category' => 'NCE', 'male' => '', 'female' => ''],
        ['category' => 'OTHERS', 'male' => '', 'female' => ''],
    ])) }} }">

        <table class="table-auto w-full border mb-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Category</th>
                    <th class="p-2 border">Male</th>
                    <th class="p-2 border">Female</th>
                    <th class="p-2 border">Total</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="(row, i) in rows" :key="i">
                    <tr>
                        <td class="border p-1">
                            <input type="text" :name="`teacher_qualifications[${i}][category]`" x-model="row.category" class="w-full" readonly >
                        </td>
                        <td class="border p-1">
                            <input type="number" :name="`teacher_qualifications[${i}][male]`" x-model.number="row.male" class="w-full">
                        </td>
                        <td class="border p-1">
                            <input type="number" :name="`teacher_qualifications[${i}][female]`" x-model.number="row.female" class="w-full">
                        </td>
                        <td class="border p-1 text-center" x-text="(parseInt(row.male) || 0) + (parseInt(row.female) || 0)"></td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('cies.sectionB.show', $report->id) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>

</form></x-cies::layouts.master>
