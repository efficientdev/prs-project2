<x-privatevalidations::layouts.master>

@extends('privatevalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section E: Infrastructure & Facilities</h1>

<form method="POST" action="{{ route('private.validation.sectionE.store', ['form_id' => $form_id]) }}" enctype="multipart/form-data" x-data="{
    labsAvailable: '{{ old('laboratories_available', $data['laboratories_available'] ?? 'NO') }}'
}" class="space-y-6">
    @csrf

    <div>
        <label class="block font-medium">Number of Classrooms in Use</label>
        <input type="number" name="num_classrooms" min="0" value="{{ old('num_classrooms', $data['num_classrooms'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('num_classrooms') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Number of Functional Toilets</label>
        <input type="number" name="num_toilets" min="0" value="{{ old('num_toilets', $data['num_toilets'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('num_toilets') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Library Available?</label>
        <select name="library_available" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="">-- Select --</option>
            <option value="YES" {{ old('library_available', $data['library_available'] ?? '') === 'YES' ? 'selected' : '' }}>Yes</option>
            <option value="NO" {{ old('library_available', $data['library_available'] ?? '') === 'NO' ? 'selected' : '' }}>No</option>
        </select>
        @error('library_available') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Laboratories Available?</label>
        <select name="laboratories_available" x-model="labsAvailable" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
            <option value="NO" {{ old('laboratories_available', $data['laboratories_available'] ?? '') === 'NO' ? 'selected' : '' }}>No</option>
            <option value="YES" {{ old('laboratories_available', $data['laboratories_available'] ?? '') === 'YES' ? 'selected' : '' }}>Yes</option>
        </select>
        @error('laboratories_available') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <template x-if="labsAvailable === 'YES'">
        <fieldset class="border rounded p-4 mt-4">
            <legend class="font-semibold">Tick which Laboratories are available</legend>

            <label class="inline-flex items-center mr-4">
                <input type="checkbox" name="laboratories_science" value="1"
                {{ old('laboratories_science', $data['laboratories_science'] ?? false) ? 'checked' : '' }} class="form-checkbox" />
                <span class="ml-2">Science</span>
            </label>

            <label class="inline-flex items-center mr-4">
                <input type="checkbox" name="laboratories_ict" value="1"
                {{ old('laboratories_ict', $data['laboratories_ict'] ?? false) ? 'checked' : '' }} class="form-checkbox" />
                <span class="ml-2">ICT</span>
            </label>

            <label class="inline-flex items-center mr-4">
                <input type="checkbox" name="laboratories_home_economics" value="1"
                {{ old('laboratories_home_economics', $data['laboratories_home_economics'] ?? false) ? 'checked' : '' }} class="form-checkbox" />
                <span class="ml-2">Home Economics</span>
            </label>

            <label class="block mt-2">
                <span>Others (please specify):</span>
                <input type="text" name="laboratories_others" value="{{ old('laboratories_others', $data['laboratories_others'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
            </label>
        </fieldset>
    </template>

    <div>
        <label class="block font-medium mt-4">Upload 3 Recent Photos of School Facilities</label>
        <input type="file" name="facility_photos[]" accept="image/*" multiple required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('facility_photos.*') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-between mt-6">
        <a href="{{ route('private.validation.sectionD.show', ['form_id' => $form_id]) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Previous</a>
    <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button></div>
</form>

<style>
.input {
    @apply border rounded p-2 w-full;
}
</style>
@endsection
</x-privatevalidations::layouts.master>
