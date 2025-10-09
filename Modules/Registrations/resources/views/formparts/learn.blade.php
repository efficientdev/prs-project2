
<div x-data="learningEquipmentForm()" class="space-y-4">
    <template x-for="(learning_equipment, index) in learning_equipments" :key="index">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div  >
                <template x-if="index === 0">
                    <label class="block text-sm font-medium text-gray-700">
                         Learning Equipment Name <b class="text-red-600">*</b>
                    </label>
                </template>
                <input
                    type="text"
                    :name="`learning_equipment[${index + 1}]`"
                    :placeholder="`Learning Equipment ${index + 1}`"
                    x-model="learning_equipment.name"
                    class="form-input w-full mt-1 block border-gray-300 rounded-md"
                    :required="index < 2"
                />
            </div>
            <div  >
                <template x-if="index === 0">
                    <label class="block text-sm font-medium text-gray-700">
                         Learning Equipment Qty <b class="text-red-600">*</b>
                    </label>
                </template>
                <input
                    type="text"
                    :name="`learning_equipment_qty[${index + 1}]`"
                    :placeholder="`Learning Equipment ${index + 1} learning_equipment_qty`"
                    x-model="learning_equipment.learning_equipment_qty"
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
            @click="addLearningEquipment"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >+ Add Another LearningEquipment</button>

        <button
            type="button"
            @click="removeLearningEquipment"
            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
            x-show="learning_equipments.length > 1"
        >− Remove</button>
    </div>
</div>

<!-- Alpine.js Component -->
<script>
    function learningEquipmentForm() {
        return {
            learning_equipments: [
            @php
                $surnames = old('learning_equipment',$data['learning_equipment']?? []);
                $otherNames = old('learning_equipment_qty', $data['learning_equipment_qty']?? []); 
                $count = max(count($surnames), count($otherNames) , 1);

                for ($i = 0; $i < $count; $i++) {
                    echo json_encode([
                        'name' => $surnames[$i+1] ?? '',
                        'learning_equipment_qty' => $otherNames[$i+1] ?? '', 
                    ]);

                    if ($i < $count - 1) {
                        echo ',';
                    }
                }
            @endphp
        ],
            learning_equipments2: [
                {
                    name: '{{ old("learning_equipment.1") }}',
                    learning_equipment_qty: '{{ old("learning_equipment_qty.1") }}',
                },
            ],
            addLearningEquipment() {
                this.learning_equipments.push({ name: '', learning_equipment_qty: '' });
            },
            removeLearningEquipment() {
                if (this.learning_equipments.length > 1) {
                    this.learning_equipments.pop();
                }
            }
        }
    }
</script>
