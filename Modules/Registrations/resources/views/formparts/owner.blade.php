<div class="col-md-12">
    <h5><br><b>OWNER INFORMATION</b><br></h5>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-2">

    <!-- Residential Address -->
     <div> 
        <label class="block text-sm font-medium text-gray-700">
            Name  
        </label> 
        <input type="disabled"  value={{auth()->user()->name}}>
    </div>

     <div> 
        <label class="block text-sm font-medium text-gray-700">
            Email  
        </label> 
        <input type="disabled"  value={{auth()->user()->email}}>
    </div>
    <div> 
        <label class="block text-sm font-medium text-gray-700">
            Residential Address <b class="text-red-600">*</b>
        </label> 
        <textarea
            name="owner_address" 
            class="form-input w-full mt-1 block border-gray-300 rounded-md"
            required
            placeholder="Eg. No. 1 Elizabeth Avenue, Off Major Road, Township, Benin City"
        >{{ old('owner_address', $data['owner_address'] ?? '') }}</textarea> 
    </div>

    <!-- Qualifications & Dates -->
    <div> 
        <label class="block text-sm font-medium text-gray-700">
            Qualifications &amp; Dates <b class="text-danger">*</b>
        </label> 
        <textarea 
            class="form-input w-full mt-1 block border-gray-300 rounded-md"
            name="owner_qualifications" 
            placeholder="Eg. B.Sc Geography (1994), M.Sc Geography (2001)" 
            required
        >{{ old('owner_qualifications', $data['owner_qualifications'] ?? '') }}</textarea>
    </div>

    <!-- Local Government Area -->
    <div>
        <label>Local Government Area <b class="text-danger">*</b></label>
        <x-select-input 
            name='owner_address_lga'
            :options="$lgas" 
            :selected="old('owner_address_lga', $data['owner_address_lga'] ?? '')" 
        />
    </div>

    <!-- Ward -->
    <div>
        <label>Ward <b class="text-danger">*</b></label>
        <x-select-input 
            name='owner_ward_id'
            :options="$wards" 
            :selected="old('owner_ward_id', $data['owner_ward_id'] ?? '')" 
        />
    </div>
    <!-- City 
    <div>
        <label>City <b class="text-danger">*</b></label>
        <x-select-input 
            name='owner_address_city'
            :options="$cities" 
            :selected="old('owner_address_city', $data['owner_address_city'] ?? '')" 
        />
    </div>-->

</div>
