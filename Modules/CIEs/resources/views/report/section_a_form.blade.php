<x-cies::layouts.master>

<h1 class="text-2xl font-bold mb-6">Section A: General Information</h1>

@php
$data=$sectionA;
@endphp

<div class="grid grid-cols-2 gap-3 capitalize">
<div><label>proprietor phone number</label><br/>
{{$proprietorSectionA['phone_number']}}
</div>
<div><label>school address</label><br/>
{{$proprietorSectionA['school_address']}}
</div></div>

<form method="POST" action="{{ route('cies.sectionA.store', $report->id) }}">
    @csrf

    <!--<div class="mb-4">
        <label>Report Title</label>
        <input type="text" name="report_title" value="{{ old('report_title', $data['report_title'] ?? '') }}" class="border p-2 w-full">
    </div>

    <div class="mb-4">
        <label>Reporting Period</label>
        <input type="text" name="reporting_period" value="{{ old('reporting_period', $data['reporting_period'] ?? '') }}" class="border p-2 w-full">
    </div>-->
    <div class="mb-4">
        <label>Date of Inspection</label>
        <input type="date" name="date_of_inspection" value="{{ old('date_of_inspection', $data['date_of_inspection'] ?? '') }}" class="border p-2 w-full">
    </div>

    

    <div class="mb-4">
        <label>School Name</label>
        <input type="text" name="school_name" value="{{ old('school_name', $data['school_name'] ?? $proprietorSectionA['proposed_name']) }}" class="border p-2 w-full">
    </div>

    <!--<div class="mb-4">
        <label>Approval Number</label>
        <input type="text" name="approval_number" value="{{ old('approval_number', $data['approval_number'] ?? '') }}" class="border p-2 w-full">
    </div>-->

    <!--<div class="mb-4">
        <label>Category</label>
        <select name="category" class="border p-2 w-full">
            @foreach(['Nursery', 'Primary', 'JSS', 'SSS', 'Combined'] as $option)
                <option value="{{ $option }}" @if(($data['category'] ?? '') == $option) selected @endif>{{ $option }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label>Category <b class="text-danger">*</b></label>
        <x-select-input 
            name='category_id'
            :options="$categories" 
            :selected="old('category_id', $data['category_id'] ?? '')" 
        />
    </div>-->

    <!--<div class="mb-4">
        <label>LGA</label>
        <input type="text" name="lga" value="{{ old('lga', $data['lga'] ?? '') }}" class="border p-2 w-full">
    </div>
    <div>
        <label>LGA <b class="text-danger">*</b></label>
        <x-select-input 
            name='lga_id'
            :options="$lgas" 
            :selected="old('lga_id', $data['lga_id'] ?? '')" 
        />
    </div>-->


<x-lga-ward-selector  :selectedLgaId="old('lga_id', $data['lga_id'] ?? '')" :selectedWardId="old('ward_id', $data['ward_id'] ?? '')"  />

<div class="mb-4"></div>
    <!--<div class="mb-4">
        <label>Zonal Education Office</label>
        <input type="text" name="zonal_office" value="{{ old('zonal_office', $data['zonal_office'] ?? '') }}" class="border p-2 w-full">
    </div>-->


    <div class="flex justify-between">
        <a href="#" class="btn bg-gray-400 text-white px-6 py-2 rounded">Cancel</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>
</form>

</x-cies::layouts.master>
