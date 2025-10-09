<div x-data="{ open: false }"  >
    <!-- Toggle Button -->
    <div class="flex justify-between items-center"><div  class="text-xl my-2">{{ $title }}</div>
    <div
        @click="open = !open"
        class=" text-black px-4 py-2 rounded cursor-pointer transition"
    >
        <span x-show="!open">Show</span>
        <span x-show="open">Hide</span>
    </div></div>

    <!-- Collapsible Content -->
    <div x-show="open" x-transition class="mt-4 border-b shadow pb-5">
        {{ $slot }}
    </div>
</div>
