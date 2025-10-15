
@php
$data=$report->cies_reports['sectionH']??[];

$photos= \Modules\CIEs\Services\CieKonstants::getPhotoList()??[];

@endphp

@foreach($photos as $uploadItem)
     
    <div class="text-xl font-bold capitalize mt-5 mb-2 border-b">{{$uploadItem}}</div>

    @php
    $data['docs']=$data['uploads'][$uploadItem]??[];

    //print_r($data);
    @endphp
    @if(empty($data['docs']))
    <div>No photos found</div>
    @else
    @include('cies::report.lightbox')
    @endif
@endforeach

