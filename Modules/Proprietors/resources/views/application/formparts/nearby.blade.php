
<div x-data="schoolForm()" class="space-y-4">
    <template x-for="(school, index) in schools" :key="index">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div  >
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
            <div  >
                <template x-if="index === 0">
                    <label class="block text-sm font-medium text-gray-700">
                        Distance of Other School(s) from Proposed School <b class="text-red-600">*</b>
                    </label>
                </template>
                <input
                    type="text"
                    :name="`nearby_distance[${index + 1}]`"
                    :placeholder="`Distance from School ${index + 1}`"
                    x-model="school.distance"
                    class="form-input w-full mt-1 block border-gray-300 rounded-md"
                    :required="index < 2"
                />
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

<!-- Alpine.js Component -->
<script>
    function schoolForm() {
        return {
            schools: [
                {
                    name: '{{ old("nearby_school.1") }}',
                    distance: '{{ old("nearby_distance.1") }}',
                },
            ],
            addSchool() {
                this.schools.push({ name: '', distance: '' });
            },
            removeSchool() {
                if (this.schools.length > 1) {
                    this.schools.pop();
                }
            }
        }
    }
</script>