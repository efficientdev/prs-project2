
    <table class="min-w-full table border border-gray-300">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="p-2 border">Level</th>
                    <th class="p-2 border">Male</th>
                    <th class="p-2 border">Female</th>
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">Remarks</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($value as $i => $level)
                <tr>
                    <td class="border p-2">
                        <input readonly  type="text" name="enrolments[{{ $i }}][level]" value="{{ $level['level'] }}" readonly class="input bg-gray-100">
                    </td>
                    <td class="border p-2">
                        <input readonly  type="number" name="enrolments[{{ $i }}][male]" value="{{ old("enrolments.$i.male", $level['male'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                    <td class="border p-2">
                        <input readonly  type="number" name="enrolments[{{ $i }}][female]" value="{{ old("enrolments.$i.female", $level['female'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                    <td class="border p-2">
                        <input readonly  type="number" name="enrolments[{{ $i }}][total]" value="{{ old("enrolments.$i.total", $level['total'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                    <td class="border p-2">
                        <input readonly  type="text" name="enrolments[{{ $i }}][remarks]" value="{{ old("enrolments.$i.remarks", $level['remarks'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>