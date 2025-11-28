
        <div class="  shadow-md rounded-lg p-6 space-y-4">

            <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Payment Summary</h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm text-gray-700">
                <div>
                    <span class="font-medium">Parent:</span>
                    {{ class_basename($payment->payable_type) }} #{{ $payment->payable_id }}
                </div>
                <div>
                    <span class="font-medium">Type:</span> {{ ucfirst($payment->payment_type) }}
                </div>
                <div>
                    <span class="font-medium">Status:</span> 
                    <span class="px-2 py-1 rounded 
                        {{ $payment->status === 'approved' ? 'bg-green-100 text-green-800' : 
                           ($payment->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : 
                           'bg-red-100 text-red-800') }}">
                        {{ ucfirst($payment->status) }}
                    </span>
                </div>
                <div>
                    <span class="font-medium">Reference:</span> {{ $payment->reference ?? '—' }}
                </div>
            </div>

        </div>

        <!-- Meta / Details Card -->
        <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
            <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Payment Details</h3>

            <ul class="list-disc list-inside text-gray-700 space-y-1 text-sm">
                <li><strong>Amount:</strong>  ₦{{ number_format(data_get($payment->meta, 'amount') ?? '0' ,2) }}  </li>

                @if ($payment->payment_type === 'bank')
                    <li><strong>SB code:</strong> {{ data_get($payment->meta, 'sb') ?? '—' }}</li>
                    <li><strong>CMP code:</strong> {{ data_get($payment->meta, 'cmp') ?? '—' }}</li>
                    <li><strong>Phone:</strong> {{ data_get($payment->meta, 'phone') ?? '—' }}</li>
                @else
                    <li><strong>Email:</strong> {{ data_get($payment->meta, 'email') ?? '—' }}</li>
                @endif
            </ul>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
            <h3 class="text-lg font-semibold text-gray-800 border-b pb-2">Payment Evidence</h3> 
            @php

                $meta=$payment->meta??[];
                $ev=$meta['evidence']??[];

            @endphp

            @forelse($ev as $evItem)
                <a href="{{ $evItem }}">{{ $evItem }}</a>
            @empty
                <p>No Evidence</p>
            @endforelse


               


        </div>