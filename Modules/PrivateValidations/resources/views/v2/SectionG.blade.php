<x-privatevalidations::layouts.master>

@extends('privatevalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section G: Declaration</h1>

<form method="POST" action="{{ route('private.validation.sectionG.store', ['form_id' => $form_id]) }}" class="space-y-6" enctype="multipart/form-data" x-data="{ agreed: {{ old('declaration_agreed', $data['declaration_agreed'] ?? false) ? 'true' : 'false' }} }">
    @csrf

    <div>
        <label class="inline-flex items-center">
            <input type="checkbox" name="declaration_agreed" x-model="agreed" value="1" required class="form-checkbox" />
            <span class="ml-2">I affirm that the information provided is true and accurate.</span>
        </label>
        @error('declaration_agreed') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Digital Signature</label>
        <input type="text" name="digital_signature" value="{{ old('digital_signature', $data['digital_signature'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('digital_signature') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Date</label>
        <input type="date" name="declaration_date" value="{{ old('declaration_date', $data['declaration_date'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('declaration_date') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <button type="submit" :disabled="!agreed" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 disabled:opacity-50" >Submit</button>
</form>

<style>
.input {
    @apply border rounded p-2 w-full;
}
</style>
@endsection
</x-privatevalidations::layouts.master>
