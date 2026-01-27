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

    if (!function_exists('e_or_link')) {
        /**
         * Escape string or convert to a link if it's a URL.
         *
         * @param string $value
         * @return string
         */
        function e_or_link(string $value): string
        {
            $value = trim($value);

            // Simple URL regex check
            if (preg_match('#^(https?://[^\s]+|/storage/[^\s]+)$#i', $value)) {
            //if (preg_match('/^(https?:\/\/[^\s]+)$/i', $value)) {
                // Escape the URL itself
                $escapedUrl = e($value);
                $linkText = strlen($escapedUrl) > 45
                ? substr($escapedUrl, -45)
                : $escapedUrl;
                return "<a class='line-clamp-1' href=\"{$escapedUrl}\" target=\"_blank\" rel=\"noopener noreferrer\">view - {$linkText}</a>";
            }

            // Otherwise, just escape normally
            return e($value);
        }
    }

@endphp
 


<div class="mb-6">
    <div class="grid grid-cols-2 gap-2 ">
    @foreach ($order as $key)

        @if (isset($groups[$key]) && !in_array($key, $renderedGroups))
            </div><div class="grid shadow gap-2">
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

                <table class="w-full my-3 border-collapse border border-gray-300">
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
                                            echo "<td class='border border-gray-300 px-3 py-1'>" . e_or_link($val[$i] ?? '') . "</td>";
                                        } else {
                                            echo "<td class='border border-gray-300 px-3 py-1'>" . ($i === 0 && $val !== null ? e_or_link($val) : '') . "</td>";
                                        }
                                    @endphp
                                @endforeach
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            </div><div class="grid grid-cols-2 gap-3 ">
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

        </div><div class="grid gap-2 shadow">
        <div class="my-3 rounded shadow">
            <h3 class="font-semibold capitalize my-2">{{  ucfirst(str_replace('_', ' ', $key) ) }}</h3>
                
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
                                    {{ e_or_link($row[$col] ?? '') }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div><div class="grid grid-cols-2 gap-3">

        @elseif (!in_array($key, $groupKeys) && isset($data[$key]))
            {{-- Render single key-value normally --}}
            <div class="mb-1 shadow">
                @php
                    $label = ucfirst(str_replace('_', ' ', $key));
                    $val = $data[$key];

                    if (is_array($val)) {
                        echo "<span class='uppercase'><strong >$label:</strong></span><ol class='list-disc ml-6 '>";
                        foreach ($val as $k => $v) {
                            //echo "<li>" . e_or_link("$k : $v") . "</li>";
                            echo "<li>" . e_or_link("$v") . "</li>";
                        }
                        echo "</ol>";
                    } else {
                        echo "<div class='grid shadow'><span class='capitalize font-semibold'>$label:</span> " . e_or_link($val) . "</div>";
                    }
                @endphp
            </div>
        @elseif ($key=="")
        <div class="h-10"></div>
        @endif
    @endforeach
</div></div>
