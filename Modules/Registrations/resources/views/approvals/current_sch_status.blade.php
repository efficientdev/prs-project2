@php

//current_sch_status.blade.php

@endphp

 <x-app-layout>
    <div class="flex justify-between items-center">
<div class="mb-3 text-xl font-bold">Pending Approvals</div>


<form method="GET" action="{{ url()->current() }}" class="flex gap-2 items-center">
	<div>
		<input type="text" name="name" value="{{ request('name')}}" class="w-full" />
	</div>
    <select name="stage_id" ><!--onchange="this.form.submit()"-->
        <option value="">-- Select Stage --</option>

        @foreach ($stages as $stage1)
            <option value="{{ $stage1->id }}"
                {{ request('stage_id') == $stage1->id ? 'selected' : '' }}>
                {{ $stage1->name }}
            </option>
        @endforeach
    </select>
    <button>search</button>
</form>

</div>

 @if($approvals->count() == 0)
        <div class="text-center py-12">
            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-gray-100 mb-4">
                <i class="fas fa-inbox text-gray-400 text-2xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 capitalize my-1">No registrations pending yet</h3>
            <p class="text-gray-500 max-w-md mx-auto">When there are pending registrations they will appear here.</p> 
        </div>
        @else

<table class="table">
    <thead>
        <tr>
            <th>Application</th>
            <th>Stage</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($approvals as $approval)
        @if(!empty($approval))
        <tr>
            <td>{{ $approval->data['sectionA']['proposed_name']??'' }}<br/> {{ $approval->category->category_name??'' }}</td>
            <td>{{ $approval->stage->name??'n/a' }} 
 

@php

$status='';
if(isset($approval->cies_reports) && !empty(isset($approval->cies_reports))){
    $status='- On Going';

    $b111=$approval->cies_reports['sectionG']['submitted']??'no';
    if($b111=='yes'){
        $status='- Done';
    }
}

@endphp

{{$status}}

            </td>
            <td>
                

<a href="{{ route('registration.timeline', $approval->id??0) }}" class="btn btn-sm btn-primary">Summary</a>

<a href="{{ route('srapprovals.show', $approval??0) }}" class="btn btn-sm btn-primary">Review</a>

            </td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table> @if(!empty($approvals))
{{ $approvals->links() }}
@endif
@endif


</x-app-layout>