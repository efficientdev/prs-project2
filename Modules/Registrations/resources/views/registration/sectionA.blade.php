<x-registrations::layouts.master>

@extends('registrations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section A: School and Owner Identification</h1>

<form method="POST" action="{{ route('registration.sectionA.store', $form_id) }}" class="space-y-6" x-data enctype="multipart/form-data"   >
    @csrf


    
@include('registrations::formparts.owner')
  
@include('registrations::formparts.school')

@include('registrations::formparts.nearby')

    <div class="flex justify-between">
        <a href="#" class="btn bg-gray-400 text-white px-6 py-2 rounded">Cancel</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>
</form>

<style>
.input {
    @apply border rounded p-2 w-full;
}
</style>
@endsection
</x-registrations::layouts.master>
