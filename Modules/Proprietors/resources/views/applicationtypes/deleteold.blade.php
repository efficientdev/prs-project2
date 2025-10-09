<x-app-layout>

<div class="grid   gap-5    ">


<div>you already have a pre existing application for
<div class="text-2xl font-bold capitalize">{{$v3->category_name}}</div>

<div>
Any Payments already made in this category will be lost</div>
<form method="post" action="{{route('application.types.destroy',['application_type'=>$v3->id])}}">
	@csrf
	@method('delete')

	<x-primary-button class="ms-0 mt-2">
                Proceed? 
            </x-primary-button>

</form>
</div>

</div>
</x-app-layout>