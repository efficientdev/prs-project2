<div > 

    <!-- Tab Content -->
    <div class="mt-4">
        @foreach($labels as $index => $label)
            <div >
<div class="py-2 px-4 -mb-px border-b-2 font-medium focus:outline-none text-blue-600 text-2xl"> {{ $label }}</div>
            <!--
            <div x-show="activeTab === {{ $index }}" x-cloak>
-->
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
