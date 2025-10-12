 <x-app-layout>
<h2 class="text-2xl my-1  ">Review Application: {{ $approval->application->data['sectionA']['proposed_name']??'' }}</h2> 
 
@if (auth()->user()->hasRole($approval->stage->role_name) || auth()->user()->hasRole('ADM'))

@php 
    
    $form=$approval->application;
    $data=$form->data??[];
@endphp

     
    @include('registrations::print')

    @php
    $report=$application; 
    @endphp 
    @if(isset($report->cies_reports))
        @include('cies::print')
    @else
        <div class="text-xl">Not yet available</div>
    @endif

    @include('registrations::approvals.history')
 

@else
    <div class="alert alert-warning">
        You do not have permission to view this.
    </div>
@endif


</x-app-layout>