<x-app-layout>

<a href="{{route('private.validation.create')}}">new Validation</a>

<hr/>

@foreach($forms as $form)

{{$form}}
<a href="{{ route('private.validation.sectionA.show', ['form_id' => $form->id ?? 'default']) }}" class="...">
		           Review
		        </a>
<hr/>

@endforeach

</x-app-layout>