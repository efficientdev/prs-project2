<x-privatevalidations::layouts.master>

@extends('privatevalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section D: Student Enrolment</h1>

<form method="POST" action="{{ route('private.validation.sectionD.store', ['form_id' => $form_id]) }}" class="space-y-6">
    @csrf

    <div>
        <label class="block font-medium">Total Enrolment (Current Academic Year)</label>
        <input type="number" name="total_enrolment" min="0" value="{{ old('total_enrolment', $data['total_enrolment'] ?? '') }}" required class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
        @error('total_enrolment') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <fieldset class="border rounded p-4">
        <legend class="font-semibold">Enrolment by Level and Gender</legend>

        @php
            $levels = ['nursery', 'primary', 'jss', 'sss'];
            $genders = ['male', 'female'];
        @endphp

        @foreach($levels as $level)
            <div class="mb-4">
                <h3 class="font-medium capitalize">{{ $level }}</h3>
                <div class="flex space-x-4">
                    @foreach($genders as $gender)
                        <div class="flex-1">
                            <label class="block">{{ ucfirst($gender) }}</label>
                            <input type="number" name="enrolment_{{ $level }}_{{ $gender }}" min="0"
                                   value="{{ old("enrolment_{$level}_{$gender}", $data["enrolment_{$level}_{$gender}"] ?? '') }}"
                                   class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" />
                            @error("enrolment_{$level}_{$gender}") <p class="text-red-600">{{ $message }}</p> @enderror
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </fieldset>

    <div class="flex justify-between mt-6">
        <a href="{{ route('private.validation.sectionC.show', ['form_id' => $form_id]) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Previous</a>
    <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button></div>
</form>

<style>
.input {
    @apply border rounded p-2 w-full;
}
</style>
@endsection
</x-privatevalidations::layouts.master>