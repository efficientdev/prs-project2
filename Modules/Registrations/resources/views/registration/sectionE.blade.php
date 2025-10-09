<x-registrations::layouts.master>

@extends('registrations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section E: Fees</h1>

<form method="POST" action="{{ route('registration.sectionE.store', $form_id) }}" class="space-y-6">
    @csrf
  
<div class="my-2">FEES CHARGEABLE</div>
 

<div class="grid grid-cols-1 md:grid-cols-2 gap-4  "> 
@foreach(explode(',',$category->classes) as $i)

<div  > 
<label class="capitalize text-sm font-medium text-gray-700">
                     {{$i}} fee</label> 
<input type="text"
       name="fees[{{$i}}]" 
       required 
       value="{{ old('play_indoor_size', $data['fees'][$i] ?? '') }}" 
       placeholder="Amount"
       class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" />
  </div>
@endforeach
</div>

@include('registrations::formparts.otherfees')


    <div class="flex justify-between">
        <a href="{{ route('registration.sectionD.show', $form_id) }}" class="btn bg-gray-500 text-white">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white">Next</button>
    </div>
</form>
@endsection
</x-registrations::layouts.master>
