@php
$yesNo = ['Yes' => 'Yes', 'No' => 'No'];
@endphp
<!--
<div class="col-md-12"><h5><br><b>PREPARATIONS MADE</b> </h5></div>
-->
<div class="col-md-12"><p><b>Land Information</b></p></div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-2">

    <div>
        <label>Dimension of Premises <b class="text-danger">*</b></label>
        <input 
            autocomplete="off" 
            class="form-input w-full border-gray-300 rounded-md" 
            name="dimension" 
            placeholder="Eg. 300 x 300" 
            required 
            value="{{ old('dimension', $data['dimension'] ?? '') }}" 
        />
    </div>

    <div>
        <label>Permanent Site? <b class="text-danger">*</b></label>
        <x-select-input 
            name="permanent"
            :options="$yesNo"
            :selected="old('permanent', $data['permanent'] ?? 'No')" 
        />
    </div>

    <div>
        <label>Partly Inhabited? <b class="text-danger">*</b></label>
        <x-select-input 
            name="inhabited"
            :options="$yesNo" 
            :selected="old('inhabited', $data['inhabited'] ?? 'No')" 
        />
    </div>

    <div>
        <label>Fenced? <b class="text-danger">*</b></label>
        <x-select-input 
            name="fenced"
            :options="$yesNo" 
            :selected="old('fenced', $data['fenced'] ?? 'No')" 
        />
    </div>

</div>

<div class="col-md-12"><p><b>ACCOMMODATION</b></p></div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <div>
        <label>Number of Classrooms <b class="text-danger">*</b></label>
        <input 
            autocomplete="off" 
            class="form-input w-full border-gray-300 rounded-md" 
            name="classrooms" 
            required 
            type="number" 
            value="{{ old('classrooms', $data['classrooms'] ?? '') }}" 
        >
    </div>
<!--
    <div>
        <label>Number of Offices <b class="text-danger">*</b></label>
        <input 
            autocomplete="off" 
            class="form-input w-full border-gray-300 rounded-md" 
            name="staff_offices" 
            required 
            type="number" 
            value="{{ old('staff_offices', $data['staff_offices'] ?? '') }}" 
        >
    </div>-->

    <div>
        <label>Number of Toilets <b class="text-danger">*</b></label>
        <input 
            autocomplete="off" 
            class="form-input w-full border-gray-300 rounded-md" 
            name="toilets" 
            required 
            type="number" 
            value="{{ old('toilets', $data['toilets'] ?? '') }}" 
        >
    </div>

    <!--<div>
        <label>Number of Stores <b class="text-danger">*</b></label>
        <input 
            autocomplete="off" 
            class="form-input w-full border-gray-300 rounded-md" 
            name="stores" 
            required 
            type="number" 
            value="{{ old('stores', $data['stores'] ?? '') }}" 
        >
    </div>

    <div>
        <label>Number of Laboratories <b class="text-danger">*</b></label>
        <input 
            autocomplete="off" 
            class="form-input w-full border-gray-300 rounded-md" 
            name="labs" 
            required 
            type="number" 
            value="{{ old('labs', $data['labs'] ?? '') }}" 
        >
    </div>

    <div>
        <label>Number of Workshops <b class="text-danger">*</b></label>
        <input 
            autocomplete="off" 
            class="form-input w-full border-gray-300 rounded-md" 
            name="workshops" 
            required 
            type="number" 
            value="{{ old('workshops', $data['workshops'] ?? '') }}" 
        >
    </div>-->

    <div>
        <label>Sick Bay? <b class="text-danger">*</b></label>
        <x-select-input 
            name="sickbay"
            :options="$yesNo" 
            :selected="old('sickbay', $data['sickbay'] ?? 'No')" 
        />
    </div>

    <!--<div>
        <label>Children's Restroom? <b class="text-danger">*</b></label>
        <x-select-input 
            name="childrentoilet" 
            :options="$yesNo" 
            :selected="old('childrentoilet', $data['childrentoilet'] ?? 'No')" 
        />
    </div>-->

</div>

<div  >
    <label>Other Facilities (please specify) </label>
    @php
    $rn='Head teacher office, staff room, Library, Exam Hall, Security Post, Kitchen, Workshop, Laboratory, ICT, School Garden';
    $other_facilities=explode(',',$rn);
    @endphp
    <div class="grid grid-cols-4 items-center gap-4">
        @foreach($other_facilities as $facility)
            <div class="flex items-center gap-2">
                <input 
                    type="checkbox"
                    name="other_facilities[]"
                    value="{{ $facility }}"
                    class="form-checkbox text-indigo-600 border-gray-300 rounded"
                    {{ in_array($facility, old('other_facilities', $data['other_facilities'] ?? [])) ? 'checked' : '' }}
                >
                <div>{{ $facility }}</div>
            </div>
        @endforeach
    </div>


    <!--<input 
        autocomplete="off" 
        class="form-input w-full border-gray-300 rounded-md" 
        name="other_facilities" 
        value="{{ old('other_facilities', $data['other_facilities'] ?? '') }}" 
    >-->
</div>

<div class="col-md-12"><p><b>PLAYGROUND</b></p></div>

<div class="grid grid-cols-1 md:grid-cols-4 gap-1">

    <!--<div>
        <label>Indoor Playground? <b class="text-danger">*</b></label>
        <x-select-input 
            name="play_indoor"
            :options="$yesNo" 
            :selected="old('play_indoor', $data['play_indoor'] ?? 'No')" 
        />
    </div>

    <div>
        <label>Playground Dimension</label>
        <input 
            autocomplete="off" 
            class="form-input w-full border-gray-300 rounded-md" 
            name="play_indoor_size" 
            placeholder="Eg. 15 m2" 
            value="{{ old('play_indoor_size', $data['play_indoor_size'] ?? '') }}" 
        >
    </div> 

    <div>
        <label>Outdoor Playground? <b class="text-danger">*</b></label>
        <x-select-input 
            name="play_outdoor"
            :options="$yesNo" 
            :selected="old('play_outdoor', $data['play_outdoor'] ?? 'No')" 
        />
    </div>

     <div>
        <label>Playground Dimension</label>
        <input 
            autocomplete="off" 
            class="form-input w-full border-gray-300 rounded-md" 
            name="play_outdoor_size" 
            placeholder="Eg. 5 m2" 
            value="{{ old('play_outdoor_size', $data['play_outdoor_size'] ?? '') }}" 
        >
    </div>-->

</div>
