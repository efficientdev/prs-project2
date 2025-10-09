<x-publicvalidations::layouts.master>

@extends('publicvalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section E: Validation & Compliance</h1>

<form method="POST" action="{{ route('public.validation.sectionE.store', $form_id) }}" class="space-y-6">
    @csrf

    <div>
        <label>Last Inspection Date</label>
        <input type="date" name="last_inspection_date" value="{{ old('last_inspection_date', $data['last_inspection_date'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
    </div>

    <div>
        <label>Last EMIS Submission</label>
        <input type="date" name="last_emis_submission" value="{{ old('last_emis_submission', $data['last_emis_submission'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
    </div>

    <div>
        <label>Validation Status</label>
        <select name="validation_status" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>
            @foreach(['Compliant','Partially Compliant','Not Compliant'] as $status)
                <option value="{{ $status }}" {{ (old('validation_status', $data['validation_status'] ?? '') == $status) ? 'selected' : '' }}>{{ $status }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('public.validation.sectionD.show', $form_id) }}" class="btn bg-gray-500 text-white">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white">Next</button>
    </div>
</form>
@endsection
</x-publicvalidations::layouts.master>
