
sectionA, make nearby_school(first column),nearby_distance
sectionB, make play_equipment(first column),play_equipment_qty
sectionC, make staff_surname(first column), staff_other_names, staff_qualification
sectionD, make learning_equipment (first column), learning_equipment_qty
sectionE, make other_fees (first column), 
 
@foreach ($form->data as $section => $values)
    <div class="border px-4 mb-4 rounded bg-gray-50">
        <h2 class="text-lg font-semibold mb-2">{{ ucfirst($section) }}</h2>
            @if(is_array($values))
        <ul class="list-disc pl-5">
            @foreach ($values as $key => $value)
                <li><strong>{{ ucwords(str_replace('_', ' ', $key)) }}:</strong>
                    @if (is_array($value))

@if(ucwords(str_replace('_', ' ', $key))=='Enrolments')
@include('publicvalidations::preview.enrolments')
@endif

@if(ucwords(str_replace('_', ' ', $key))=='Staff')
@include('publicvalidations::preview.staff')
@endif

                        <!--<pre class="bg-white p-2 rounded border mt-1">{{ json_encode($value, JSON_PRETTY_PRINT) }}</pre>-->
                    @else
                        {{ $value }}
                    @endif
                </li>
            @endforeach
        </ul>
        @endif
    </div>
@endforeach
