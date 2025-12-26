<x-prss::layouts.master>
@php
//$data=$sectionG;
@endphp
    <h2 class="text-lg font-bold mb-4">Section E: Observations & Recommendations</h2>

    

<form method="POST" action="{{ route('prss.sectionG.store', $report->id) }}" enctype="multipart/form-data">
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
        <a href="{{ route('prss.sectionD.show', $report->id) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>
</form>
</x-prss::layouts.master>