<x-app-layout>

<div class="grid   gap-5    ">
 

    <div > 


    <div class="text-2xl font-bold capitalize">{{$v3->category_name}}</div>
    <div><span class="text-2xl font-bold capitalize">Dimension of land (min ft) </span><br/>{{$v3->category_min_breadth}} X {{$v3->category_min_length}}</div>

    <div>
        <div class="flex justify-between"><div><span class="text-2xl font-bold capitalize">Approval Fee</span> <br/># {{number_format($v3->category_app_fee)}} </div>
        <form method="get" action="{{route('registration.create',['cat_id'=>$v3->id])}}">

                <x-primary-button class="ms-0 mt-5">
                   Apply
                </x-primary-button> 
        </form></div>
    </div>

<x-tabs :labels="$tabslist">
    
 
    <x-slot name="tab0">

<!--
        <div class="text-2xl my-3 border-b capitalize pb-1"> requirements</div>-->
    <div class="pl-4 grid md:grid-cols-2 gap-5">
                        @foreach($reqs as $kIndex=>$requirement)

                        @if($requirement->note)<div><div class="">{{$requirement->requirement_name}}</div>
                        <div class="text-sm mb-4 text-gray-500">{{$requirement->note??'Detailed '.$requirement->requirement_name}}</div>
                    </div>@endif
                        @endforeach
                    </div>
    </x-slot>
 
</x-tabs>


    

</div>

</x-app-layout>