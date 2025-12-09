<div x-data="{ activeTab: 0 }">
    <!-- Tab Headers -->
    <div class="flex space-x-2 border-b border-gray-200">
        @foreach($labels as $index => $label)
            <button
                @click="activeTab = {{ $index }}"
                class="py-2 px-4 -mb-px border-b-2 font-medium focus:outline-none"
                :class="activeTab === {{ $index }} 
                    ? 'border-blue-500 text-blue-600' 
                    : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'">
                {{ $label }}
            </button>
        @endforeach
    </div> 
    <!-- Tab Content -->
    <div class="mt-4">
        @foreach($labels as $index => $label)
            <div x-show="activeTab === {{ $index }}" x-cloak>

                @php
                $r='tab'.$index; 
                @endphp

    {{-- $component->slots[$r] ?? '' --}}
                {{--$$r--}}

{!! $__laravel_slots[$r] ?? '' !!}

            </div>
        @endforeach
    </div>
</div>
