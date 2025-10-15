
    <div class="mb-4">
        <label>Observations</label>
        <textarea name="observations" class="w-full border p-2" rows="4">{{ old('observations', $data['observations'] ?? '') }}</textarea>
    </div>

    <div class="mb-4">
        <label>Recommendations</label>
        <textarea name="recommendations" class="w-full border p-2" rows="4">{{ old('recommendations', $data['recommendations'] ?? '') }}</textarea>
    </div>

    <div class="flex justify-between">

        <button type="submit" class="btn bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Submit</button>
    </div>