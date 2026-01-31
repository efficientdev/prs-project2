{{-- Alpine.js image gallery with lightbox --}}

<div x-data="{ lightboxOpen: false, currentImage: '' }">

    @if(!empty($data['docs']))
        <div class="grid  gap-4"><!--grid-cols-2 md:grid-cols-4-->
            @foreach($data['docs'] as $doc)
                @if(!empty($doc))
                    <div class="grid grid-cols-2  gap-4">
                    @php
                        $ext = pathinfo($doc, PATHINFO_EXTENSION);
                        $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                        $url = asset('storage/' . $doc);
                    @endphp

                    <div>

                    @if($isImage)
                    <div class="h-[30vh] border shadow overflow-hidden">
    <img 
        src="{{ $url }}" 
        alt="Image" 
        class="w-full h-full object-cover cursor-pointer rounded shadow"
        @click="lightboxOpen = true; currentImage = '{{ $url }}'"
    />
</div>
<!--
                        <div class="h-[50vh] overflow-hidden">
                            <img 
                                src="{{ $url }}" 
                                alt="Image" 
                                class="cursor-pointer  rounded shadow"
                                @click="lightboxOpen = true; currentImage = '{{ $url }}'"
                            />
                        </div>-->
                    @else
                        <div class="mb-1">
                            <a href="{{ $url }}" target="_blank" class="text-blue-600 line-clamp-1 underline">
                                {{ basename($doc) }}
                            </a>
                        </div>
                    @endif

                </div>

                    <div class="grid gap-2 my-2">
                        
                        @if(!isset($printmode))
                        
                        <div>
                        <input
    type="radio"
    name="approval[{{ $doc }}]"
    value="1"
    @checked($approved['approval'][$doc] ?? false)
> <label>Approve?</label> 
</div>
<div>
         <input
    type="radio"
    name="approval[{{ $doc }}]"
    value="0"
    @checked($approved['rejected'][$doc] ?? false)
>               <!--<input
    type="radio"
    name="rejected[{{ $doc }}]"
    value="0"
    @checked($rejected['approval'][$doc] ?? false)
>--> <label>Reject?</label> 

<div><label>State Reason?</label> 
    <textarea name="reasons[{{ $doc }}]" class="w-full resize-0 resize-none" rows=3>{{$approved['reasons'][$doc] ??''}}</textarea>
    </div>

</div>
@else
    @if($approved['approval'][$doc])
    <div class="text-green-500">
Approved</div>@else<div class="text-red-500">
Rejected</div>
@endif
@endif


                       
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    @endif

    {{-- Lightbox Modal --}}
    <div 
        x-show="lightboxOpen" 
        x-transition 
        class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50"
        @click.away="lightboxOpen = false"
    >
        <div class="relative">
            <button  type="button"
                class="absolute top-2 right-2 bg-black rounded text-white text-2xl font-bold"
                @click="lightboxOpen = false"
            >&times;</button>

            <img :src="currentImage" class="max-h-[70vh] max-w-[90vw] rounded shadow-lg" />
        </div>
    </div>
</div>

