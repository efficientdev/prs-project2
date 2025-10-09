<x-guest-layout2>

<div class="mx-auto p-10">

 

OWNERSHIP
Full Name of Proprietor
{{$a->owner->name}}

Qualifications of Proprietor
{{$a->meta['owner_qualifications']??''}}

Contact Number
{{$a->owner->meta['phone']??''}}

Contact Email Address
{{$a->owner->email??''}}

Residential Address
{{$a->meta['owner_address']??''}}

Local Government Area / City
{{$a->ownerMeta['lga']??'n/a'}}Egor / {{$a->ownerMeta['city']??'n/a'}}Agenebode


SCHOOL INFORMATION
Type of Institution
newly registered
Proposed Name of School
2
Local Government Area
Akoko Edo
City
Agenebode
Actual Location of School
3
Postal Address
2
Purpose for Establishment
2

</div>


</x-guest-layout2>