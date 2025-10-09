@props([
    'fieldPrefix', // e.g., 'staff' or 'nearby_school'
    'fields' => [], // array of field definitions: name, label, placeholder
    'min' => 1, // minimum required entries
    'oldValues' => [] // optional: override old()
])
<div
    x-data="{!! 'dynamicForm(' .
    json_encode($fieldPrefix) . ',' .
    $min . ',' .
    json_encode($fields) . ',' .
    json_encode($oldValues ?: collect($fields)->map(fn($f) => [])) .
')' !!}"

    class="space-y-6"
>

    <template x-for="(entry, index) in entries" :key="index">
        <div class="grid grid-cols-1 md:grid-cols-{{ count($fields) }} gap-4 items-end">
            <template x-for="(field, fieldIndex) in fields" :key="fieldIndex">
                <div>
                    <template x-if="index === 0">
                        <label class="block text-sm font-medium text-gray-700" x-text="field.label + (index < min ? ' *' : '')"></label>
                    </template>
                    <input type="text"
                           class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
                           :name="`${prefix}_${field.name}[${index}]`"
                           x-model="entry[field.name]"
                           :placeholder="index === 0 ? field.placeholder : `${field.label} ${index + 1}`"
                           :required="index < min">
                </div>
            </template>

            <!-- Remove button -->
            <div x-show="index >= min"
                 class="flex justify-end pt-1">
                <button type="button"
                        @click="removeEntry(index)"
                        class="text-red-600 hover:text-red-800 text-lg font-bold">
                        remove
                </button>
            </div>
        </div>
    </template>

    <!-- Add Button -->
    <div>
        <button type="button"
                @click="addEntry"
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 text-sm">
            + Add {{ ucfirst(str_replace('_', ' ', $fieldPrefix)) }}
        </button>
    </div>
</div>