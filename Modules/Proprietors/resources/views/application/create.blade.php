<x-guest-layout2>

<div class="mx-auto p-10">

<!--
	{{$category}}<br/>
	{{$application}}<br/>
-->

	<div class="text-center font-bold text-xl">Application to Establish a New {{$category->category_name??'school'}}</div>

	<form action="{{route('application.store')}}" method="post">
		@csrf
		<input type="hidden" name="application_id" value="{{$application->id}}">


@include('proprietors::application.formparts.school')
@include('proprietors::application.formparts.nearby')

@include('proprietors::application.formparts.nm')

@include('proprietors::application.formparts.play')
@include('proprietors::application.formparts.learn')
 

@include('proprietors::application.formparts.staff')
 
<div class="my-2">FEES CHARGEABLE</div>
 

<div class="grid grid-cols-1 md:grid-cols-4 gap-4  "> 
@foreach(explode(',',$category->classes) as $i)

<div  > 
<label class="capitalize text-sm font-medium text-gray-700">
                     {{$i}} fee</label> 
<input type="text"
       name="fees[{{$i}}]" 
       required 
       placeholder="Amount"
       class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" />
  </div>
@endforeach
</div>

@include('proprietors::application.formparts.otherfees')


				<div class="form-group col-md-12 my-5">
					<h5><b><label><input id="declare" name="declaration" required="required" type="checkbox"> I hereby declare that the above stated information is true</label></b></h5>
				</div>

            <x-primary-button class="ms-0 mt-2">
                Proceed
            </x-primary-button>
</form>

</div>

</x-guest-layout2>
