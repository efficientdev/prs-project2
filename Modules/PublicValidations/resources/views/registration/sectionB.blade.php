<x-publicvalidations::layouts.master>
@extends('publicvalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">
    Section B: Enrolment Data (Current Academic Session)
</h1>

{{-- 1️⃣ Separate JSON data block (handles both old data and backend data) --}}
<script id="enrolment-data" type="application/json">
    {!! json_encode(old('enrolments', $data['enrolments'] ?? [])) !!}
</script>

<form 
    method="POST" 
    action="{{ route('public.validation.sectionB.store', $form_id) }}" 
    x-data="enrolmentForm()"
    class="space-y-6"
>
    @csrf

    @php
        $levels = [
            'Primary 1–3', 
            'Primary 4–6', 
            'JSS1–3', 
            'SSS1–3',
            'Special Needs Pupils', 
            'Grand Total'
        ];
    @endphp

    <div class="overflow-auto w-full">
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2 border">Level</th>
                    <th class="p-2 border">Male</th>
                    <th class="p-2 border">Female</th>
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($levels as $i => $level)
                <tr>
                    <td class="border p-2">
                        <input 
                            type="text" 
                            name="enrolments[{{ $i }}][level]" 
                            value="{{ $level }}" 
                            readonly 
                            class="input bg-gray-100 w-full"
                        >
                    </td>

                    {{-- Male --}}
                    <td class="border p-2">
                        <input 
                            type="number"
                            x-model.number="rows[{{ $i }}].male"
                            name="enrolments[{{ $i }}][male]"
                            :readonly="{{ $i === count($levels) - 1 ? 'true' : 'false' }}"
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        >
                    </td>

                    {{-- Female --}}
                    <td class="border p-2">
                        <input 
                            type="number"
                            x-model.number="rows[{{ $i }}].female"
                            name="enrolments[{{ $i }}][female]"
                            :readonly="{{ $i === count($levels) - 1 ? 'true' : 'false' }}"
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        >
                    </td>

                    {{-- Total (auto-calculated) --}}
                    <td class="border p-2">
                        <input 
                            type="number"
                            x-model="rows[{{ $i }}].total"
                            readonly
                            name="enrolments[{{ $i }}][total]"
                            class="w-full bg-gray-100 border-gray-300 rounded-md shadow-sm"
                        >
                    </td>

                    {{-- Remarks --}}
                    <td class="border p-2">
                        <input 
                            type="text"
                            x-model="rows[{{ $i }}].remarks"
                            name="enrolments[{{ $i }}][remarks]"
                            :readonly="{{ $i === count($levels) - 1 ? 'true' : 'false' }}"
                            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                        >
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('public.validation.sectionA.show', $form_id) }}" 
           class="btn bg-gray-500 text-white px-6 py-2 rounded">
           Previous
        </a>

        <button type="submit" 
            class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
            Next
        </button>
    </div>
</form>

{{-- 2️⃣ Alpine.js Component Definition --}}
<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('enrolmentForm', () => ({
        rows: [],

        init() {
            // Load data from JSON script tag (includes old() fallback)
            const data = JSON.parse(document.getElementById('enrolment-data').textContent || '[]');

            const defaults = [
                'Primary 1–3', 'Primary 4–6', 'JSS1–3', 'SSS1–3',
                'Special Needs Pupils', 'Grand Total'
            ];

            this.rows = defaults.map((level, i) => ({
                level,
                male: parseInt(data[i]?.male) || 0,
                female: parseInt(data[i]?.female) || 0,
                total: parseInt(data[i]?.total) || 0,
                remarks: data[i]?.remarks ?? '',
            }));

            // Watch male/female changes and recalculate totals
            this.$watch('rows', (rows) => {
                rows.forEach((r, index) => {
                    // Skip grand total row when recalculating individual totals
                    if (index < rows.length - 1) {
                        const male = parseInt(r.male) || 0;
                        const female = parseInt(r.female) || 0;
                        r.total = male + female;
                    }
                });

                // Recalculate the "Grand Total" row
                const grandIndex = rows.length - 1;
                const totals = rows.slice(0, grandIndex);

                const totalMale = totals.reduce((sum, r) => sum + (parseInt(r.male) || 0), 0);
                const totalFemale = totals.reduce((sum, r) => sum + (parseInt(r.female) || 0), 0);
                const totalCombined = totalMale + totalFemale;

                this.rows[grandIndex].male = totalMale;
                this.rows[grandIndex].female = totalFemale;
                this.rows[grandIndex].total = totalCombined;
                this.rows[grandIndex].remarks = 'Auto-calculated';
            }, { deep: true });
        },
    }));
});
</script>

@endsection
</x-publicvalidations::layouts.master>
