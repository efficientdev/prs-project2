<x-publicvalidations::layouts.master>

@extends('publicvalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section A: School Identification</h1>

<form method="POST" action="{{ route('public.validation.sectionA.store', $form_id) }}" class="space-y-6" x-data enctype="multipart/form-data"   >
    @csrf

    <div>
        <label class="block font-medium">School Name</label>
        <input type="text" name="school_name" value="{{ old('school_name', $data['school_name'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
        @error('school_name') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>


    <div>
        <label class="block font-medium">School ID</label>
        <input type="text" name="school_id" value="{{ old('school_id', $data['school_id'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('school_id') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">School Username</label>
        <input type="text" name="user_name" value="{{ old('user_name', $data['user_name'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('user_name') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">EMIS Code</label>
        <input type="text" name="emis_code" value="{{ old('emis_code', $data['emis_code'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
        @error('emis_code') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>


<x-lga-ward-selector  :selectedLgaId="old('lga_id', $data['lga_id'] ?? '')" :selectedWardId="old('ward_id', $data['ward_id'] ?? '')"  />

    <!--<div>
        <label class="block font-medium">LGA</label>
        
        <select name="lga" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
            <option value="">-- Select --</option>
            @foreach($lgas as $lga)
            <option value="{{$lga->lga_id.':'.$lga->lga_name}}"  {{ old('lga', $data['lga'] ?? '') === $lga->lga_id.':'.$lga->lga_name ? 'selected' : '' }}>{{$lga->lga_name}}</option>
            @endforeach
        </select> 
        @error('lga') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Ward</label>
        <input type="text" name="ward" value="{{ old('ward', $data['ward'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
        @error('ward') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>-->


    <div>
        <label class="block font-medium">Type</label>
        <select name="type" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
            <option value="">-- Select --</option>
            @foreach($categories as $category)
            @endforeach
            <option value="Primary" {{ old('type', $data['type'] ?? '') === 'Primary' ? 'selected' : '' }}>Primary</option>
            <option value="JSS" {{ old('type', $data['type'] ?? '') === 'JSS' ? 'selected' : '' }}>JSS</option>
            <option value="SSS" {{ old('type', $data['type'] ?? '') === 'SSS' ? 'selected' : '' }}>SSS</option>
            <option value="Combined" {{ old('type', $data['type'] ?? '') === 'Combined' ? 'selected' : '' }}>Combined</option>
        </select>
        @error('type') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Year Established</label>
        <input type="number" name="year_established" value="{{ old('year_established', $data['year_established'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
        @error('year_established') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Principal/Head Teacher</label>
        <input type="text" name="principal_name" value="{{ old('principal_name', $data['principal_name'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
        @error('principal_name') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Phone/Email</label>
        <input type="text" name="phone_email" value="{{ old('phone_email', $data['phone_email'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
        @error('phone_email') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-between">
        <a href="#" class="btn bg-gray-400 text-white px-6 py-2 rounded">Cancel</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>
</form>

<style>
.input {
    @apply border rounded p-2 w-full;
}
</style>
@endsection
</x-publicvalidations::layouts.master>
