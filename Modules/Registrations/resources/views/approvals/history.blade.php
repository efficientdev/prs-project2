<div class="px-5">

<div class="flex justify-between items-center"><div><h4 class="text-xl">Approval History</h4></div>
<div>
<p>Status:  {{ ucwords(str_replace('_', ' ', $application->status)) }} </p>
</div></div>

<ul>
    @foreach ($application->approvals as $approval)
        <li class="mt-2 pb-2 border-b">
            <strong>{{ $approval->stage->name }}</strong> - {{ $approval->status }}
@if(!auth()->user()->hasRole('proprietor'))
             by {{ $approval->user->name ?? 'N/A' }}@endif
            <br>
            <div class="flex justify-between"><div>Comment: {{ $approval->comments ?? 'None' }}.</div>
            <div> <i class="far fa-clock mr-1"></i>
                                    Created {{ $approval->created_at->format('M j, Y') }}</div>
                                </div>
        </li>
    @endforeach
</ul>

</div>