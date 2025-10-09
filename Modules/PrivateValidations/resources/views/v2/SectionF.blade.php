<x-privatevalidations::layouts.master>

@extends('privatevalidations::components.layouts.x')

@section('content')
<h1 class="text-2xl font-bold mb-6">Section F: Compliance & Renewal</h1>

<form method="POST" action="{{ route('private.validation.sectionF.store', ['form_id' => $form_id]) }}" enctype="multipart/form-data" class="space-y-6" x-data="{ renewalYear: '', paidRenewalFees: '{{ old('paid_renewal_fees', $data['paid_renewal_fees'] ?? '') }}' }">
    @csrf

    <div>
        <label for="last_renewal_date" class="block font-medium">Date of Last Renewal</label>
        <input
            type="date"
            name="last_renewal_date"
            id="last_renewal_date"
            value="{{ old('last_renewal_date', $data['last_renewal_date'] ?? '') }}"
            required
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        >
        @error('last_renewal_date') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <fieldset>
        <legend class="block font-medium mb-2">Upload Renewal Receipt for the Years</legend>

        @foreach ([2022, 2023, 2024, 2025] as $year)
            <div class="mb-4">
                <label for="renewal_receipt_{{ $year }}" class="block font-semibold">Year {{ $year }}</label>
                <input
                    type="file"
                    name="renewal_receipts[{{ $year }}]"
                    id="renewal_receipt_{{ $year }}"
                    accept="image/*,application/pdf"
                    required
                    class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                >
                @error("renewal_receipts.$year") <p class="text-red-600">{{ $message }}</p> @enderror
            </div>
        @endforeach
    </fieldset>

    <div>
        <label for="expiry_date" class="block font-medium">Expiry Date</label>
        <input
            type="date"
            name="expiry_date"
            id="expiry_date"
            value="{{ old('expiry_date', $data['expiry_date'] ?? '') }}"
            readonly
            class="input bg-gray-100 cursor-not-allowed"
            placeholder="Auto-validated from database"
        >
        @error('expiry_date') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Has the school paid renewal fees?</label>
        <select
            name="paid_renewal_fees"
            x-model="paidRenewalFees"
            required
            class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
        >
            <option value="">-- Select --</option>
            <option value="YES" {{ old('paid_renewal_fees', $data['paid_renewal_fees'] ?? '') === 'YES' ? 'selected' : '' }}>Yes</option>
            <option value="NO" {{ old('paid_renewal_fees', $data['paid_renewal_fees'] ?? '') === 'NO' ? 'selected' : '' }}>No</option>
        </select>
        @error('paid_renewal_fees') <p class="text-red-600">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-between mt-6">
        <a href="{{ route('private.validation.sectionE.show', ['form_id' => $form_id]) }}" class="btn bg-gray-500 text-white px-6 py-2 rounded hover:bg-gray-600">Previous</a>
        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Next</button>
    </div>
</form>

<style>
.input {
    @apply border rounded p-2 w-full;
}
.btn {
    @apply font-semibold;
}
</style>
@endsection
</x-privatevalidations::layouts.master>

