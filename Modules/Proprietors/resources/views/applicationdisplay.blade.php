
<div class="mx-auto ">

 

OWNERSHIP
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

</div>
