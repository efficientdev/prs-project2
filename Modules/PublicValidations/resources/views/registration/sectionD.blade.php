<x-publicvalidations::layouts.master>

@extends('publicvalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section D: Infrastructure & Facilities</h1>

<form method="POST" action="{{ route('public.validation.sectionD.store', $form_id) }}" class="space-y-6" x-data>
    @csrf

    @php
        $selects = [
            'water_source' => ['Borehole', 'Tap', 'Well', 'None'],
            'electricity' => ['Yes', 'No'],
            'library' => ['Yes', 'No'],
            'laboratories' => ['Science', 'ICT', 'Home Economics', 'None'],
            'security' => ['Fence', 'Gate', 'Security personnel'],
            'teaching_materials' => ['Yes', 'No'],
        ];
    @endphp

    <div>
        <label class="block font-medium">Number of Classrooms in Use</label>
        <input type="number" name="classrooms_in_use" value="{{ old('classrooms_in_use', $data['classrooms_in_use'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
    </div>

    <div>
        <label class="block font-medium">Classrooms Needing Repairs</label>
        <input type="number" name="classrooms_needing_repairs" value="{{ old('classrooms_needing_repairs', $data['classrooms_needing_repairs'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
    </div>

    <div>
        <label class="block font-medium">Functional Toilets</label>
        <input type="number" name="functional_toilets" value="{{ old('functional_toilets', $data['functional_toilets'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
    </div>

    @foreach ($selects as $key => $options)
        <div>
            <label class="block font-medium capitalize">{{ ucwords(str_replace('_', ' ', $key)) }}</label>
            <select name="{{ $key }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
                @foreach ($options as $opt)
                    <option value="{{ $opt }}" {{ (old($key, $data[$key] ?? '') == $opt) ? 'selected' : '' }}>{{ $opt }}</option>
                @endforeach
            </select>
        </div>
    @endforeach

    <div class="flex justify-between">
        <a href="{{ route('public.validation.sectionC.show', $form_id) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>
</form>
@endsection
</x-publicvalidations::layouts.master>
