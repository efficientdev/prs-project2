<x-app-layout>

 


<div class="grid  rounded bg-white gap-10">

<div>
	<div class="text-2xl">Current Application</div>
		@foreach($my_applications as $item)
	<div class="my-2 border-b ">
		{{$item->category->category_name}}<br/>
		@if($item->applicationStatus)
		<span class="text-red-500">{{$item->applicationStatus->status_name}}</span> 
		{{$item->updated_at->format('D m M Y')}}

		@else
		<span class="text-green-500"><a class="text-green-500" href={{route('application.edit',['id'=>$item->id])}}>Fill Application</a></span>
		@endif
		<br/><br/>
		{{$item->created_at->format('D m M Y')}}
	

	<a href="{{route('proprietor.application.show',['id'=>($item->id??0)])}}">Review</a>
	<hr class="mb-4" />


	@if($item->current_application_status_id==1)
	<div class="flex justify-between gap-5 items-center shadow p-2 rounded my-1">
		<div>Application Fee Payment</div>
		<div><a href="{{route('application.types.show',['application_type'=>($item->meta['type_id']??0)])}}">Add payment</a>
		</div>
	</div>
	@endif

	@if($item->current_application_status_id==13)
	<div class="flex justify-between gap-5 items-center shadow p-2 rounded my-1">
		<div>Approval Fee Payment</div>
		<form action="{{route('s.approval')}}" method="post">
			@csrf
			<input type="hidden" name="id" value="{{$item->id}}" />
			@if($item->latestApprovalPayment==null) 
			<x-primary-button class="ms-0 mt-2">
                Pay 
            </x-primary-button>
			@endif 
			@if($item->latestApprovalPayment!=null && $item->latestApprovalPayment->status==null)
			Pending Verification
			@endif
		</form>
	</div>
	@endif

</form>


</div>
	@endforeach
 
</div>


@php
$xc=Modules\Proprietors\Models\Application::where(['owner_id'=>auth()->user()->id])->count();
@endphp

@if($xc==0)
	<div>
		<div class="text-2xl">Create a New Application</div>
	<p>Select the type of institution you wish to establish, then you can proceed to make payment on the next page.</p>
	<div class="grid md:grid-cols-2 gap-5">
	@foreach($cats as $item)
	 
	<a class="my-2 p-3 bg-gray-200 shadow" style="text-decoration: none;" href="{{route('application.types.show',['application_type'=>$item->id])}}">{{$item->category_name}}</a>
 
	@endforeach
</div>
</div>
@endif

	<div>

		

</div>

</x-app-layout>