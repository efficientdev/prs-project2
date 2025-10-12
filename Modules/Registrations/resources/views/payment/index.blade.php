<div >
     
    <div class="text-2xl">{{$category->category_name}}</div> 
 
        Application Fee :  ₦{{number_format(($payment->meta['fee']??'0'),2)}}<br/>




@if($a!=null && $a->registrationPayment) 

        @php
        $application=$a->registrationPayment;
        @endphp

     

         
        <div class="grid grid-cols-2 mt-10">
        <!--    <div class="card mb-3">
                <div class="card-body">
                    <h5>Payment Info</h5>
                    <p><strong>ID:</strong> {{ $application->id }}</p>
                    <p><strong>Application ID:</strong> {{ $application->application_id }}</p>
                    <p><strong>Status:</strong> {{ $application->status ?? 'N/A' }}</p><p><strong>Created At:</strong> {{ \Carbon\Carbon::parse($application->created_at)->format('d M Y H:i') }}</p>
                     
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <h5>Meta Information</h5>
                    <p><strong>Fee:</strong> {{ number_format($application->meta['fee']) }}</p>
                    <p><strong>Applicable Charge:</strong> {{ number_format($application->meta['applicable_charge']) }}</p>
                    <p><strong>Type ID:</strong> {{ $application->meta['type_id'] }}</p> 
                </div>
            </div>-->
        </div> 

        @if(!empty($application->payments))
            <div class="card">
                <div class="card-body">
                    <h1 class="text-2xl font-bold my-1">Available Payments</h1>
                    @foreach($application->payments as $payment1)
                        <div class="border rounded p-3 mb-3">

                            <div class="grid grid-cols-2">
                                <div><!--
                                    <p><strong>Payment ID:</strong> {{ $payment1['id'] }}</p>-->
                                    <p><strong>Reference:</strong> {{ $payment1['reference'] ?? 'N/A' }}</p>
                                    <p><strong>Type:</strong> {{ ucfirst($payment1['payment_type']) }}</p>
                                    <p class="capitalize"><strong>Status:</strong> Payment {{ ucfirst($payment1['status']) }}</p>
                                    <p><strong>Amount Paid:</strong> ₦{{ number_format($payment1['meta']['amount'],2) }}</p>
                                </div>
                                <div>
                                    @if($payment1['payment_type']=="bank")<h6 class="mt-2">Payment Meta</h6>
                                    <ul>
                                        <li><strong>SB:</strong> {{ $payment1['meta']['sb'] }}</li>
                                        <li><strong>CMP:</strong> {{ $payment1['meta']['cmp'] }}</li>
                                        <li><strong>Phone:</strong> {{ $payment1['meta']['phone'] }}</li>
                                    </ul>@endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @else
            <div>None found</div>
        @endif 
      
@endif


@php
$tabslist=['Previous Registration Payment Mode','New Registration Payment: Online (Paystack)'];
@endphp

<x-tabs :labels="$tabslist">
    

    <x-slot name="tab0"> 

<div class="grid gap-5 mx-6">

    <form action="{{ route('payments.store', ['type' => $type, 'ownerId' => $ownerId]) }}" method="POST">
        
        @csrf
        
        <input type="hidden" name="payment_type" value="bank" />

        <x-redirect-input route-name="registration.sectionG.show" :params="['form_id' => $a->id]" />
 


        <div id="bank-fields" class="grid md:grid-cols-2 gap-2"  >
            <div>
                 

            <x-input-label for="sb" value="{{'SB'}}" />
            <x-text-input id="sb" class="block mt-1 w-full"
                            type="text"
                            name="sb"
                            value="{{ old('sb') }}"
                            required  />

            <x-input-error :messages="$errors->get('sb')" class="mt-2" />

            </div>
            <div>

            <x-input-label for="cmp" value="{{'CMP'}}" />
            <x-text-input id="cmp" class="block mt-1 w-full"
                            type="text"
                            name="cmp"
                            value="{{ old('cmp') }}"
                            required  />

            <x-input-error :messages="$errors->get('sb')" class="mt-2" />


            </div>
            <div>

            <x-input-label for="phone" value="{{'Phone'}}" />
            <x-text-input id="phone" class="block mt-1 w-full"
                            type="text"
                            name="phone"
                            value="{{ old('phone') }}"
                            required  /> 
            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
 
            </div>

        <div>

            <x-input-label for="amount" value="{{'Amount Paid'}}" />
            <x-text-input id="amount" class="block mt-1 w-full"
                            type="number"
                            name="amount"
                            value="{{ old('amount') }}"
                            step="0.01"
                            required  /> 
            <x-input-error :messages="$errors->get('amount')" class="mt-2" />
  
        </div>
        </div>

         <br/>

            <x-primary-button class="ms-0 mt-2">
                Request Confirmation
            </x-primary-button>

    </form>
</div></x-slot>

    <x-slot name="tab1"> 

    <form class="mx-6" action="{{ route('payments.store', ['type' => $type, 'ownerId' => $ownerId]) }}" method="POST">

        One time payment of ₦{{number_format(($payment->meta['fee']??'0'),2)}}<br/>


        Applicable Charges ₦{{number_format(($payment->meta['applicable_charge']??'0'),2)}}<br/>
        @csrf
 
  
        <x-redirect-input route-name="registration.sectionG.show" :params="['form_id' => $a->id]" />
<input type="hidden" name="payment_type" value="online" /> 
        
       
            <x-primary-button class="ms-0 mt-2">
                Proceed
            </x-primary-button>
    </form>
 </x-slot>
</x-tabs>

</div>

