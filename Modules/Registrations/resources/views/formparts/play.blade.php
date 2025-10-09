
<div x-data="playEquipmentForm()" class="space-y-4">
    <template x-for="(play_equipment, index) in play_equipments" :key="index">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div  >
                <template x-if="index === 0">
                    <label class="block text-sm font-medium text-gray-700">
                         Play Equipment Name <b class="text-red-600">*</b>
                    </label>
                </template>
                <input
                    type="text"
                    :name="`play_equipment[${index + 1}]`"
                    :placeholder="`Play Equipment ${index + 1}`"
                    x-model="play_equipment.name"
                    class="form-input w-full mt-1 block border-gray-300 rounded-md"
                    :required="index < 2"
                />
            </div>
            <div  >
                <template x-if="index === 0">
                    <label class="block text-sm font-medium text-gray-700">
                         Play Equipment Qty <b class="text-red-600">*</b>
                    </label>
                </template>
                <input
                    type="text"
                    :name="`play_equipment_qty[${index + 1}]`"
                    :placeholder="`Play Equipment ${index + 1} play_equipment_qty`"
                    x-model="play_equipment.play_equipment_qty"
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
            @click="addPlayEquipment"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
        >+ Add Another PlayEquipment</button>

        <button
            type="button"
            @click="removePlayEquipment"
            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700"
            x-show="play_equipments.length > 1"
        >− Remove</button>
    </div>
</div>

<!-- Alpine.js Component -->
<script>
    function playEquipmentForm() {
        return {
            play_equipments: [
            @php
                $surnames = old('play_equipment',$data['play_equipment']?? []);
                $otherNames = old('play_equipment_qty', $data['play_equipment_qty']?? []); 
                $count = max(count($surnames), count($otherNames) , 1);

                for ($i = 0; $i < $count; $i++) {
                    echo json_encode([
                        'name' => $surnames[$i+1] ?? '',
                        'play_equipment_qty' => $otherNames[$i+1] ?? '', 
                    ]);

                    if ($i < $count - 1) {
                        echo ',';
                    }
                }
            @endphp
        ],
            play_equipments2: [
                {
                    name: '{{ old("play_equipment.1") }}',
                    play_equipment_qty: '{{ old("play_equipment_qty.1") }}',
                },
            ],
            addPlayEquipment() {
                this.play_equipments.push({ name: '', play_equipment_qty: '' });
            },
            removePlayEquipment() {
                if (this.play_equipments.length > 1) {
                    this.play_equipments.pop();
                }
            }
        }
    }
</script>
