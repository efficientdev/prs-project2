
<div class="col-md-12"><h5><br><b>FUNDING</b><br></h5></div>
<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
<div >
	<label>Funding Source(s) <b class="text-danger">*</b></label>
	<input autocomplete="off" class="form-input w-full mt-1 block border-gray-300 rounded-md" name="funding_source" placeholder="Eg. Bank loan, foreign investor" required="required" value="{{old('funding_source')}}">
</div>
<div >
	<label>Capital Available <b class="text-danger">*</b></label>
	<input autocomplete="off" class="form-input w-full mt-1 block border-gray-300 rounded-md" name="funding_capital" placeholder="Eg. 22 million naira" required="required" value="{{old('funding_capital')}}">
</div></div>

<div class="col-md-12"><h5><br><b>SCHOOL INFORMATION</b><br></h5></div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-2">
<div  > 
    <label class="block text-sm font-medium text-gray-700">
         Proposed Name of School <b class="text-danger">*</b>
    </label>  
					<input autocomplete="off" class="form-input w-full mt-1 block border-gray-300 rounded-md" name="proposed_name" required="required" value="{{old('proposed_name')}}">
</div>


<div  >
	<label>school sector <b class="text-danger">*</b></label>
	<x-select-input name='school_sector_id'
:options="$school_sectors" 
:selected="old('school_sector_id')" />
</div>

<div  >
	<label>Local Government Area <b class="text-danger">*</b></label>
	<x-select-input name='school_address_lga'
:options="$lgas" 
:selected="old('school_address_lga')" />
</div>

<div  >
	<label>City <b class="text-danger">*</b></label>
	<x-select-input name='school_address_city'
:options="$cities" 
:selected="old('school_address_city')" />
</div>


				<div >
					<label>Actual Location of School <b class="text-danger">*</b></label>
					<textarea class="form-input w-full mt-1 block border-gray-300 rounded-md" name="school_location" placeholder="Please enter: Name of street, quarters and village/town" required="required">{{old('school_location')}}</textarea>
				</div>
				<div >
					<label>Postal Address</label>
					<textarea class="form-input w-full mt-1 block border-gray-300 rounded-md" name="postal_address" placeholder="If different from school address">{{old('postal_address')}}</textarea>
				</div>
				<div class="form-group col-md-12">
					<label>Purpose of Establishment <b class="text-danger">*</b></label>
					<textarea class="form-input w-full mt-1 block border-gray-300 rounded-md" name="purpose_for_establishment" required="required">{{old('purpose_for_establishment')}}</textarea>
				</div>


</div>