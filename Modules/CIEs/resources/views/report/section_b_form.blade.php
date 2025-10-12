<x-cies::layouts.master>

@php
$data=$sectionB;
@endphp
<form method="POST" action="{{ route('cies.sectionB.store', $report->id) }}">
    @csrf

    <h2 class="text-lg font-bold mb-4">Section B: Enrollment Data</h2>

    <div id="enrollment-form" x-data="enrollmentForm()"> 

        <table class="table-auto w-full border mb-4">
            <thead>
                <tr class="bg-gray-100">
                    <th class="p-2 border">Level</th>
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
                            <input type="number" :name="`levels[${i}][male]`" x-model.number="row.male" class="w-full">
                        </td>
                        <td class="border p-1">
                            <input type="number" :name="`levels[${i}][female]`" x-model.number="row.female" class="w-full">
                        </td>
                        <td class="border p-1 text-center" x-text="(row.male || 0) + (row.female || 0)"></td>
                        <td class="border p-1">
                            <input type="text" :name="`levels[${i}][remarks]`" x-model="row.remarks" class="w-full">
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('cies.sectionA.show', $report->id) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>

</form>

    @php
    
    /*$defaultLevels = [
        ['level' => 'Nursery', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'Primary 1–3', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'Primary 4–6', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'JSS 1–3', 'male' => '', 'female' => '', 'remarks' => ''],
        ['level' => 'SSS 1–3', 'male' => '', 'female' => '', 'remarks' => ''],
    ];*/

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


</x-cies::layouts.master>
