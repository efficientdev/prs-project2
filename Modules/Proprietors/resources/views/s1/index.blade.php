<x-app-layout>


@foreach($uploadsList as $uploadItem)
    @if(!isset($a->meta['uploads'][$uploadItem]))
<form method="post" action={{route('doc.uploads')}} class="flex justify-between gap-5 items-center shadow p-2 rounded my-1" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="application_id" value="{{$a->id??0}}" />
    <div  >
        Upload {{$uploadItem}} <br/>
        <input type="file" name="uploads[{{$uploadItem}}]" />
    </div>
            <div><x-primary-button class="ms-0 mt-2">
                Upload
            </x-primary-button></div>
</form>
    @endif
@endforeach

@php
$undone=0;
@endphp
@foreach($uploadsList as $uploadItem)
    @if(!isset($a->meta['uploads'][$uploadItem]))
    @php
        $undone+=1;
    @endphp
    @endif
@endforeach

{{$undone}} Documents have not been Uploaded.

</x-app-layout>