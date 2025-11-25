<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <x-application-logo class="w-8 h-8 text-gray-600" />
            <h2 class="text-2xl font-bold text-gray-800 leading-tight">
                Payment #{{ $payment->id }}
            </h2>
        </div>
    </x-slot>

    <div class=" mx-auto  px-6 space-y-6">
        
        <!-- Payment Summary Card -->
        <div class="  shadow-md rounded-lg p-6 space-y-4">
            <div class="flex justify-center items-center space-x-4">
            <x-application-logo class="w-8 h-8 text-gray-600" />
        </div>
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
                        {{ $payment->status === 'completed' ? 'bg-green-100 text-green-800' : 
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

        <!-- Action Buttons -->
        @if ($payment->payment_type === 'bank' && $payment->status === 'pending')
            <div class="flex space-x-4">
                <!-- Approve -->
                <form action="{{ route('admin.payments.approve', $payment->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <label class="block mb-2 text-sm font-medium text-gray-700">Upload Bank Payment Receipt</label>
                <input type="file"
                       name="attachment"
                       required
       accept=".pdf,image/*"
                       class="mb-4 block w-full text-sm text-gray-800 border border-gray-300 rounded p-2" />

                <button type="submit"
                    class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    <x-heroicon-o-check class="w-5 h-5 mr-2" />
                    Approve
                </button>
            </form>

                <!--
                <form action="{{ route('admin.payments.approve', $payment->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                        <x-heroicon-o-check class="w-5 h-5 mr-2" />
                        Approve
                    </button>
                </form>-->

                <!-- Decline -->
                <form action="{{ route('admin.payments.decline', $payment->id) }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <x-heroicon-o-x-circle class="w-5 h-5 mr-2" />
                        Decline
                    </button>
                </form>
            </div>
        @endif

        <!-- Back Button -->
        <div>
            <a href="{{ route('admin.payments.index') }}"
                class="inline-flex items-center text-sm text-blue-600 hover:underline">
                <x-heroicon-o-arrow-left class="w-4 h-4 mr-1" />
                Back to list
            </a>
        </div>
    </div>
</x-app-layout>
