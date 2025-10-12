 <x-app-layout>
<h2 class="text-2xl my-1  ">Review Application: {{ $approval->application->data['sectionA']['proposed_name']??'' }}</h2> 
 
@if (auth()->user()->hasRole($approval->stage->role_name) || auth()->user()->hasRole('ADM'))

@php 
    
    $form=$approval->application;
    $data=$form->data??[];
@endphp

     
<div class="flex justify-between items-center"><div><h4 class="text-xl">Proprietor Data</h4></div>
    @include('registrations::print')


<div class="flex justify-between items-center"><div><h4 class="text-xl">CIE Inspection Report</h4></div>
    @php
    $report=$application; 
    @endphp 
    @if(isset($report->cies_reports))
        @include('cies::print')
    @else
        <div class="text-xl">Not yet available</div>
    @endif

  

<div class="flex justify-between items-center"><div><h4 class="text-xl">Approval History</h4></div>
<div>
<p>Status:  {{ ucwords(str_replace('_', ' ', $application->status)) }} </p>
</div></div>

<ul>
    @foreach ($application->approvals as $approval)
        <li class="mt-2 pb-2 border-b">
            <strong>{{ $approval->stage->name }}</strong> - {{ $approval->status }}
@if(!auth()->user()->hasRole('proprietor'))
             by {{ $approval->user->name ?? 'N/A' }}@endif
            <br>
            <div class="flex justify-between"><div>Comment: {{ $approval->comments ?? 'None' }}.</div>
            <div> <i class="far fa-clock mr-1"></i>
                                    Created {{ $approval->created_at->format('M j, Y') }}</div>
        </li>
    @endforeach
</ul>


@else
    <div class="alert alert-warning">
        You do not have permission to view this.
    </div>
@endif


</x-app-layout>