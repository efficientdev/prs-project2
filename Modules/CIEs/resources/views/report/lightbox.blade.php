{{-- Alpine.js image gallery with lightbox --}}

<div x-data="{ lightboxOpen: false, currentImage: '' }">

    @if(!empty($data['docs']))
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach($data['docs'] as $doc)
                @if(!empty($doc))
                    @php
                        $ext = pathinfo($doc, PATHINFO_EXTENSION);
                        $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                        $url = asset('storage/' . $doc);
                    @endphp

                    @if($isImage)
                        <div class="h-[50vh] overflow-hidden">
                            <img 
                                src="{{ $url }}" 
                                alt="Image" 
                                class="cursor-pointer  rounded shadow"
                                @click="lightboxOpen = true; currentImage = '{{ $url }}'"
                            />
                        </div>
                    @else
                        <div class="mb-1">
                            <a href="{{ $url }}" target="_blank" class="text-blue-600 underline">
                                {{ basename($doc) }}
                            </a>
                        </div>
                    @endif
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
                class="absolute top-2 right-2 text-white text-2xl font-bold"
                @click="lightboxOpen = false"
            >&times;</button>

            <img :src="currentImage" class="max-h-[70vh] max-w-[90vw] rounded shadow-lg" />
        </div>
    </div>
</div>

