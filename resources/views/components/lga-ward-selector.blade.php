@props([
    'namePrefix' => '' // Optional: for nested forms (e.g. user[lga_id])
])

@php
    $wardJson = $wards->toJson();
    $selectedLgaId = $selectedLgaId ?? '';
    $selectedWardId = $selectedWardId ?? '';
@endphp
<!--
git remote set-url origin https://github.com/yourusername/new-repo-name.git

	git remote set-url origin git@github.com:efficientdev/prs-project2.git
	
    x-data="lgaWardComponent({!! $wardJson !!}, '{{ $selectedLgaId }}', '{{ $selectedWardId }}')"
    x-init="init()"
<div 
    x-data="lgaWardComponent()" 
    x-init="setup({!! $wardJson !!}, '{{ $selectedLgaId }}', '{{ $selectedWardId }}')"
    
    class="grid grid-cols-1 md:grid-cols-2 gap-4"
>-->
<div 
    x-data="lgaWardComponent()"
    x-init="setup($el.dataset)"
    data-wards='@json($wards)'
    data-selected-lga-id="{{ old('lga_id', $selectedLgaId) }}"
    data-selected-ward-id="{{ old('ward_id', $selectedWardId) }}"
    class="grid grid-cols-1 md:grid-cols-2 gap-4"
>
    <!-- LGA Dropdown -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Select LGA</label>
        <!--name="{{ $namePrefix ? $namePrefix . '[lga_id]' : 'lga_id' }}"-->
        <select 
            x-model="selectedLga" 
            @change="updateWards"
            
            name="{{ $namePrefix ? $namePrefix . '_lga_id' : 'lga_id' }}"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            required
        >
            <option value="">-- Choose LGA --</option>
            <template x-for="(name, id) in lgas" :key="id">
                <option :value="id" x-text="name" :selected="id == selectedLga"></option>
            </template>
        </select>
    </div>

    <!-- Ward Dropdown name="{{ $namePrefix ? $namePrefix . '[ward_id]' : 'ward_id' }}"
             -->
    <div>
        <label class="block text-sm font-medium text-gray-700">Select Ward</label>
        <select 
            x-model="selectedWard" 
            name="{{ $namePrefix ? $namePrefix . '_ward_id' : 'ward_id' }}"
            
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"
            :disabled="!filteredWards.length"
            required
        >
            <option value="">-- Choose Ward --</option>
            <template x-for="ward in filteredWards" :key="ward.ward_id">
                <option :value="ward.ward_id" x-text="ward.ward_name + ' (' + ward.ward_no + ')'"></option>
            </template>
        </select>
    </div>
</div>

<script>
	function lgaWardComponent() {
    return {
        wardData: [],
        selectedLga: '',
        selectedWard: '',
        lgas: {},
        filteredWards: [],

        setup(dataset) {
            this.wardData = JSON.parse(dataset.wards || '[]');
            this.selectedLga = dataset.selectedLgaId || '';
            this.selectedWard = dataset.selectedWardId || '';

            // Extract LGAs
            this.lgas = this.wardData.reduce((acc, item) => {
                acc[item.lga_id] = item.lga_name;
                return acc;
            }, {});

            this.updateWards();
        },

        updateWards() {
            this.filteredWards = this.wardData.filter(
                ward => ward.lga_id == this.selectedLga
            );

            // Reset ward if not in filtered list
            if (!this.filteredWards.find(w => w.ward_id == this.selectedWard)) {
                this.selectedWard = '';
            }
        }
    };
}
function lgaWardComponent3() {
    return {
        wardData: [],
        selectedLga: '',
        selectedWard: '',
        lgas: {},
        filteredWards: [],

        setup(data, selectedLgaId, selectedWardId) {
            this.wardData = data;
            this.selectedLga = selectedLgaId;
            this.selectedWard = selectedWardId;

            // Extract unique LGAs
            this.lgas = this.wardData.reduce((acc, item) => {
                acc[item.lga_id] = item.lga_name;
                return acc;
            }, {});

            this.updateWards();
        },

        updateWards() {
            this.filteredWards = this.wardData.filter(
                ward => ward.lga_id == this.selectedLga
            );

            // Ensure selected ward belongs to current LGA
            if (!this.filteredWards.find(w => w.ward_id == this.selectedWard)) {
                this.selectedWard = '';
            }
        }
    }
} 

function lgaWardComponent2(wardData, selectedLgaId, selectedWardId) {
    return {
        wardData: wardData,
        selectedLga: selectedLgaId,
        selectedWard: selectedWardId,
        lgas: {},
        filteredWards: [],

        init() {
            // Group LGAs
            this.lgas = wardData.reduce((acc, ward) => {
                acc[ward.lga_id] = ward.lga_name;
                return acc;
            }, {});

            // Preload filtered wards if editing
            if (this.selectedLga) {
                this.updateWards();
            }
        },

        updateWards() {
            this.filteredWards = this.wardData.filter(
                ward => ward.lga_id == this.selectedLga
            );

            // Clear ward if it doesn't belong to selected LGA
            if (!this.filteredWards.find(w => w.ward_id == this.selectedWard)) {
                this.selectedWard = '';
            }
        }
    }
}
</script>
