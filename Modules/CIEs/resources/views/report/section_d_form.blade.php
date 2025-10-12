<x-cies::layouts.master>
@php
//$data=$sectionD;
@endphp
<form method="POST" action="{{ route('cies.sectionD.store', $report->id) }}">
    @csrf

    <h2 class="text-lg font-bold mb-4">Section D: Infrastructure & Facilities</h2>

    <div class="mb-4">
        <label>Number of classrooms in use</label>
        <input type="number" name="classrooms_in_use" value="{{ old('classrooms_in_use', $data['classrooms_in_use'] ?? '') }}" class="w-full border p-2">
    </div>
    <div class="mb-4">
        <label>Class Dimension in feet</label>
        <input type="number" name="class_dimension_in_feet" value="{{ old('class_dimension_in_feet', $data['class_dimension_in_feet'] ?? '') }}" class="w-full border p-2">
    </div>

    <div class="mb-4 capitalize">
        <label>Average class size (number of students)</label>
        <input type="number" name="average_class_size" value="{{ old('average_class_size', $data['average_class_size'] ?? '') }}" class="w-full border p-2">
    </div>

    <div class="mb-4">
        <label>Number of functional toilets</label>
        <input type="number" name="functional_toilets" value="{{ old('functional_toilets', $data['functional_toilets'] ?? '') }}" class="w-full border p-2">
    </div>

    <div class="mb-4">
        <label>Library</label>
        <select name="library" class="w-full border p-2">
            <option value="Yes" {{ (old('library', $data['library'] ?? '') == 'Yes') ? 'selected' : '' }}>Yes</option>
            <option value="No" {{ (old('library', $data['library'] ?? '') == 'No') ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="mb-4">
        <label>Laboratories</label>
        @php
            $labs = old('laboratories', $data['laboratories'] ?? []);
            //, 'Others'
        @endphp
        <div class="space-y-2">
            @foreach(['Science', 'ICT', 'Home Economics'] as $lab)
                <label>
                    <input type="checkbox" name="laboratories[]" value="{{ $lab }}" {{ in_array($lab, $labs) ? 'checked' : '' }}> {{ $lab }}
                </label>
            @endforeach
        </div>
    </div>
    
    @include('cies::components.other-labs')

    <div class="mb-4">
        <label>Electricity</label>
        <select name="electricity" class="w-full border p-2">
            <option value="Yes" {{ (old('electricity', $data['electricity'] ?? '') == 'Yes') ? 'selected' : '' }}>Yes</option>
            <option value="No" {{ (old('electricity', $data['electricity'] ?? '') == 'No') ? 'selected' : '' }}>No</option>
        </select>
    </div>

    <div class="mb-4">
        <label>Water Supply</label>
        <select name="water_supply" class="w-full border p-2">
            @foreach(['Borehole', 'Well', 'None'] as $water)
                <option value="{{ $water }}" {{ (old('water_supply', $data['water_supply'] ?? '') == $water) ? 'selected' : '' }}>{{ $water }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-4">
        <label>Security</label>
        @php
            $security = old('security', $data['security'] ?? []);
        @endphp
        <div class="space-y-2">
            @foreach(['Fence', 'Gate', 'Security personnel'] as $item)
                <label>
                    <input type="checkbox" name="security[]" value="{{ $item }}" {{ in_array($item, $security) ? 'checked' : '' }}> {{ $item }}
                </label>
            @endforeach
        </div>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('cies.sectionC.show', $report->id) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>
</form></x-cies::layouts.master>
