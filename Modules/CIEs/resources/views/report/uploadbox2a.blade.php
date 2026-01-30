

@php
 

$photos= \Modules\CIEs\Services\CieKonstants::getPhotoList()??[];
@endphp



<form method="post" action="{{route('ciedoc.uploads')}}" class="grid  items-center  p-2 rounded my-2" enctype="multipart/form-data">
        @csrf

@foreach($photos as $uploadItem)
	
    <div class="text-xl font-bold capitalize my-4 mb-2 border-b">photos of {{$uploadItem}}</div>
    
    @php
    $data['docs']=$data2['uploads'][$uploadItem]??[];
    @endphp

    @include('cies::report.lightbox')

    <div  >
        Upload single {{$uploadItem}} <br/>
        <input type="file" name="uploads[{{$uploadItem}}]" />
    </div>
            
@endforeach

        <input type="hidden" name="application_id" value="{{$report->id??0}}" />

<div><x-primary-button   class="ms-0 mt-2">
                Upload
            </x-primary-button></div>
</form>
