<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 px-6">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Payment #{{ $payment->id }}</h2>
            <p class="text-sm text-gray-600 mt-1">
                Parent: <span class="font-medium">{{ class_basename($payment->payable_type) }} #{{ $payment->payable_id }}</span>
            </p>
            <p class="text-sm text-gray-600">
                Type: <span class="font-medium capitalize">{{ $payment->payment_type }}</span>
            </p>
            <p class="text-sm text-gray-600">
                Status: <span class="inline-block px-2 py-1 text-xs rounded 
                    {{ $payment->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                    {{ ucfirst($payment->status) }}
                </span>
            </p>
        </div>

        <section class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Details</h3>
            <ul class="space-y-2 text-sm text-gray-700">
                <li>
                    <strong>Amount:</strong> {{ data_get($payment->meta, 'amount') }}
                </li>

                @if ($payment->payment_type === 'bank')
                    <li><strong>SB:</strong> {{ data_get($payment->meta, 'sb') }}</li>
                    <li><strong>CMP:</strong> {{ data_get($payment->meta, 'cmp') }}</li>
                    <li><strong>Phone:</strong> {{ data_get($payment->meta, 'phone') }}</li>
                @else
                    <li><strong>Email:</strong> {{ data_get($payment->meta, 'email') }}</li>
                    <li><strong>Reference:</strong> {{ $payment->reference }}</li>
                @endif
            </ul>
        </section>
    </div>
</x-app-layout>
<x-app-layout>

    <h2>Payment #{{ $payment->id }}</h2>

    <p>Parent: {{ class_basename($payment->payable_type) }} #{{ $payment->payable_id }}</p>
    <p>Type: {{ $payment->payment_type }}</p>
    <p>Status: {{ $payment->status }}</p>

    <h3>Details</h3>
    <ul>
        <li>Amount: {{ data_get($payment->meta, 'amount') }}</li>
        @if ($payment->payment_type === 'bank')
            <li>SB: {{ data_get($payment->meta, 'sb') }}</li>
            <li>CMP: {{ data_get($payment->meta, 'cmp') }}</li>
            <li>PHONE: {{ data_get($payment->meta, 'phone') }}</li>
        @else
            <li>Email: {{ data_get($payment->meta, 'email') }}</li>
            <li>Reference: {{ $payment->reference }}</li>
        @endif
    </ul>
 
</x-app-layout>