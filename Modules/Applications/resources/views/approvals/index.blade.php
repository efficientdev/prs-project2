 <x-app-layout>
<h2>My Pending Approvals</h2>

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
        <tr>
            <td>{{ $approval->application->title }}</td>
            <td>{{ $approval->stage->name }}</td>
            <td>
                <a href="{{ route('approvals.show', $approval) }}" class="btn btn-sm btn-primary">Review</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $approvals->links() }}
</x-app-layout>