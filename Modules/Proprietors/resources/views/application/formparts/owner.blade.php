<div class="grid grid-cols-1 md:grid-cols-2 gap-2">

<div  > 
    <label class="block text-sm font-medium text-gray-700">
         Residential Address <b class="text-red-600">*</b>
    </label> 
    <textarea
    type="text" name="owner_address" 
    class="form-input w-full mt-1 block border-gray-300 rounded-md"
    required placeholder="Eg. No. 1 Elizabeth Avenue, Off Major Road, Township, Benin City" >{{old('owner_address')}}</textarea> 
</div>

<div  > 
    <label class="block text-sm font-medium text-gray-700">
         Qualifications &amp; Dates <b class="text-danger">*</b>
    </label> 
<textarea class="form-input w-full mt-1 block border-gray-300 rounded-md"
     name="owner_qualifications" placeholder="Eg. B.Sc Geography (1994), M.Sc Geography (2001)" required="required">{{old('owner_qualifications')}}</textarea>
</div>


<div  >
	<label>Local Government Area <b class="text-danger">*</b></label>
	<x-select-input name='owner_address_lga'
:options="$lgas" 
:selected="old('owner_address_lga')" />
</div>

<div  >
	<label>City <b class="text-danger">*</b></label>
	<x-select-input name='owner_address_city'
:options="$cities" 
:selected="old('owner_address_city')" />
</div>


</div>