@php
$yesNo=['Yes'=>'Yes','No'=>'No'];
@endphp
<div class="col-md-12"><h5><br><b>PREPARATIONS MADE</b><hr></h5></div>
<div class="col-md-12"><p><b>PREMISES</b></p></div>
<div class="grid grid-cols-1  md:grid-cols-2 gap-2  "> 
<div  >
	<label>Dimension of Premises <b class="text-danger">*</b></label>
	<input autocomplete="off" class="form-input w-full  border-gray-300 rounded-md" name="dimension" placeholder="Eg. 300 x 300" required="required" value="{{old('dimension')}}" />
</div>
<div  >
	<label>Permanent Site? <b class="text-danger">*</b></label>
	<x-select-input name='permanent'
:options="$yesNo" 
:selected="old('permanent')?old('permanent'):'No'" />
</div>
 

<div  >
	<label>Partly Inhabited? <b class="text-danger">*</b></label>
	<x-select-input
    name='inhabited'
:options="$yesNo" 
:selected="old('inhabited')?old('inhabited'):'No'" />
</div>
<div  >
	<label>Fenced? <b class="text-danger">*</b></label>
	<x-select-input
    name='fenced'
:options="$yesNo" 
:selected="old('fenced')?old('fenced'):'No'" />
</div>
</div>

<div class="col-md-12"><p><b>ACCOMMODATION</b></p></div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4"> 
<div  >
	<label>Number of Classrooms <b class="text-danger">*</b></label>
	<input autocomplete="off" class="form-input w-full  border-gray-300 rounded-md" name="classrooms" required="required" type="number" value="{{old('classrooms')}}">
</div>
<div  >
	<label>Number of Offices <b class="text-danger">*</b></label>
	<input autocomplete="off" class="form-input w-full  border-gray-300 rounded-md" name="staff_offices" required="required" type="number" value="{{old('staff_offices')}}">
</div>
<div  >
	<label>Number of Toilets <b class="text-danger">*</b></label>
	<input autocomplete="off" class="form-input w-full  border-gray-300 rounded-md" name="toilets" required="required" type="number" value="{{old('toilets')}}">
</div>
<div  >
	<label>Number of Stores <b class="text-danger">*</b></label>
	<input autocomplete="off" class="form-input w-full  border-gray-300 rounded-md" name="stores" required="required" type="number" value="{{old('stores')}}">
</div>
 


<div  >
	<label>Number of Laboratories <b class="text-danger">*</b></label>
	<input autocomplete="off" class="form-input w-full  border-gray-300 rounded-md" name="labs" required="required" type="number" value="{{old('labs')}}">
</div>
<div  >
	<label>Number of Workshops <b class="text-danger">*</b></label>
	<input autocomplete="off" class="form-input w-full  border-gray-300 rounded-md" name="workshops" required="required" type="number" value="{{old('workshops')}}">
</div>




<div >
	<label>Sick Bay? <b class="text-danger">*</b></label>
	<x-select-input
    name='sickbay'
:options="$yesNo" 
:selected="old('sickbay')?old('sickbay'):'No'" />
</div>
<div >
	<label>Children's Restroom? <b class="text-danger">*</b></label>
	<x-select-input name='childrentoilet' :options="$yesNo" 
:selected="old('childrentoilet')?old('childrentoilet'):'No'" />
</div>
</div>
<div class="form-group col-md-8">
	<label>Other Facilities (please specify) </label>
	<input autocomplete="off" class="form-input w-full  border-gray-300 rounded-md" name="other_facilities" value="{{old('other_facilities')}}">
</div>

<div class="col-md-12"><p><b>PLAYGROUND</b></p></div>

<div class="grid grid-cols-1  md:grid-cols-4 gap-1 "> 
<div >
	<label>Indoor Playground? <b class="text-danger">*</b></label>
	<x-select-input
    name='play_indoor'
:options="$yesNo" 
:selected="old('play_indoor')?old('play_indoor'):'No'" />
</div>
<div >
	<label>Playground Dimension</label>
	<input autocomplete="off" class="form-input w-full  border-gray-300 rounded-md" name="play_indoor_size" placeholder="Eg. 15 m2" value="{{old('play_indoor_size')}}">
</div>
<div >
	<label>Outdoor Playground? <b class="text-danger">*</b></label>
	<x-select-input
    name='play_outdoor'
:options="$yesNo" 
:selected="old('play_outdoor')?old('play_outdoor'):'No'" />
</div>
<div >
	<label>Playground Dimension</label>
	<input autocomplete="off" class="form-input w-full  border-gray-300 rounded-md" name="play_outdoor_size" placeholder="Eg. 5 m2	" value="{{old('play_outdoor_size')}}">
</div>

</div>