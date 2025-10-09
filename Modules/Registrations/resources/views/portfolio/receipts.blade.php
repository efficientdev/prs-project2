<x-registrations::layouts.portfolio>

@extends('registrations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Receipts</h1> 


       
        @if($a==null)
            <p>No Pending Payments found for this application</p>
        @endif



	
 @include('registrations::portfolio.receipts.app')
 @include('registrations::portfolio.receipts.apr')


@endsection
</x-registrations::layouts.portfolio>
