<x-registrations::layouts.master>

@extends('registrations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section G: Final Declaration</h1>

<form method="POST" action="{{ route('registration.sectionG.store', $form_id) }}" class="space-y-6">
    @csrf

    <div>
        <label>
            <input type="checkbox" name="declaration" required>
            I, {{auth()->user()->name??'n/a'}}, hereby affirm that all information and documents provided in this school registration application are true, and accurate. I understand that any false or misleading information may result in the loss of my registration status.<!--
            I affirm that the information provided is true and accurate.-->
        </label>
    </div>

    <!--<div>
        <label>Digital Signature (Name)</label>
        <input type="text" name="signature" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required value="{{ old('signature', $data['signature'] ?? '') }}">
    </div>

    <div>
        <label>Date</label>
        <input type="date" name="date_signed" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" value="{{ date('Y-m-d') }}" required value="{{ old('date_signed', $data['date_signed'] ?? '') }}">
    </div>-->

    <div class="flex justify-between">
        <a href="{{ route('registration.sectionF.show', $form_id) }}" class="btn bg-gray-500 text-white">Previous</a>
        <button type="submit" class="btn bg-green-600 text-white">Submit & Preview</button>
    </div>
</form>
@endsection
</x-registrations::layouts.master>
