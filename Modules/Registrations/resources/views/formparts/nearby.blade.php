@php
$depthRanges = [
    'below 50 meters',
    '50 to 100 meters',
    'above 100 meters',
];
@endphp

<div x-data="schoolForm()" class="space-y-4">
    <template x-for="(school, index) in schools" :key="index">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- School Name -->
            <div>
                <template x-if="index === 0">
                    <label class="block text-sm font-medium text-gray-700">
                        Name of Other School(s) Near Proposed School <b class="text-red-600">*</b>
                    </label>
                </template>
                <input
                    type="text"
                    :name="`nearby_school[${index + 1}]`"
                    :placeholder="`School ${index + 1}`"
                    x-model="school.name"
                    class="form-input w-full mt-1 block border-gray-300 rounded-md"
                    :required="index < 2"
                />
            </div>

            <!-- School Distance -->
            <div>
                <template x-if="index === 0">
                    <label class="block text-sm font-medium text-gray-700">
                        Distance of Other School(s) from Proposed School <b class="text-red-600">*</b>
                    </label>
                </template>
                <div> 
        <select 
                x-bind:name="`nearby_distance[${index + 1}]`"
                x-model="school.distance"
                class="form-input w-full mt-1 block border-gray-300 rounded-md"
                :required="index < 2"
            >
                <option value="">Select distance</option>
                <template x-for="range in ['Below 50 meters', '50 to 100 meters', 'Above 100 meters']">
                    <option x-text="range" :value="range"></option>
                </template>
            </select>



                <!--<input
                    type="text"
                    :name="`nearby_distance[${index + 1}]`"
                    :placeholder="`Distance from School ${index + 1}`"
                    x-model="school.distance"
                    class="form-input w-full mt-1 block border-gray-300 rounded-md"
                    :required="index < 2"
                />-->
            </div>

        </div>
    </template>

    <!-- Buttons -->
    <div class="flex gap-2">
        <button
            type="button"
            @click="addSchool"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >+ Add Another School</button>

        <button
            type="button"
            @click="removeSchool"
            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
            x-show="schools.length > 1"
        >− Remove</button>
    </div>
</div>

<!-- Alpine.js Logic (with old() and $data fallback) -->
<script>
    function schoolForm() {
        return {
        schools: [
            @php
                $surnames = old('nearby_school',$data['nearby_school']?? []);
                $otherNames = old('nearby_distance', $data['nearby_distance']?? []); 
                $count = max(count($surnames), count($otherNames), 1);

                for ($i = 0; $i < $count; $i++) {
                    echo json_encode([
                        'name' => $surnames[$i+1] ?? '',
                        'distance' => $otherNames[$i+1] ?? '', 
                    ]);

                    if ($i < $count - 1) {
                        echo ',';
                    }
                }
            @endphp
        ], 

            addSchool() {
                this.schools.push({ name: '', distance: '' });
            },

            removeSchool() {
                if (this.schools.length > 1) {
                    this.schools.pop();
                }
            }
        };
    }
</script>
