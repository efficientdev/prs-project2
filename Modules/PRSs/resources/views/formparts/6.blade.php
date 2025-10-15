<!-- Lightbox Modal -->
<div 
    x-data 
    x-show="$store.lightbox.open"
    x-transition
    @keydown.escape.window="$store.lightbox.hide()"
    @click.away="$store.lightbox.hide()"
    class="fixed top-[50%] left-[50%] inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50"
    style="display: none;"
>
<div @click.away="$store.lightbox.hide()" class="bg-transparent rounded-md p-2 fixed top-10 right-10">photo</div>
    <img 
        :src="$store.lightbox.imgSrc" 
        class="max-w-full max-h-[70vh] rounded shadow-lg border-4 border-white" 
        alt="Preview"
    >
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('lightbox', {
            open: false,
            imgSrc: '',
            show(src) {
                this.imgSrc = src
                this.open = true
            },
            hide() {
                this.open = false
                this.imgSrc = ''
            }
        });
    });
</script>


@php
    $uploads = $sectionH['uploads'] ?? [];
    $oldApprovals = old('approvals', []);
@endphp

<div class="space-y-6" x-data>
    @foreach($uploads as $category => $files)
        <div class="py-2  "><!--border rounded-md shadow-sm -->
            <h3 class="font-semibold capitalize text-lg text-gray-800 ">{{ $category }}</h3>

            <div class="space-y-3 grid md:grid-cols-2 gap-3">
                @foreach($files as $index => $file0)
                    @php
                        $file='storage/'.$file0;
                        $status = $oldApprovals[$category][$index]['status'] ?? null;
                        $reason = $oldApprovals[$category][$index]['reason'] ?? '';
                        $ext = pathinfo($file, PATHINFO_EXTENSION);
                        $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'webp', 'gif']);
                    @endphp

                    <div 
                        class="border p-4 rounded-md bg-gray-50 space-y-2"
                        x-data="{ 
                            status: '{{ $status }}',
                        }"
                    >
                        <!-- File Preview or Link -->
                        <div class="flex items-center space-x-4">
                            @if ($isImage)
                                <img 
                                    src="{{ asset($file) }}" 
                                    alt="Upload" 
                                    class="w-20 h-20 object-cover border rounded cursor-pointer hover:opacity-80 transition"
                                    @click="$store.lightbox.show('{{ asset($file) }}')"
                                >
                                <!--
                                <img src="{{ asset($file) }}" alt="Upload" class="w-20 h-20 object-cover border rounded">-->
                            @else
                                <a href="{{ asset($file) }}" target="_blank" class="text-blue-600 underline text-sm">
                                    {{ basename($file) }}
                                </a>
                            @endif
                            <span class="text-sm text-gray-500 break-all">{{ $file }}</span>
                        </div>

                        <!-- Approval Status -->
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center space-x-2">
                                <input 
                                    type="radio" 
                                    :id="`approve-{{ $category }}-{{ $index }}`"
                                    name="approvals[{{ $category }}][{{ $index }}][status]" 
                                    value="approved"
                                    x-model="status"
                                    class="text-green-600"
                                    required
                                >
                                <span class="text-sm text-green-700">Approve</span>
                            </label>

                            <label class="flex items-center space-x-2">
                                <input 
                                    type="radio" 
                                    :id="`reject-{{ $category }}-{{ $index }}`"
                                    name="approvals[{{ $category }}][{{ $index }}][status]" 
                                    value="rejected"
                                    x-model="status"
                                    class="text-red-600"
                                    required
                                >
                                <span class="text-sm text-red-700">Reject</span>
                            </label>
                        </div>

                        <!-- Rejection Reason (shown only when rejected) -->
                        <div x-show="status === 'rejected'" x-transition>
                            <label class="block text-sm text-gray-600 mb-1">Reason for Rejection</label>
                            <input 
                                type="text"
                                name="approvals[{{ $category }}][{{ $index }}][reason]"
                                placeholder="Enter reason for rejection"
                                value="{{ $reason }}"
                                class="w-full border border-red-300 rounded-md px-3 py-2 focus:outline-none focus:ring focus:ring-red-300"
                            >
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
