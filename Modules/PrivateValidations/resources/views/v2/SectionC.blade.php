<x-privatevalidations::layouts.master>

@extends('privatevalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section C: Staff Profile</h1>

<form method="POST" action="{{ route('private.validation.sectionC.store', ['form_id' => $form_id]) }}" enctype="multipart/form-data" class="space-y-6">
    @csrf

    <div>
        <label class="block font-medium">Total Number of Teaching Staff</label>
        <input type="number" name="total_teaching_staff" min="0" value="{{ old('total_teaching_staff', $data['total_teaching_staff'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('total_teaching_staff') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Number of Qualified Teachers (with TRCN certification)</label>
        <input type="number" name="qualified_teachers" min="0" value="{{ old('qualified_teachers', $data['qualified_teachers'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('qualified_teachers') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Number of Non-Teaching Staff</label>
        <input type="number" name="non_teaching_staff" min="0" value="{{ old('non_teaching_staff', $data['non_teaching_staff'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('non_teaching_staff') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium">Upload Updated Staff List (Excel/PDF)</label>
        <input type="file" name="staff_list_file" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('staff_list_file') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-between mt-6">
        <a href="{{ route('private.validation.sectionB.show', ['form_id' => $form_id]) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Previous</a>
    <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button></div>
</form>

<style>
.input {
    @apply border rounded p-2 w-full;
}
</style>
@endsection
</x-privatevalidations::layouts.master>