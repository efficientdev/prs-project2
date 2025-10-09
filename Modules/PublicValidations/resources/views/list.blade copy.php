<x-app-layout>


<div class="flex justify-between   py-3 px-1 items-center">
	<div class="text-3xl">Your Public Validations</div>
<a href="{{route('public.validation.create')}}" class="p-2 capitalize text-white bg-blue-500">new Validation</a>
</div>
<hr/>

<div>
@foreach($forms as $form)

<div class="flex justify-between shadow py-3 px-1 rounded">
	<div class="flex gap-5 items-center">
<div>Validation#{{$form->id}}</div>

<div>{{json_encode($form->data['sectionA']['school_name']??'Incomplete Form')}}</div></div>

<div>{{ucwords(str_replace('_', ' ', $form->status))}} {{$form->created_at}}</div>
</div>
<hr/>
<a href="{{ route('public.validation.preview', ['form_id' => $form->id ?? 'default']) }}" class="...">
		           Summary
		        </a>

<a href="{{ route('public.validation.sectionA.show', ['form_id' => $form->id ?? 'default']) }}" class="...">
		           Review
		        </a>
<hr/>

@endforeach
</div>

<div class="min-w-[50vh]">
</div>
</x-app-layout>