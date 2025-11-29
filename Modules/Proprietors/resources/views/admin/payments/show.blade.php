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

        <div class="flex justify-center items-center space-x-4">
            <x-application-logo class="w-8 h-8 text-gray-600" />
        </div>



        @include('proprietors::admin.payments.partialreceipt')

                
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
