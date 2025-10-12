<!-- resources/views/components/other-labs.blade.php -->
<div x-data="otherLabsComponent()" class="space-y-2">
    <!-- Checkbox -->
    <label class="flex items-center space-x-2">
        <input type="checkbox" x-model="enabled" class="form-checkbox">
        <span>Other Labs</span>
    </label>

    <!-- Input & List -->
    <template x-if="enabled">
        <div class="space-y-2">
            <!-- Input Field -->
            <input
                x-model="newLab"
                @keydown.enter.prevent="addLab"
                type="text"
                class="form-input w-full"
                placeholder="Type and press Enter to add"
            />

            <!-- Labs List -->
            <template x-for="(lab, index) in labs" :key="index">
                <div class="flex items-center space-x-2">
                    <!-- Hidden input for submission -->
                    <input type="hidden" :name="'other_labs[' + index + ']'" :value="lab">

                    <!-- Editable Text -->
                    <input
                        type="text"
                        x-model="labs[index]"
                        class="form-input w-full"
                    />

                    <!-- Delete Button -->
                    <button type="button" @click="removeLab(index)" class="text-red-500 hover:text-red-700">
                        &times;
                    </button>
                </div>
            </template>
        </div>
    </template>
</div>

<script>
    function otherLabsComponent() {
        return {
            enabled: @json(old('other_labs') ? true : false),
            newLab: '',
            labs: @json(old('other_labs', [])),
            addLab() {
                const value = this.newLab.trim();
                if (value) {
                    this.labs.push(value);
                    this.newLab = '';
                }
            },
            removeLab(index) {
                this.labs.splice(index, 1);
            }
        }
    }
</script>
