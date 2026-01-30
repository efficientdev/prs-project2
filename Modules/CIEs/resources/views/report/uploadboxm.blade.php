

@php
 

$photos= \Modules\CIEs\Services\CieKonstants::getPhotoList()??[];
@endphp

@foreach($photos as $uploadItem)
	<?php
	/*
    @if(!isset($a->data['uploads'][$uploadItem]))
    @endif
    */
    ?>
    <div class="text-xl font-bold capitalize mb-2 border-b">photos of {{$uploadItem}}</div>
    
    @php
    $data['docs']=$data2['uploads'][$uploadItem]??[];
    @endphp

    @include('cies::report.lightbox')

<form method="post" action="{{route('ciedoc.uploads.multiple')}}" class="flex justify-between  items-center   p-2   my-2" enctype="multipart/form-data">
        @csrf

    <div  >
        Upload multiple {{$uploadItem}} <br/>
        <input type="file" name="uploads[{{$uploadItem}}][]" multiple />
        <input type="hidden" name="application_id" value="{{$report->id??0}}" />
    </div>
            <div  class="mt-3"><x-primary-button   class="ms-0 mt-2">
                Upload
            </x-primary-button></div>
</form>
@endforeach
 
