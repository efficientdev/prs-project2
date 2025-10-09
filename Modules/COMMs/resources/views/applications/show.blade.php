<x-app-layout>

 


<div class="grid mb-10 rounded bg-white gap-10">

	<form method="post" action="{{route('commissioner.applications.store')}}" enctype="multipart/form-data">
		@csrf

		<input type="hidden" name="application_id" value="{{$application->id??0}}" />

<!--include('cies::applications.cieform') 
-->

<div  class="text-2xl font-bold">{{$application->applicationStatus->status_name??''}}
</div>

<!--
"cie": { 
        "inspectors": "ui",
        "year_founded": "erui",
        "catchment_area": "u",
        "inspection_date": "uifi",
        "inspection_purpose": "iidi" 
        "notes": "rss", 
    },

{{json_encode($cData)}}
-->

<x-collapse title="Application Summary">
@include('proprietors::applicationdisplay')
</x-collapse>

<x-collapse title="CIE Inspection Report">
@include('dgs::applications.ciedisplay')
</x-collapse>


<!--
<div>
	<div  class="text-xl">CIE Inspection Notes</div>
	{{$cData['notes']??''}}
</div>-->

<div class="text-xl">CIE Inspection Attachments</div>
{{-- Show existing uploaded documents --}}
@if(!empty($cData['docs']))
    @foreach($cData['docs'] as $doc)
        @if(!empty($doc))
            <div class="mb-1">
                <a href="{{ asset('storage/' . $doc) }}" target="_blank">{{ basename($doc) }}</a>
            </div>
        @endif
    @endforeach
@endif


<div class="text-2xl mt-2">REMARK HISTORY</div>
<!--
{{$application->remarks}}-->
    
    <table class="font-bold mb-5">
    @foreach($application->remarks as $remark)
    <tr>
        <td>{{$remark->reviewer_role}}</td>
        <td>{{$remark->reviewer->name??''}}</td>
        <td>{{$remark->meta['notes']??''}}</td>
        <td>{{$remark->status}}</td>
        <td>{{$remark->created_at}}</td>
    </tr>
    @endforeach
</table>

{{json_encode($commData)}}


<div class="text-2xl my-2 font-bold"><h5><br><b>Comment </b><hr></h5></div>
<div class="form-group  ">
    <textarea class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="notes" required="required">
{{old('notes')?old('notes'):(isset($commData['notes'])?$commData['notes']:'')}}</textarea>
</div>

<div class="flex gap-5">
    <label class="flex gap-2 items-center">
        <input type="radio" required name="proceed" value="approve">
        Approve
    </label>
    <label class="flex gap-2 items-center">
        <input type="radio" required name="proceed" value="reject">
        Reject
    </label>
</div>



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