<x-app-layout>

<div class="grid   gap-5    ">
 

    <div class="text-2xl font-bold capitalize">{{$v3->category_name}}</div>
<table class="table">
    <tr>
                        <th>Category</th>
                        <th>Dimension of land (min ft)</th>
                        <th>Application fee</th>
                    </tr>
    <tr>
        <td> ({{$v3->category_id}}) &nbsp;{{$v3->category_name}}</td>
        <td>{{$v3->category_min_breadth}} X {{$v3->category_min_length}}</td>
        <td> 
            # {{number_format($v3->category_app_fee)}} 
        </td>
    </tr></table>



<x-tabs :labels="$tabslist">
    

    <x-slot name="tab0">
         
         <p>Before you proceed</p>

@foreach($uploadsList as $uploadItem)
    @if(!isset($a->meta['uploads'][$uploadItem]))
<form method="post" action={{route('doc.uploads')}} class="flex justify-between gap-5 items-center shadow p-2 rounded my-1" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="application_id" value="{{$a->id??0}}" />
    <div  >
        Upload {{$uploadItem}} <br/>
        <input type="file" name="uploads[{{$uploadItem}}]" />
    </div>
            <div><x-primary-button class="ms-0 mt-2">
                Upload
            </x-primary-button></div>
</form>
    @endif
@endforeach

@php
$undone=0;
@endphp
@foreach($uploadsList as $uploadItem)
    @if(!isset($a->meta['uploads'][$uploadItem]))
    @php
        $undone+=1;
    @endphp
    @endif
@endforeach

{{$undone}} undone
@if($undone==0)


        <form class="mb-10" method="post" action="{{route('application.types.update',['application_type'=>$id])}}">
             @csrf
             @method('patch')

            @if($a->applicationPayments==null)
                
                <div class="flex justify-between">
                    @foreach($location as $o)
                    <div class="flex items-center gap-3">
                        <input type="radio" value={{$o}} enabled="{{isset($a)?($a->meta['location_is']==$o?'true':'false'):'false'}}" name="location" /> {{$o}}
                    </div>
                    @endforeach
                </div>
     
                <x-primary-button class="ms-0 mt-5">
                   Proceed with new
                </x-primary-button> 

            @endif

            @if(!$a->applicationPayments)
            <x-primary-button class="ms-0 mt-5">
               Add More Payments
            </x-primary-button>
            @endif
        

        </form>

        <div class="text-2xl">Pending Payments</div>
        @if($a==null)
            <p>No Pending Payments found for this application</p>
        @endif
        @if($a!=null && $a->applicationPayments) 

            @foreach($a->applicationPayments as $application)
                <!--{{!!$application!!}}
            -->

                 
                <div class="grid grid-cols-2">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>Application Info</h5>
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
                            <p><strong>Location:</strong> {{ ucfirst($application->meta['location_is']) }}</p>
                        </div>
                    </div>
                </div>

                @if(!empty($application->payments))
                    <div class="card">
                        <div class="card-body">
                            <h5>Payments</h5>
                            @foreach($application->payments as $payment)
                                <div class="border rounded p-3 mb-3">

                                    <div class="grid grid-cols-2">
                                        <div>
                                            <p><strong>Payment ID:</strong> {{ $payment['id'] }}</p>
                                            <p><strong>Type:</strong> {{ ucfirst($payment['payment_type']) }}</p>
                                            <p><strong>Status:</strong> {{ ucfirst($payment['status']) }}</p>
                                            <p><strong>Amount:</strong> {{ number_format($payment['meta']['amount']) }}</p>
                                            <p><strong>Reference:</strong> {{ $payment['reference'] ?? 'N/A' }}</p>
                                        </div>
                                        <div>
                                            <h6 class="mt-2">Payment Meta</h6>
                                            <ul>
                                                <li><strong>SB:</strong> {{ $payment['meta']['sb'] }}</li>
                                                <li><strong>CMP:</strong> {{ $payment['meta']['cmp'] }}</li>
                                                <li><strong>Phone:</strong> {{ $payment['meta']['phone'] }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif 
             
            @endforeach
        @endif
         

@endif


    </x-slot>
    <x-slot name="tab1">

<!--
        <div class="text-2xl my-3 border-b capitalize pb-1"> requirements</div>-->
    <div class="pl-4 grid md:grid-cols-2 gap-5">
                        @foreach($reqs as $kIndex=>$requirement)
                        <div><div class="">{{$requirement->requirement_name}}</div>
                        <div class="text-sm mb-4 text-gray-500">{{$requirement->note??'Detailed '.$requirement->requirement_name}}</div>
                    </div>
                        @endforeach
                    </div>
    </x-slot>
 
</x-tabs>


    

</div>

</x-app-layout>