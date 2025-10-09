<x-cies::layouts.master>
@php
//$data=$sectionC;
@endphp
<form method="POST" action="{{ route('cies.sectionC.store', $report->id) }}">
    @csrf

    <h2 class="text-lg font-bold mb-4">Section C: Staffing Data</h2>

    <div x-data="{ rows: {{ json_encode(old('staffing', $data['staffing'] ?? [
        ['category' => 'Qualified (TRCN)', 'male' => '', 'female' => ''],
        ['category' => 'Unqualified', 'male' => '', 'female' => ''],
        ['category' => 'Head Teachers/Principals', 'male' => '', 'female' => ''],
        ['category' => 'Teaching Staff', 'male' => '', 'female' => ''],
        ['category' => 'Non-Teaching Staff', 'male' => '', 'female' => ''],
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
                            <input type="text" :name="`staffing[${i}][category]`" x-model="row.category" class="w-full" readonly >
                        </td>
                        <td class="border p-1">
                            <input type="number" :name="`staffing[${i}][male]`" x-model.number="row.male" class="w-full">
                        </td>
                        <td class="border p-1">
                            <input type="number" :name="`staffing[${i}][female]`" x-model.number="row.female" class="w-full">
                        </td>
                        <td class="border p-1 text-center" x-text="(row.male || 0) + (row.female || 0)"></td>
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
