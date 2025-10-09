<x-registrations::layouts.master>

@extends('registrations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section D: Infrastructure & Facilities</h1>

<form method="POST" action="{{ route('registration.sectionD.store', $form_id) }}" class="space-y-6" x-data>
    @csrf

     
@include('registrations::formparts.learn')

    <div class="flex justify-between">
        <a href="{{ route('registration.sectionC.show', $form_id) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>
</form>
@endsection
</x-registrations::layouts.master>
