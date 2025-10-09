<x-guest-layout2>

<div class="mx-auto p-10">

 

<div class="text-2xl font-bold flex mb-5">
<div class="border-b py-1 ">OWNERSHIP</div></div>

<div class="grid grid-cols-2">

<div><div class="text-xl font-bold">Full Name of Proprietor</div>
{{$application->owner->name}}
</div>
<div><div class="text-xl font-bold">Qualifications of Proprietor
</div>{{$application->meta['owner_qualifications']??''}}
</div>
<div><div class="text-xl font-bold">Contact Number
</div>{{$application->owner->meta['phone']??''}}
</div>
<div><div class="text-xl font-bold">Contact Email Address
</div>{{$application->owner->email??''}}
</div>
<div><div class="text-xl font-bold">Residential Address
</div>{{$application->meta['owner_address']??''}}
</div>
<div><div class="text-xl font-bold">Local Government Area / City
</div>{{$application->ownerMeta['lga']??'n/a'}}Egor / {{$application->ownerMeta['city']??'n/a'}}Agenebode
</div>

</div>

<div class="text-2xl font-bold mt-10 flex mb-5">
<div class="border-b py-1 ">SCHOOL INFORMATION</div></div>
<div class="grid grid-cols-2">

<div><div class="text-xl font-bold">
Type of Institution</div>
newly registered</div>

<div><div class="text-xl font-bold">
Proposed Name of School</div>
2</div>

<div><div class="text-xl font-bold">
Local Government Area</div>
Akoko Edo</div>


<div><div class="text-xl font-bold">
City</div>
Agenebode</div>


<div><div class="text-xl font-bold">
Actual Location of School</div>
3</div>


<div><div class="text-xl font-bold">
Postal Address</div>
2</div>


<div><div class="text-xl font-bold">
Purpose for Establishment</div>
2</div>


</div>
</div>

</x-guest-layout2>