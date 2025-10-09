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
                @foreach ($value as $i => $category)
                <tr>
                    <td class="p-2 border">
                        <input readonly  type="text" name="staff[{{ $i }}][category]" value="{{ $category['category'] }}" readonly class="input bg-gray-100">
                    </td>
                    <td class="p-2 border">
                        <input readonly  type="number" name="staff[{{ $i }}][male]" value="{{ old("staff.$i.male", $category['male'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                    <td class="p-2 border">
                        <input readonly  type="number" name="staff[{{ $i }}][female]" value="{{ old("staff.$i.female", $category['female'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                    <td class="p-2 border">
                        <input readonly  type="number" name="staff[{{ $i }}][total]" value="{{ old("staff.$i.total", $category['total'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                    <td class="p-2 border">
                        <input readonly  type="number" name="staff[{{ $i }}][trcn]" value="{{ old("staff.$i.trcn", $category['trcn'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                    <td class="p-2 border">
                        <input readonly  type="number" name="staff[{{ $i }}][non_trcn]" value="{{ old("staff.$i.non_trcn", $category['non_trcn'] ?? '') }}" class="w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>