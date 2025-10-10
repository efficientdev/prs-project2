@php
    // Flatten all group keys to know which keys belong to a group
    $groupKeys = [];
    foreach ($groups as $firstKey => $groupKeysArr) {
        $groupKeys = array_merge($groupKeys, $groupKeysArr);
    }

    // Track which group keys we've already rendered
    $renderedGroups = [];

    // Define custom column order for object-arrays (like levels)
    /*$arrayTableColumns = [
        'levels' => ['level', 'male', 'female', 'remarks'],
        // Add more if needed later
    ];*/
@endphp
 


<div class="mb-6">
    <div class="grid grid-cols-2 ">
    @foreach ($order as $key)

        @if (isset($groups[$key]) && !in_array($key, $renderedGroups))
            </div><div class="grid  gap-2">
            {{-- Render entire group table here --}}
            @php
                $keys = $groups[$key];
                $renderedGroups[] = $key;

                // Calculate max rows
                $maxRows = 0;
                foreach ($keys as $k) {
                    if (isset($data[$k])) {
                        $val = $data[$k];
                        $maxRows = max($maxRows, is_array($val) ? count($val) : 1);
                    }
                }
            @endphp

            <div class="mb-6  rounded  ">
                <!--<h3 class="font-semibold mb-2">
                    {{ implode(' / ', array_map(fn($k) => ucfirst(str_replace('_', ' ', $k)), $keys)) }}
                </h3>-->

                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            @foreach ($keys as $k)
                                <th class="border border-gray-300 px-3 py-1">{{ ucfirst(str_replace('_', ' ', $k)) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i < $maxRows+1; $i++)
                            <tr>
                                @foreach ($keys as $k)
                                    @php
                                        $val = $data[$k] ?? null;
                                        if (is_array($val)) {
                                            echo "<td class='border border-gray-300 px-3 py-1'>" . e($val[$i] ?? '') . "</td>";
                                        } else {
                                            echo "<td class='border border-gray-300 px-3 py-1'>" . ($i === 0 && $val !== null ? e($val) : '') . "</td>";
                                        }
                                    @endphp
                                @endforeach
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            </div><div class="grid grid-cols-2 ">
        {{-- 2. Handle array of objects like "levels" --}}
    @elseif (isset($data[$key]) && is_array($data[$key]) && isset($arrayTableColumns[$key]) && !in_array($key, $renderedGroups))
        @php
            $renderedGroups[] = $key;
            $rows = $data[$key];
            $preferredOrder = $arrayTableColumns[$key]; // defined outside loop
            $allKeys = [];

            // Get all keys in case of missing ones
            foreach ($rows as $row) {
                if (is_array($row)) {
                    $allKeys = array_merge($allKeys, array_keys($row));
                }
            }

            $allKeys = array_unique($allKeys);
            $orderedKeys = array_values(array_unique(array_merge(
                $preferredOrder,
                array_diff($allKeys, $preferredOrder)
            )));
        @endphp

        </div><div class="grid gap-2">
        <div class="mb-6 rounded">
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        @foreach ($orderedKeys as $col)
                            <th class="border border-gray-300 px-3 py-1">
                                {{ ucfirst(str_replace('_', ' ', $col)) }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rows as $row)
                        <tr>
                            @foreach ($orderedKeys as $col)
                                <td class="border border-gray-300 px-3 py-1">
                                    {{ e($row[$col] ?? '') }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div><div class="grid grid-cols-2">

        @elseif (!in_array($key, $groupKeys) && isset($data[$key]))
            {{-- Render single key-value normally --}}
            <div class="mb-3 ">
                @php
                    $label = ucfirst(str_replace('_', ' ', $key));
                    $val = $data[$key];

                    if (is_array($val)) {
                        echo "<span class='uppercase'><strong >$label:</strong></span><ol class='list-disc ml-6'>";
                        foreach ($val as $k => $v) {
                            //echo "<li>" . e("$k : $v") . "</li>";
                            echo "<li>" . e("$v") . "</li>";
                        }
                        echo "</ol>";
                    } else {
                        echo "<p><span class='capitalize font-semibold'>$label:</span> " . e($val) . "</p>";
                    }
                @endphp
            </div>
        @elseif ($key=="")
        <div></div>
        @endif
    @endforeach
</div></div>
