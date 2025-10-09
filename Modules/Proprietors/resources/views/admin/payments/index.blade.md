<x-app-layout>

    <h2>All Payments</h2>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Parent</th>
            <th>User</th>
            <th>Type</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Reference</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($payments as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ class_basename($p->payable_type) }} #{{ $p->payable_id }}</td>
                <td>{{ optional($p->payable)->user_id ?? '-' }}</td>
                <td>{{ $p->payment_type }}</td>
                <td>{{ data_get($p->meta, 'amount') }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->reference }}</td>
                <td>{{ $p->created_at }}</td>
                <td><a href="{{ route('admin.payments.show', $p->id) }}">View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $payments->links() }}

</x-app-layout>
