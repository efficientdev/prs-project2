<x-publicvalidations::layouts.master>

@extends('publicvalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section F: Remarks by School Head</h1>

<form method="POST" action="{{ route('public.validation.sectionF.store', $form_id) }}" class="space-y-6">
    @csrf

    <div>
        <label>Challenges</label>
        <textarea name="challenges" rows="4" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('challenges', $data['challenges'] ?? '') }}</textarea>
    </div>

    <div>
        <label>Needs/Requests</label>
        <textarea name="needs" rows="4" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">{{ old('needs', $data['needs'] ?? '') }}</textarea>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('public.validation.sectionE.show', $form_id) }}" class="btn bg-gray-500 text-white">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white">Next</button>
    </div>
</form>
@endsection
</x-publicvalidations::layouts.master>
