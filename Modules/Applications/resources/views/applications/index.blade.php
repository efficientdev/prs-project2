 <x-app-layout>
<h2>All Applications</h2>
<a href="{{ route('applications.create') }}" class="btn btn-primary mb-3">Submit New Application</a>

<table class="table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Current Stage</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($applications as $app)
        <tr>
            <td>{{ $app->title }} </td>
            <td>{{ $app->status }}</td>
            <td>{{ optional($app->currentApproval()->stage ?? null)->name ?? 'N/A' }}</td>
            <td>
                <a href="{{ route('applications.show', $app) }}" class="btn btn-sm btn-info">View</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $applications->links() }}
</x-app-layout>