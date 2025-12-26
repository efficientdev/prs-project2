<x-prss::layouts.master>
@php
//$data=$sectionD;
@endphp
<form method="POST" action="{{ route('prss.sectionD.store', $report->id) }}">
    @csrf

    <h2 class="text-lg font-bold mb-4">Section D: Infrastructure & Facilities</h2>

  
    @include('prss::report.uploadbox2')

    <div class="flex justify-between">
        <a href="{{ route('prss.sectionC.show', $report->id) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>
</form></x-prss::layouts.master>
