<x-registrations::layouts.master>

@extends('registrations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section C: Staffing Data</h1>

<form method="POST" action="{{ route('registration.sectionC.store', $form_id) }}" class="space-y-6">
    @csrf
 
@include('registrations::formparts.staff')

    <div class="flex justify-between">
        <a href="{{ route('registration.sectionB.show', $form_id) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>
</form>
@endsection
</x-registrations::layouts.master>
