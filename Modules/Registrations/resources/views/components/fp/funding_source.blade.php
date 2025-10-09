
<div x-data="fundingSourceComponent()" x-init="initFromStored()">
    <label for="funding_source">Funding Source:</label>
    <select id="funding_source" x-model="selected" @change="updateValue()" class="form-input w-full mt-1 block border-gray-300 rounded-md">
        <option value="">-- Select One --</option>
        <option value="Personal savings">Personal savings</option>
        <option value="Bank loans">Bank loans</option>
        <option value="School fees">School fees</option>
        <option value="Investors">Investors</option>
        <option value="Other">Others (specify)</option>
    </select>

    <!-- Custom input field if "Other" is selected -->
    <div x-show="selected === 'Other'" class="mt-2">
        <label for="custom_input">Please specify:</label>
        <input type="text" id="custom_input" x-model="custom" @input="updateValue()" placeholder="Enter other source..." class="form-input w-full mt-1 block border-gray-300 rounded-md" />
    </div>

    <!-- Hidden field that stores JSON to send to backend -->
    <input type="hidden" name="funding_source" x-model="jsonValue" />

    <!-- Display stored JSON as text (for preview)
    <p class="mt-4 text-sm text-gray-600">Stored value: <span x-text="jsonValue"></span></p> -->
</div>

<script>
function fundingSourceComponent() {
    return {
        selected: '',     // dropdown value
        custom: '',       // custom input value
        jsonValue: '',    // JSON string to store

        // Called on init (e.g. on page reload)
        initFromStored() {
             //''
            // Simulate previously stored JSON (from DB or hidden input)
            let stored = '{{ old("funding_source", $data['funding_source'] ?? '{"type":"Bank loans"}') }}';

            try {
                let parsed = JSON.parse(stored);
                this.selected = ['Personal savings', 'Bank loans', 'School fees', 'Investors'].includes(parsed.type) ? parsed.type : 'Other';
                this.custom = this.selected === 'Other' ? parsed.type : '';
                this.updateValue();
            } catch (e) {
                console.error('Failed to parse stored JSON', e);
            }
        },

        updateValue() {
            let type = this.selected === 'Other' ? this.custom : this.selected;
            this.jsonValue = JSON.stringify({ type: type });
        }
    };
}
</script>
