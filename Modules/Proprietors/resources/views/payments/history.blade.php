<x-app-layout>

    <h2>Your Payment History</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Parent Type / ID</th>
                <th>Type</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Created At</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($payments as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ class_basename($p->payable_type) }} #{{ $p->payable_id }}</td>
                <td>{{ $p->payment_type }}</td>
                <td>{{ data_get($p->meta, 'amount') }}</td>
                <td>{{ $p->status }}</td>
                <td>{{ $p->created_at }}</td>
                <td><a href="{{ route('payments.show', [
                            'type' => strtolower(class_basename($p->payable_type)),
                            'ownerId' => $p->payable_id,
                            'paymentId' => $p->id
                        ]) }}">View</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $payments->links() }}
    
</x-app-layout>