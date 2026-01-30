

@php
 

$photos= \Modules\CIEs\Services\CieKonstants::getPhotoList()??[];
@endphp


<form method="post" action="{{route('ciedoc.uploads2.multiple')}}" class="grid  items-center  p-2  my-1" enctype="multipart/form-data">
        @csrf

@foreach($photos as $uploadItem)
	
    <div class="text-xl font-bold capitalize my-4 mb-2 border-b">photos of {{$uploadItem}}</div>
    
    @php
    $data['docs']=$data2['uploads'][$uploadItem]??[];
    @endphp

    @include('cies::report.lightbox')

    <div  >
        Upload multiple {{$uploadItem}} <br/>
        <input type="file" name="uploads[{{$uploadItem}}][]" multiple />
    </div>
            
@endforeach

        <input type="hidden" name="application_id" value="{{$report->id??0}}" />

<div class="mt-3"><x-primary-button   class="ms-0 mt-2">
                Upload
            </x-primary-button></div>
</form>
