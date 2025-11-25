
        @if($a!=null && $a->registrationPayment) 


        @php
        $registrationInvoice=$a->registrationPayment;
        @endphp

        <div class="grid grid-cols-2 items-center">
         <div class="text-2xl">Application Payment </div>

        @if($registrationInvoice->status=="approved")
        <form method="post" action="{{route('registration.receipts.print',['id'=>$a->id])}}">
        	@csrf
        	<input type="hidden" name="type" value="application" />
        	
            <x-primary-button class="ms-0 mt-2">
                Download Receipt
            </x-primary-button> 
        </form> 
        @endif
    </div>
 
            @if(!empty($a->registrationPayment->payments))
                <div class="card">
                    <div class="card-body"><!--
                        <h5>Payments</h5>-->
                        @foreach($registrationInvoice->payments as $payment)
                            <div class="border rounded p-3 mb-3">

                                <div class="grid grid-cols-2">
                                    <div>
                                        <p><strong>Payment ID:</strong> {{ $payment['id'] }}</p>
                                        <p><strong>Type:</strong> {{ ucfirst($payment['payment_type']) }}</p>
                                        <p><strong>Status:</strong> {{ ucfirst($payment['status']) }}</p>
                                        <p><strong>Amount:</strong> ₦{{ number_format($payment['meta']['amount'],2) }}</p>
                                        <p><strong>Reference:</strong> {{ $payment['reference'] ?? 'N/A' }}</p>
                                    </div>
                                    <div>
                                        <h6 class="mt-2">Payment Meta</h6>
                                        @if($payment['payment_type']=="bank")<ul>
                                            <li><strong>SB code:</strong> {{ $payment['meta']['sb'] }}</li>
                                            <li><strong>CMP code:</strong> {{ $payment['meta']['cmp'] }}</li>
                                            <li><strong>Phone:</strong> {{ $payment['meta']['phone'] }}</li>
                                        </ul>@endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif 
 
        @endif
         