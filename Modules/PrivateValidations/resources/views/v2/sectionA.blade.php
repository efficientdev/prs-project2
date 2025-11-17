<x-privatevalidations::layouts.master>

@extends('privatevalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section A: School Identity</h1>

<form method="POST" class="grid gap-2" action="{{ route('private.validation.sectionA.store', ['form_id' => $form_id]) }}" enctype="multipart/form-data"  x-data="{ certificateAvailable: '{{ old('certificate_available', $data['certificate_available'] ?? '') }}' }">
    @csrf  

    <div>
        <label class="block font-medium">School Name</label>
        <input type="text" name="school_name" value="{{ old('school_name', $data['school_name'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
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
        <label class="block font-medium">Approval Number</label>
        <input type="text" name="approval_number" value="{{ old('approval_number', $data['approval_number'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('approval_number') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">School Category</label>
        <select name="school_category" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="">Select</option>
            @foreach(['A','B','C'] as $cat)
                <option value="{{ $cat }}" {{ old('school_category', $data['school_category'] ?? '') == $cat ? 'selected' : '' }}>{{ $cat }}</option>
            @endforeach
        </select>
        @error('school_category') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">School Level</label>
        <select name="school_level" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="">Select</option>
            @foreach(['Nursery','Primary','Basic','Junior Secondary','Senior Secondary'] as $level)
                <option value="{{ $level }}" {{ old('school_level', $data['school_level'] ?? '') == $level ? 'selected' : '' }}>{{ $level }}</option>
            @endforeach
        </select>
        @error('school_level') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Date of Approval</label>
        <input type="date" name="date_of_approval" value="{{ old('date_of_approval', $data['date_of_approval'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('date_of_approval') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Upload Approval Letter</label>
        <input type="file" name="approval_letter" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('approval_letter') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Certificate of registration available?</label>
        <select name="certificate_available" x-model="certificateAvailable" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="">Select</option>
            <option value="YES">YES</option>
            <option value="NO">NO</option>
        </select>
        @error('certificate_available') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div x-show="certificateAvailable === 'YES'" x-transition>
        <label class="block font-medium">Upload Certificate of Registration</label>
        <input type="file" name="certificate_file" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('certificate_file') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>


<x-lga-ward-selector  :selectedLgaId="old('lga_id', $data['lga_id'] ?? '')" :selectedWardId="old('ward_id', $data['ward_id'] ?? '')"  />

<!--namePrefix="owner"
    <div>
        <label class="block font-medium">LGA</label>
        <input type="text" name="lga" value="{{ old('lga', $data['lga'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('lga') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Ward</label>
        <input type="text" name="ward" value="{{ old('ward', $data['ward'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('ward') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>-->
<div>
    <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button></div>
</form>

<style>
.input {
    @apply border rounded p-2 w-full;
}
</style>

@endsection
</x-privatevalidations::layouts.master>