<x-app-layout>

 


<div class="grid  p-10 rounded bg-white gap-10">


<x-collapse title="Open CIE Inspection Report">
@include('proprietors::applicationdisplay')
</x-collapse>

	<form method="post" action="{{route('cie.applications.store')}}" enctype="multipart/form-data">
		@csrf

		<input type="hidden" name="application_id" value="{{$application->id??0}}" />

@include('cies::applications.cieform') 

    <button type="submit"
        class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400">
        Submit
    </button>
	</form>

<!--
	{{$application}}

-->

	</div>
</x-app-layout>