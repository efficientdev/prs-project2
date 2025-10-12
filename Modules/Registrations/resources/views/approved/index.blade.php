 <x-app-layout>
<div class="mb-3 text-xl font-bold">Pending Approvals</div>


 @if(count($forms) == 0)
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
            <th>Status<!--Actions--></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($approvals as $approval)
        <tr>
            <td>{{ $approval->application->data['sectionA']['proposed_name']??'' }}<br/> {{ $approval->application->category->category_name??'' }}</td>
            <td>{{ $approval->stage->name }}


            </td>
            <td>

                @if($approval->approvedApprovalPayment==null)
                    <div>No approval fee payment yet</div>
                @else
                    @if($approval->approvedApprovalPayment->status=="approved")
                        <div>Fully Approved</div>
                    @else
                        <div>Pending Approval Fee Payment Confirmation</div>
                    @endif
                @endif
                
                <a href="{{ route('srapproved.show', $approval) }}" class="btn btn-sm btn-primary">Review</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table> @endif


{{ $approvals->links() }}
</x-app-layout>