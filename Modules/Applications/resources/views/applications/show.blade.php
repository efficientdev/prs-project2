 <x-app-layout>
<h2>{{ $application->title }}</h2>
<p>Status: {{ $application->status }}</p>
<p>{{ $application->description }}</p>

<h4>Approval History</h4>
<ul>
    @foreach ($application->approvals as $approval)
        <li>
            <strong>{{ $approval->stage->name }}</strong> - {{ $approval->status }} by {{ $approval->user->name ?? 'N/A' }}
            <br>Comment: {{ $approval->comments ?? 'None' }}
        </li>
    @endforeach
</ul>
</x-app-layout>