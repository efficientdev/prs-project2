<x-registrations::layouts.master>

@extends('registrations::components.layouts.x')

@section('content')


@php
$undone=0;
@endphp
@foreach($uploadsList as $uploadItem)
    @if(!isset($a->data['uploads'][$uploadItem]))
    @php
        $undone+=1;
    @endphp
    @endif
@endforeach

@if($undone>0)

<h1 class="text-2xl font-bold mb-6"><!--Section F:--> Required Documents Upload </h1>
<div>Acceptable formats include (jpg,png,pdf) each not more than 5mb in size</div>
{{$undone}} undone

@else


<h1 class="text-2xl font-bold mb-6">Section F:   Application Fee payment</h1> 

@endif
    
@foreach($uploadsList as $uploadItem)
    @if(!isset($a->data['uploads'][$uploadItem]))
<form method="post" action={{route('rdoc.uploads')}} class="flex justify-between  items-center shadow p-2 rounded my-1" enctype="multipart/form-data">
        @csrf

    <div  >
        Upload {{$uploadItem}} <br/>
        <input type="file" name="uploads[{{$uploadItem}}]" />
        <input type="hidden" name="application_id" value="{{$a->id??0}}" />
    </div>
            <div><x-primary-button   class="ms-0 mt-2">
                Upload
            </x-primary-button></div>
</form>
    @endif
@endforeach
 

@if($undone==0)

@include('registrations::payment.index')


         
<!--
<form method="POST" action="{{ route('registration.sectionF.store', $form_id) }}" class=" ">
    @csrf
undefined
    <div class="flex justify-between">
        <a href="{{ route('registration.sectionE.show', $form_id) }}" class="btn bg-gray-500 text-white">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white">Next</button>
    </div>
</form>
-->
@else 

    <div class="flex my-10 justify-between">
        <a href="{{ route('registration.sectionB.show', $form_id) }}" class="btn bg-gray-500 text-white">Previous</a>
<x-primary-button disabled="true" class="ms-0 mt-2">
                Next
            </x-primary-button>
        </div>
@endif

@endsection
</x-registrations::layouts.master>
