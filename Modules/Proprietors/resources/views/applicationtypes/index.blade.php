<x-app-layout>

 
 <div>
		<div class="text-2xl">Start a New Application</div>
	<p>Select the type of institution you wish to establish, then you can proceed to make payment on the next page.</p>
	<div class="grid md:grid-cols-2 gap-5">
	@foreach($cats as $item)
	 
	<a class="my-2 p-3 bg-gray-200 shadow" style="text-decoration: none;" href="{{route('application.types.show',['application_type'=>$item->id])}}">{{$item->category_name}}</a>
 
	@endforeach
</div>
</div>

</x-app-layout>