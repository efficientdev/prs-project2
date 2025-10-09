<x-app-layout>

 

<!--
<div class="grid   mt-10 p-10 rounded bg-white gap-10">-->
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-semibold mb-4"> <b>Pending Applications </b></h1>
    <!-- Search Form -->
    <form method="GET" action="{{ route('cie.applications.index') }}" class="mb-4">
        <div class="flex space-x-2">
            <input 
                type="text" 
                name="search" 
                value="{{ request('search') }}"
                placeholder="Search by category, owner, or proposed name" 
                class="border border-gray-300 rounded px-3 py-2 w-full"
            >
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Search</button>
        </div>
    </form>

<table id="applicants_table" class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							School Type
						</th>
						<th>
							Proprietor
						</th>
						<th>
							Proposed School Name
						</th>
						<th>
							Status
						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($applications as $application)
					<tr 
    x-data 
    @click="window.location.href='{{ route('dg.applications.show', $application->id) }}'" 
    class="cursor-pointer hover:bg-gray-100"
>
    <td>
        {{$application->category->category_name??''}}
    </td>
    <td>
        {{$application->owner->name??''}}
    </td>
    <td>
        {{$application->meta['proposed_name'] ?? ''}}
    </td>
    <td>Pending</td>
</tr>

					 

					<?php
					/*$can_status = $user->getCanStatus->where('map_status_status',$item->school_status)->count();
					?>
					<tr class="@if($can_status == 0)mute @endif">

						<td class="haslink" data-url="{{url("/min/" . $item->school_id)}}">
						{{$item->getType->school_type_name}} School</td>
						<td class="haslink uppercase" data-url="{{url("/min/" . $item->school_id)}}">{{$item->getOwner->person_surname.' '.$item->getOwner->person_names}}</td>
						<td class="haslink" data-url="{{url("/min/" . $item->school_id)}}">{{$item->school_name}}</td>
						<td class="haslink @if($item->school_status == $approved) text-success @elseif($item->school_status < 0) text-warning @endif" data-url="{{url("/min/" . $item->school_id)}}"><b>@if($item->school_date_pickup != null) Picked Up {{$item->school_date_pickup->format("jS M Y")}} @else {{$item->getStatus->school_status_name}} - <small>{{percent($item->school_status,$approved)}} </small> @endif</b></td>
					</tr>*/
					?>
					@endforeach

					 
					@if($applications->total() == 0)
					<tr><td class="text-center" colspan="4"><b class="text-warning">No applications found!</b></td></tr>
					@endif
					 
				</tbody>
			</table>


    <!-- Pagination -->
    <div class="mt-4">
        {{ $applications->withQueryString()->links() }}
    </div>

	</div>
	
</x-app-layout>