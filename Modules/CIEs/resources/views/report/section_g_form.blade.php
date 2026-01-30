<x-cies::layouts.master>
@php
//$data=$sectionG;
@endphp
    <h2 class="text-lg font-bold mb-4">Section E: Observations & Recommendations</h2>

    
    <?php
    /*
    @include('cies::report.lightbox')
    */
    ?>
    <div class="border-b py-2 my-2"><span class="font-bold">Acceptable Formats:</span> jpg,png,pdf (5MB max each)</div>


@php
$tabslist=[ 
'Single Uploads Per Category',
'Multiple Uploads Per Category',
'Many Uploads At once',
'Many Uploads Per Category At once'
];

$allowdelete='yes';

@endphp

<x-tabs :labels="$tabslist"> 
    <x-slot name="tab0"> 
<div class="shadow rounded p-2 m-2"> 
    
        <div class="text-lg font-bold mb-2">Single Uploads Per Category</div>
    @include('cies::report.uploadbox2')</div>

    </x-slot>
    <x-slot name="tab1"> 
<div class="shadow rounded p-2 m-2"> 
    
        <div class="text-lg font-bold mb-2">Multiple Uploads Per Category</div>
    @include('cies::report.uploadboxm')</div>

    </x-slot>
    <x-slot name="tab2"> 
<div class="shadow rounded p-2 m-2"> 
    
        <div class="text-lg font-bold mb-2">Many Uploads At once</div>
    @include('cies::report.uploadbox2a')</div>

    </x-slot>
    <x-slot name="tab3"> 
<div class="shadow rounded p-2 m-2"> 
    
        <div class="text-lg font-bold mb-2">Many Uploads Per Category At once</div>
    @include('cies::report.uploadboxma')</div>

    </x-slot>
</x-tabs>


<form method="POST" action="{{ route('cies.sectionG.store', $report->id) }}" enctype="multipart/form-data">
    @csrf
 

    <div class="mb-4">
        <label>Observations</label>
        <textarea name="observations" class="w-full border p-2" rows="4">{{ old('observations', $data['observations'] ?? '') }}</textarea>
    </div>

    <div class="mb-4">
        <label>Recommendations</label>
        <textarea name="recommendations" class="w-full border p-2" rows="4">{{ old('recommendations', $data['recommendations'] ?? '') }}</textarea>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('cies.sectionD.show', $report->id) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">SUBMIT</button>
    </div>
</form>
</x-cies::layouts.master>