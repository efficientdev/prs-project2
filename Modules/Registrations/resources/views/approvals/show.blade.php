 <x-app-layout>
<h2 class="text-2xl my-1  ">Review Application: {{ $approval->application->data['sectionA']['proposed_name']??'' }}</h2>
<!--
<p><strong>Description:</strong> {{ $approval->application->description }}</p>
-->

<?php
//this can be made to simulate points where the applicant pays approval fee or application fee
?>
@if($application->currentApproval() && $application->currentApproval()->status === 'needs_applicant_input')
    <form method="POST" action="{{ route('applications.respond', $application) }}">
        @csrf
        <div class="mb-3">
            <label>Your Response</label>
            <textarea name="response" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Response</button>
    </form>
@endif



@if (auth()->user()->hasRole($approval->stage->role_name) || auth()->user()->hasRole('ADM'))

@php
$tabslist=[
$approval->stage->name.' Report',
'History',
'CIE Report',
'Proprietor Form'
];
    
    $form=$report=$approval->application;
    $data=$form->data??[];
@endphp




    @if($approval->stage->role_name=="CIE" && empty($form->cies_reports))
    <div class="py-5">
    <a class="bg-blue-500 text-white my-5 rounded px-5 py-1" href="{{route('cies.sectionA.show',['report'=>$form->id])}}">Fill CIE Report</a>
</div>
    
    @elseif($approval->stage->role_name=="PRS" && empty($form->prs_4_report))
    <div class="py-5">
    <a class="bg-blue-500 text-white my-5 rounded px-5 py-1" href="{{route('prss.sectionA.show',['report'=>$form->id])}}">Fill PRS Report</a>
</div>
    
    @else
<x-tabs :labels="$tabslist">


    <x-slot name="tab0"> 

        @if($approval->stage->role_name=="CIE")
            @include('cies::print') 
        @endif

        @if($approval->stage->role_name=="PRS")
            @include('prss::print') 
        @endif

@if($approval->stage->role_name=="DPRS")
        <a target="_blank" href="{{ route('registration.reportstack', ['form_id' => $form->id ?? 'default']) }}" 
                               >
                                 
                                <span> Report Stack</span>
                            </a>@endif


    <form method="POST" action="{{ route('srapprovals.approve', $approval) }}">
        @csrf




        @if($approval->stage->role_name=="DPRS")
        
        <div>
            <label>Category <b class="text-danger">*</b></label>
            <x-select-input 
                name='category_id'
                :options="$categories" 
                :selected="old('category_id', $data['category_id'] ?? '')" 
            />
        </div>

        @endif
        <div class="mb-3">
            <label>Comments (optional)</label>
            <textarea name="comments" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Approve</button>
    </form>

    <form method="POST" action="{{ route('srapprovals.reject', $approval) }}" class="mt-2">
        @csrf
        <div class="mb-3">
            <label>Comments (required for rejection)</label>
            <textarea name="comments" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-danger">Reject</button>
    </form>

    <form method="POST" action="{{ route('srapprovals.request-input', $approval) }}" class="mt-2">
    @csrf
    <div class="mb-3">
        <label>What info do you need from the applicant?</label>
        <textarea name="comments" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-warning">Request Applicant Input</button>
</form>
</x-slot>

    <x-slot name="tab1">

 @include('registrations::approvals.history')
    </x-slot>
    <x-slot name="tab2">

@php
$report=$application;
    $owner=$application->owner;
@endphp

<div class="grid grid-cols-2 mb-3">
    <div>Proprietor Name<br/>
 {{$owner->name}}</div><div>
    Proprietor Email<br/>
 {{$owner->email}}</div>
</div>

@if(isset($report->cies_reports))
@include('cies::print')
@else
<div class="text-xl">Not yet available</div>
@endif

</x-slot>

    <x-slot name="tab3"> 


 @include('registrations::print')

    </x-slot>


</x-tabs>

@endif

@else
    <div class="alert alert-warning">
        You do not have permission to act on this stage.
    </div>
@endif

<!--
<form method="POST" action="{{ route('srapprovals.approve', $approval) }}">
    @csrf
    <div class="mb-3">
        <label>Comments (optional)</label>
        <textarea name="comments" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Approve</button>
</form>

<form method="POST" action="{{ route('srapprovals.reject', $approval) }}" class="mt-2">
    @csrf
    <div class="mb-3">
        <label>Comments (required for rejection)</label>
        <textarea name="comments" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-danger">Reject</button>
</form>
-->
</x-app-layout>