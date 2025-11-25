<x-app-layout>
    <div class="">
        <div class="mb-8">
            <!--<h2 class="text-2xl font-bold text-gray-800">Payment #{{ $payment->id }}</h2>
            <p class="text-sm text-gray-600 mt-1">
                Parent: <span class="font-medium">{{ class_basename($payment->payable_type) }} #{{ $payment->payable_id }}</span>
            </p>-->
            <h2 class="text-2xl font-bold text-gray-800">
                Reference: <span class="font-medium">{{ $payment->reference??'' }}</span>
            </h2>
            <p class="text-sm text-gray-600">
                Type: <span class="font-medium capitalize">{{ $payment->payment_type }}</span>
            </p>
            <p class="text-sm text-gray-600">
                Status:  <span class="inline-block px-2 py-1 text-xs rounded 
                    {{ $payment->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">Payment 
                    {{ ucfirst($payment->status) }}
                </span>
            </p>
        </div>

        <section class="bg-white shadow rounded-lg p-6">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">Details</h3>
            <ul class="space-y-2 text-sm text-gray-700">
                <li>
                    <strong>Amount:</strong> ₦{{ number_format(data_get($payment->meta, 'amount'),2) }}
                </li>

                @if ($payment->payment_type === 'bank')
                    <li><strong>SB code:</strong> {{ data_get($payment->meta, 'sb') }}</li>
                    <li><strong>CMP code:</strong> {{ data_get($payment->meta, 'cmp') }}</li>
                    <li><strong>Phone:</strong> {{ data_get($payment->meta, 'phone') }}</li>
                @else
                    <li><strong>Email:</strong> {{ data_get($payment->meta, 'email') }}</li>
                    <li><strong>Reference:</strong> {{ $payment->reference }}</li>
                @endif
            </ul>
        </section>

        <!-- Back Button -->
        <div>
            @php
            $redirect=$payment->redirect_to??[];
    //$url = route($redirect['route'], $redirect['params']);
@endphp

<a href="{{ $redirect['route'] }}" class="inline-flex mt-5 items-center text-sm text-blue-600 hover:underline">
                <x-heroicon-o-arrow-left class="w-4 h-4 mr-1" />
                Back to list</a>

            <!--<a href="{{ route('registration.sectionG.show', ['form_id' => $payment->payable->registration_id ?? 'default']) }}"
                class="inline-flex items-center text-sm text-blue-600 hover:underline">
                <x-heroicon-o-arrow-left class="w-4 h-4 mr-1" />
                Back to list
            </a>-->
        </div>
    </div>
</x-app-layout> 