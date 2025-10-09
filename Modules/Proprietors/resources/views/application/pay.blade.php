<x-app-layout>

<div class="mx-auto p-10">
    <h2>Make {{ ucfirst($type) }} Fee Payment </h2>

    <div class="text-2xl">{{$v3->category_name}}</div><br/>

        Amount ₦{{number_format(($a->meta['fee']??'0'),2)}}<br/>

Payment Method: Bank Transfer<br/>
<div class="grid gap-5">

    <form action="{{ route('payments.store', ['type' => $type, 'ownerId' => $ownerId]) }}" method="POST">
        
        @csrf
        <x-redirect-input route-name="registration.sectionG.show" :params="['form_id' => $a->id]" />
        <input type="hidden" name="payment_type" value="bank" />


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

         

            <x-primary-button class="ms-0 mt-2">
                Proceed
            </x-primary-button>

    </form>
    <hr/>
    <form action="{{ route('payments.store', ['type' => $type, 'ownerId' => $ownerId]) }}" method="POST">


        Plus Charges ₦ {{number_format(($a->meta['applicable_charge']??'0'),2)}}<br/>
        @csrf
 
 
Payment Method: Online (Paystack)<br/><x-redirect-input route-name="registration.sectionG.show" :params="['form_id' => $a->id]" />
<input type="hidden" name="payment_type" value="online" /> 
            <!--<div>
                <label>Email:</label>
                <input type="email" name="email" value="{{ old('email') }}">
            </div> -->

       
            <x-primary-button class="ms-0 mt-2">
                Proceed
            </x-primary-button>
    </form>

<!--
        {{!!$a!!}}-->
        <br/>
</div>
</div>
<!--
    <script>
        function toggleFields() {
            let method = document.getElementById('payment_type').value;
            document.getElementById('bank-fields').style.display = (method === 'bank' ? 'block' : 'none');
            document.getElementById('online-fields').style.display = (method === 'online' ? 'block' : 'none');
        }
        document.getElementById('payment_type').addEventListener('change', toggleFields);
        toggleFields();
    </script>-->
</x-app-layout>
