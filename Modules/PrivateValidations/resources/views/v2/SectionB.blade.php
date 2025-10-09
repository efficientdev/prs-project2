<x-privatevalidations::layouts.master>

@extends('privatevalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section B: School Ownership & Administration</h1>

<form method="POST" action="{{ route('private.validation.sectionB.store', ['form_id' => $form_id]) }}" class="space-y-6">
    @csrf

    <div>
        <label class="block font-medium">Proprietor's Name</label>
        <input type="text" name="proprietor_name" value="{{ old('proprietor_name', $data['proprietor_name'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('proprietor_name') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Proprietor's Phone</label>
        <input type="text" name="proprietor_phone" value="{{ old('proprietor_phone', $data['proprietor_phone'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('proprietor_phone') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Proprietor's Email</label>
        <input type="email" name="proprietor_email" value="{{ old('proprietor_email', $data['proprietor_email'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('proprietor_email') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Head Teacher / Principal Name</label>
        <input type="text" name="head_teacher_name" value="{{ old('head_teacher_name', $data['head_teacher_name'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('head_teacher_name') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Contact Address</label>
        <textarea name="contact_address" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('contact_address', $data['contact_address'] ?? '') }}</textarea>
        @error('contact_address') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-between mt-6">
        <a href="{{ route('private.validation.sectionA.show', ['form_id' => $form_id]) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Previous</a>
    <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button></div>
</form>

<style>
.input {
    @apply border rounded p-2 w-full;
}
</style>
@endsection
</x-privatevalidations::layouts.master>