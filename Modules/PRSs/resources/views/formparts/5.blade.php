 STAFF DEPOSITION: Confirm staff data on CIEs report using the Remarks column

<div 
    x-data="{ 
        rows: {{ json_encode(old('teacher_qualifications', $data['teacher_qualifications'] ?? [ 
            ['category' => 'Phd', 'male' => '', 'female' => '', 'remarks' => ''],
            ['category' => 'PGDE/Masters', 'male' => '', 'female' => '', 'remarks' => ''],
            ['category' => 'DEGREE', 'male' => '', 'female' => '', 'remarks' => ''],
            ['category' => 'HND', 'male' => '', 'female' => '', 'remarks' => ''],
            ['category' => 'NCE', 'male' => '', 'female' => '', 'remarks' => ''],
            ['category' => 'OTHERS', 'male' => '', 'female' => '', 'remarks' => ''],
        ])) }} 
    }"
>

    <table class="table-auto w-full border mb-4">
        <thead>
            <tr class="bg-gray-100 text-left">
                <th class="p-2 border">Category</th>
                <th class="p-2 border">Male</th>
                <th class="p-2 border">Female</th>
                <th class="p-2 border text-center">Total</th>
                <th class="p-2 border">Remarks</th>
            </tr>
        </thead>
        <tbody>
            <template x-for="(row, i) in rows" :key="i">
                <tr>
                    <!-- Category (readonly) -->
                    <td class="border p-1">
                        <input 
                            type="text" 
                            :name="`teacher_qualifications[${i}][category]`" 
                            x-model="row.category" 
                            class="w-full bg-gray-100 text-gray-700" 
                            readonly
                        >
                    </td>

                    <!-- Male (readonly) -->
                    <td class="border p-1">
                        <input 
                            type="number" 
                            :name="`teacher_qualifications[${i}][male]`" 
                            x-model.number="row.male" 
                            class="w-full bg-gray-100 text-gray-700" 
                            readonly
                        >
                    </td>

                    <!-- Female (readonly) -->
                    <td class="border p-1">
                        <input 
                            type="number" 
                            :name="`teacher_qualifications[${i}][female]`" 
                            x-model.number="row.female" 
                            class="w-full bg-gray-100 text-gray-700" 
                            readonly
                        >
                    </td>

                    <!-- Total (computed) -->
                    <td class="border p-1 text-center font-semibold text-gray-800">
                        <span x-text="(parseInt(row.male || 0) + parseInt(row.female || 0))"></span>
                    </td>

                    <!-- Remarks (editable) -->
                    <td class="border p-1">
                        <input 
                            type="text" 
                            :name="`teacher_qualifications[${i}][remarks]`" 
                            x-model="row.remarks" 
                            class="w-full"
                        >
                    </td>
                </tr>
            </template>
        </tbody>
    </table>

</div>
