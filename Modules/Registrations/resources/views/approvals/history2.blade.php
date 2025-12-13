<div class="px-5">

<div class="flex justify-between items-center"><div><h4 class="text-xl">{{ json_encode($application->data['sectionA']['proposed_name'] ?? 'Incomplete Form') }}  <br/>Approval History</h4></div>
<div>
<p>Status:  {{ ucwords(str_replace('_', ' ', $application->status)) }} </p>
</div></div>


     
@php
    $data=$application->data??[];
    $form=$application??null;
@endphp


@php
/*
'CIE Report',
'Proprietor Form'*/
$tabslist=[
'Proprietor Form',
'Application Payment',
];
    
    foreach ($application->approvals as $approval){
        $tabslist[]=$approval->stage->name; 
    }
   
@endphp



<x-tabs :labels="$tabslist">


    <x-slot name="tab0"> 

@include('registrations::print')

    </x-slot>
    <x-slot name="tab1"> 
{{--
{{$application->registrationPayment}}
<hr/>
{{$application->approvedRegistrationPayment}}
<hr/>

    @php
        $payment=$application->registrationPayment->payments->first(); 
    @endphp
@include('proprietors::admin.payments.partialreceipt')
--}}

    @php
        $payment1=$application->approvedRegistrationPayment->payments;//->first(); 
    @endphp
    @forelse($payment1 as $payment)
        @include('proprietors::admin.payments.partialreceipt')
    @empty
        <p>No Payments found</p>
    @endforelse


    </x-slot>

<!--
<ul>-->
    @foreach ($application->approvals as $i=> $approval)

    @php 
    $ss=$i+2;


    //$xzz='tab'.$ss;
    @endphp


    @if($ss==2)
        <x-slot name="tab2">
    @elseif($ss==3)
        <x-slot name="tab3">
    @elseif($ss==4)
        <x-slot name="tab4">
    @elseif($ss==5)
        <x-slot name="tab5">
    @elseif($ss==6)
        <x-slot name="tab6">
    @elseif($ss==7)
        <x-slot name="tab7">
    @elseif($ss==8)
        <x-slot name="tab8">
    @elseif($ss==9)
        <x-slot name="tab9">
    @endif
        <div>
        <!--
        <li class="mt-2 pb-2 border-b">-->
            <strong>{{ $approval->stage->name }}</strong> - {{ $approval->status }}

            @if(!auth()->user()->hasRole('proprietor'))
                 by {{ $approval->user->name ?? 'N/A' }}
            @endif
            <br>

            @if($approval->stage->role_name=="CIE")

                @php
                    $report=$application;
                    //
                @endphp


                @if(isset($report->cies_reports))
                    @include('cies::print')
                @else
                    <div class="text-xl">Not yet available</div>
                @endif

            @endif



            <div class="flex justify-between"><div>Comment: {{ $approval->comments ?? 'None' }}.</div>
            <div> <i class="far fa-clock mr-1"></i>
                                    Created {{ $approval->created_at->format('M j, Y') }}</div></div>
        <!--</li>-->
    </div>

    </x-slot>
    @endforeach
<!--</ul>--> 

</x-tabs>

</div>