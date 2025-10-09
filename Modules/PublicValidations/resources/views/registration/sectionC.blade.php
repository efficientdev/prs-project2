<x-publicvalidations::layouts.master>

@extends('publicvalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section C: Staffing Data</h1>

<form method="POST" action="{{ route('public.validation.sectionC.store', $form_id) }}" class="space-y-6">
    @csrf

    @php
        $staffCategories = ['Head Teachers/Principals', 'Teaching Staff', 'Non-Teaching Staff', 'Total'];
    @endphp

    <div class="overflow-auto">
        <table class="min-w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2 border">Category</th>
                    <th class="p-2 border">Male</th>
                    <th class="p-2 border">Female</th>
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">TRCN Registered</th>
                    <th class="p-2 border">Non-Registered</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($staffCategories as $i => $category)
                <tr>
                    <td class="p-2 border">
                        <input type="text" name="staff[{{ $i }}][category]" value="{{ $category }}" readonly class="input bg-gray-100">
                    </td>
                    <td class="p-2 border">
                        <input type="number" name="staff[{{ $i }}][male]" value="{{ old("staff.$i.male", $data['staff'][$i]['male'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                    <td class="p-2 border">
                        <input type="number" name="staff[{{ $i }}][female]" value="{{ old("staff.$i.female", $data['staff'][$i]['female'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                    <td class="p-2 border">
                        <input type="number" name="staff[{{ $i }}][total]" value="{{ old("staff.$i.total", $data['staff'][$i]['total'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                    <td class="p-2 border">
                        <input type="number" name="staff[{{ $i }}][trcn]" value="{{ old("staff.$i.trcn", $data['staff'][$i]['trcn'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                    <td class="p-2 border">
                        <input type="number" name="staff[{{ $i }}][non_trcn]" value="{{ old("staff.$i.non_trcn", $data['staff'][$i]['non_trcn'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-between">
        <a href="{{ route('public.validation.sectionB.show', $form_id) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>
</form>
@endsection
</x-publicvalidations::layouts.master>
