<x-registrations::layouts.master>

@extends('registrations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section F: Required Documents Upload</h1>
<div>Acceptable formats include (jpg,png,pdf) each not more than 5mb in size</div>

<form method="POST" action="{{ route('registration.sectionF.store', $form_id) }}" class=" ">
    @csrf

    
@foreach($uploadsList as $uploadItem)
    @if(!isset($a->meta['uploads'][$uploadItem]))
<form method="post" action={{route('doc.uploads')}} class="flex justify-between  items-center shadow p-2 rounded my-1" enctype="multipart/form-data">
        @csrf

    <div  >
        Upload {{$uploadItem}} <br/>
        <input type="file" name="uploads[{{$uploadItem}}]" />
        <input type="hidden" name="application_id" value="{{$a->id??0}}" />
    </div>
            <div><x-primary-button class="ms-0 mt-2">
                Upload
            </x-primary-button></div>
</form>
    @endif
@endforeach
 
    <div class="flex justify-between">
        <a href="{{ route('registration.sectionE.show', $form_id) }}" class="btn bg-gray-500 text-white">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white">Next</button>
    </div>
</form>
@endsection
</x-registrations::layouts.master>
