
@php
    $oldJson = old('playground_data', $playgroundData ?? '');
@endphp

<div x-data="playgroundForm()" x-init="initFromStored(@js($oldJson))" class="space-y-4">

    <!-- Playground Type (Checkboxes) -->
    <div>
        <label class="font-semibold">Playground Type (select at least one):</label><br>
        <label><input type="checkbox" value="Indoor" x-model="playground_types" @change="updateJson()" /> Indoor</label>
        <label class="ml-4"><input type="checkbox" value="Outdoor" x-model="playground_types" @change="updateJson()" /> Outdoor</label>
    </div>

    <!-- Indoor Section -->
    <div x-show="playground_types.includes('Indoor')" class="border p-3 rounded">
        <label class="font-semibold">Indoor Equipment:</label><br>
        <template x-for="item in indoorOptions" :key="item">
            <label class="block">
                <input type="checkbox" :value="item" x-model="selectedIndoor" @change="updateJson()" />
                <span x-text="item"></span>
            </label>
        </template>
        <div x-show="selectedIndoor.includes('Others')" class="mt-2">
            <label>Specify Others (Indoor):</label>
            <input type="text" x-model="otherIndoor" @input="updateJson()" class="border p-1 rounded w-full" />
        </div>
    </div>

    <!-- Outdoor Section -->
    <div x-show="playground_types.includes('Outdoor')" class="border p-3 rounded">
        <label class="font-semibold">Outdoor Equipment:</label><br>
        <template x-for="item in outdoorOptions" :key="item">
            <label class="block">
                <input type="checkbox" :value="item" x-model="selectedOutdoor" @change="updateJson()" />
                <span x-text="item"></span>
            </label>
        </template>
        <div x-show="selectedOutdoor.includes('Others')" class="mt-2">
            <label>Specify Others (Outdoor):</label>
            <input type="text" x-model="otherOutdoor" @input="updateJson()" class="border p-1 rounded w-full" />
        </div>
    </div>

    <!-- Hidden JSON Field -->
    <input type="hidden" name="playground_data" :value="jsonValue" />

    @error('playground_data')
        <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    <!-- Debug -->
    <p class="text-sm text-gray-500">JSON Preview: <span x-text="jsonValue"></span></p>
</div>

<script>
function playgroundForm() {
    return {
        playground_types: [], // Now an array: can include "Indoor", "Outdoor"
        selectedIndoor: [],
        selectedOutdoor: [],
        otherIndoor: '',
        otherOutdoor: '',
        jsonValue: '',

        indoorOptions: ['Chess', 'Scrabble', 'Ludo', 'Table Tennis', 'Play mate', 'Others'],
        outdoorOptions: ['Swings', 'Merry-go-round', 'Slide', 'Bouncing castles', 'Sport equipment', 'Others'],

        updateJson() {
            let indoor = this.selectedIndoor.filter(i => i !== 'Others');
            if (this.selectedIndoor.includes('Others') && this.otherIndoor.trim()) {
                indoor.push(this.otherIndoor.trim());
            }

            let outdoor = this.selectedOutdoor.filter(i => i !== 'Others');
            if (this.selectedOutdoor.includes('Others') && this.otherOutdoor.trim()) {
                outdoor.push(this.otherOutdoor.trim());
            }

            this.jsonValue = JSON.stringify({
                playground_types: this.playground_types,
                Indoor_equipments: indoor,
                Outdoor_equipments: outdoor
            });
        },

        initFromStored(stored) {
            if (!stored) return;

            try {
                const parsed = JSON.parse(stored);
                this.playground_types = parsed.playground_types || [];

                for (let item of parsed.Indoor_equipments || []) {
                    if (this.indoorOptions.includes(item)) {
                        this.selectedIndoor.push(item);
                    } else {
                        this.selectedIndoor.push('Others');
                        this.otherIndoor = item;
                    }
                }

                for (let item of parsed.Outdoor_equipments || []) {
                    if (this.outdoorOptions.includes(item)) {
                        this.selectedOutdoor.push(item);
                    } else {
                        this.selectedOutdoor.push('Others');
                        this.otherOutdoor = item;
                    }
                }

                this.updateJson();
            } catch (e) {
                console.error('Invalid JSON', e);
            }
        }
    };
}
</script>
