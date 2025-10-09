<!-- FUNDING -->
<div class="col-md-12">
    <h5><br><b>FUNDING</b><br></h5>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-2">

    @include('registrations::components.fp.funding_source')
    <!-- Funding Source(s) 
    <div>
        <label>Funding Source(s) <b class="text-danger">*</b></label>
        <input 
            autocomplete="off" 
            class="form-input w-full mt-1 block border-gray-300 rounded-md" 
            name="funding_source" 
            placeholder="Eg. Bank loan, foreign investor" 
            required 
            value="{{ old('funding_source', $data['funding_source'] ?? '') }}"
        >
    </div>-->

    <!-- Capital Available 
    <div>
        <label>Capital Available <b class="text-danger">*</b></label>
        <input 
            autocomplete="off" 
            class="form-input w-full mt-1 block border-gray-300 rounded-md" 
            name="funding_capital" 
            placeholder="Eg. 22 million naira" 
            required 
            value="{{ old('funding_capital', $data['funding_capital'] ?? '') }}"
        >
    </div>-->

</div>

<!-- SCHOOL INFORMATION -->
<div class="col-md-12">
    <h5><br><b>SCHOOL INFORMATION</b><br></h5>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-2">

    <!-- Proposed Name of School -->
    <div> 
        <label class="block text-sm font-medium text-gray-700">
            Proposed Name of School <b class="text-danger">*</b>
        </label>  
        <input 
            autocomplete="off" 
            class="form-input w-full mt-1 block border-gray-300 rounded-md" 
            name="proposed_name" 
            required 
            value="{{ old('proposed_name', $data['proposed_name'] ?? '') }}"
        >
    </div>

    <!-- School Sector -->
    <div>
        <label>School Sector <b class="text-danger">*</b></label>
        <x-select-input 
            name="school_sector_id"
            :options="$school_sectors" 
            :selected="old('school_sector_id', $data['school_sector_id'] ?? '')" 
        />
    </div>
 

    <!-- School LGA -->
    <div>
        <label>Local Government Area <b class="text-danger">*</b></label>
        <x-select-input 
            name="school_address_lga"
            :options="$lgas" 
            :selected="old('school_address_lga', $data['school_address_lga'] ?? '')" 
        />
    </div>

    <!-- Ward -->
    <div>
        <label>Ward <b class="text-danger">*</b></label>
        <x-select-input 
            name='school_ward_id'
            :options="$wards" 
            :selected="old('school_ward_id', $data['school_ward_id'] ?? '')" 
        />
    </div>
    <!-- School City 
    <div>
        <label>City <b class="text-danger">*</b></label>
        <x-select-input 
            name="school_address_city"
            :options="$cities" 
            :selected="old('school_address_city', $data['school_address_city'] ?? '')" 
        />
    </div>-->

    <!-- Actual Location of School -->
    <div>
        <label>School Address <b class="text-danger">*</b></label>
        <textarea 
            class="form-input w-full mt-1 block border-gray-300 rounded-md" 
            name="school_address" 
            placeholder="Please enter: Name of street, quarters and village/town" 
            required
        >{{ old('school_address', $data['school_address'] ?? '') }}</textarea>
    </div>

    <!-- Postal Address
    <div>
        <label>Postal Address</label>
        <textarea 
            class="w-full mt-1 block border-gray-300 rounded-md" 
            name="postal_address" 
            placeholder="If different from school address"
        >{{ old('postal_address', $data['postal_address'] ?? '') }}</textarea>
    </div> -->

    <!-- Purpose of Establishment -->
    <div>
        <label>Purpose of Establishment <b class="text-danger">*</b></label>
        <textarea 
            class="w-full mt-1 block border-gray-300 rounded-md" 
            name="purpose_for_establishment" 
            required
        >{{ old('purpose_for_establishment', $data['purpose_for_establishment'] ?? '') }}</textarea>
    </div>

</div>
