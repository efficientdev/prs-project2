<x-registrations::layouts.portfolio>

@extends('registrations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">First Letter</h1> 


       
        @if($a==null)
            <p>No Pending Payments found for this application</p>
        @endif

<p>Your application's first letter is ready</p>
<form method="post" action="{{route('registration.fletter.print',['id'=>$a->id])}}">
        	@csrf
        	<input type="hidden" name="type" value="approval" />

            <x-primary-button class="ms-0 mt-2">
                Download First Letter
            </x-primary-button> 
        </form> 
 

@endsection
</x-registrations::layouts.portfolio>
