 STUDENT ENROLMENT: Confirm enrolment on CIEs report using the Remarks column

    <div id="enrollment-form" x-data="enrollmentForm()"> 

        <table class="table-auto w-full border mb-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Class</th>
                    <th class="p-2 border">Male</th>
                    <th class="p-2 border">Female</th>
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">Remarks</th>
                </tr>
            </thead>
            <tbody>
                <template x-for="(row, i) in rows" :key="i">
                    <tr>
                        <td class="border p-1">
                            <input type="text" :name="`levels[${i}][level]`" x-model="row.level" class="w-full border-none bg-transparent" readonly="">
                        </td>
                        <td class="border p-1">
                            <input type="number" :name="`levels[${i}][male]`" x-model.number="row.male" class="w-full" readonly>
                        </td>
                        <td class="border p-1">
                            <input type="number" :name="`levels[${i}][female]`" x-model.number="row.female" class="w-full" readonly>
                        </td>
                        <td class="border p-1 text-center" >
                            <span x-text="(parseInt(row.male || 0) + parseInt(row.female || 0))"></span>
                        </td>
                        <td class="border p-1">
                            <input type="text" :name="`levels[${i}][remarks]`" x-model="row.remarks" class="w-full">
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
 
    @php
     
    $defaultLevels = [
        ['level' => 'Nursery 1', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'Nursery 2', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'Nursery 3', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'Primary 1', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'Primary 2', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'Primary 3', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'Primary 4', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'Primary 5', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'Primary 6', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'JSS 1', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'JSS 2', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'JSS 3', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'SSS 1', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'SSS 2', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'SSS 3', 'male' => '', 'female' => '', 'remarks' => ''],
    ];


    $levels = old('levels', $data['levels'] ?? $defaultLevels);
@endphp

    <script>
    function enrollmentForm() {
        return {
            rows: @json($levels)
        };
    }
</script>
