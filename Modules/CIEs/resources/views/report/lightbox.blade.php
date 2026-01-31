{{-- Alpine.js image gallery with lightbox --}}

<div x-data="{ lightboxOpen: false, currentImage: '' }">

    @if(!empty($data['docs']))
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($data['docs'] as $doci => $doc)
                @if(!empty($doc))<div class="grid">
                    @php
                        $ext = pathinfo($doc, PATHINFO_EXTENSION);
                        $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                        $url = asset('storage/' . $doc);
                    @endphp

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
                    @if(isset($uploadItem) && isset($report) && isset($allowdelete))
                     
                    
                     @if(isset($reasons[$doc]))
                     @if(isset($rejected[$doc]))
                     <div class="text-red-500">rejected -</div>
                     @endif
                     <div class="text-red-500">{{$reasons[$doc]??''}}</div>
                     @endif

                    <a href="{{route('ciedoc.uploads.drop')}}?label={{$uploadItem}}&path={{$doc}}&application_id={{$report->id??0}}" class="text-red-500">Delete</a>
                    @endif
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
            <button 
                class="absolute top-2 right-2 bg-black rounded text-white text-2xl font-bold"
                @click="lightboxOpen = false"
            >&times;</button>

            <img :src="currentImage" class="max-h-[70vh] max-w-[90vw] rounded shadow-lg" />
        </div>
    </div>
</div>

