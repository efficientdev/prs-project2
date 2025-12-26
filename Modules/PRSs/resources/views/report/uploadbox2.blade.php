

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

    @include('prss::report.lightbox')

<!--
<form method="post" action={{route('ciedoc.uploads')}} class="flex justify-between  items-center shadow p-2 rounded my-1" enctype="multipart/form-data">
        @csrf

    <div  >
        Upload {{$uploadItem}} <br/>
        <input type="file" name="uploads[{{$uploadItem}}]" />
        <input type="hidden" name="application_id" value="{{$report->id??0}}" />
    </div>
            <div><x-primary-button   class="ms-0 mt-2">
                Upload
            </x-primary-button></div>
</form>
-->
@endforeach

