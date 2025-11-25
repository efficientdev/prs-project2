 <x-app-layout>
<div class="mb-3 text-xl font-bold">Pending Approvals</div>


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
            <td>{{ $approval->application->data['sectionA']['proposed_name']??'' }}<br/> {{ $approval->application->category->category_name??'' }}</td>
            <td>{{ $approval->stage->name??'n/a' }}</td>
            <td>
                

<a href="{{ route('registration.timeline', $approval->application->id??0) }}" class="btn btn-sm btn-primary">Summary</a>

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