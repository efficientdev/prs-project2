<x-app-layout>



<h1 class="text-2xl font-bold mb-6">Private Validation Form Summary</h1>

@foreach ($form->data as $section => $values)
    <div class="border px-4 mb-4 rounded bg-gray-50">
        <h2 class="text-lg font-semibold mb-2">{{ ucfirst($section) }}</h2>
        <ul class="list-disc pl-5">
            @foreach ($values as $key => $value)
                <li><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong>
                    @if (is_array($value))

                    @if(ucwords(str_replace('_', ' ', $key))=='Enrolments2')
                    @include('publicvalidations::preview.enrolments')
                    @endif

                    @if(ucwords(str_replace('_', ' ', $key))=='Staff2')
                    @include('publicvalidations::preview.staff')
                    @endif

                        <!--<pre class="bg-white p-2 rounded border mt-1">{{ json_encode($value, JSON_PRETTY_PRINT) }}</pre>-->
                    @else
                        {{ $value }}
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endforeach

<!--
<a href="{{ url('/') }}" class="btn bg-blue-600 text-white px-4 py-2 rounded">Finish</a>-->

</x-app-layout>
