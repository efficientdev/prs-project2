
<div class="container py-4">
    <h1 class="text-2xl font-bold mb-6">Application Data</h1>

    @php 
    $data=$form->data;

        // Helper to generate Storage URL for attachments
        function storageUrl($path) {
            if (str_starts_with($path, 'attachments/')) {
                return Storage::url($path);
            }
            return $path;
        }

        // Render non-table data recursively with Alpine collapsible
        function renderData($key, $value)
        {
            $keyFormatted = ucfirst(str_replace('_', ' ', $key));

            if (is_array($value)) {
                echo "<div x-data='{ open: false }' class='mb-4 border rounded shadow-sm'>";
                echo "<button @click='open = !open' class='w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 font-semibold'>$keyFormatted</button>";
                echo "<div x-show='open' class='px-4 py-2 space-y-2'>";
                foreach ($value as $subKey => $subValue) {
                    renderData($subKey, $subValue);
                }
                echo "</div></div>";
            } else {
                if (str_contains($value, 'attachments/')) {
                    $url = storageUrl($value);
                    $isImage = preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $url);
                    echo "<div class='mb-2'>";
                    echo "<p><strong>$keyFormatted:</strong></p>";
                    if ($isImage) {
                        echo "<img src='" . asset($url) . "' alt='$keyFormatted' class='max-w-xs rounded border'>";
                    } else {
                        echo "<a href='" . asset($url) . "' target='_blank' class='text-blue-600 underline'>View File</a>";
                    }
                    echo "</div>";
                } else {
                    echo "<p><strong>$keyFormatted:</strong> " . e($value) . "</p>";
                }
            }
        }

        // Render paired tables for specified sections
        function renderTable($title, $col1Key, $col2Key, $data)
        {
            $titleFormatted = ucfirst(str_replace('_', ' ', $title));
            echo "<div x-data='{ open: false }' class='mb-6 border rounded shadow'>";
            echo "<button @click='open = !open' class='w-full px-4 py-2 bg-gray-200 font-semibold text-left hover:bg-gray-300'>$titleFormatted</button>";
            echo "<div x-show='open' class='p-4 overflow-x-auto'>";
            echo "<table class='table-auto border-collapse border border-gray-300 w-full'>";
            echo "<thead><tr class='bg-gray-100'>";
            echo "<th class='border border-gray-300 px-4 py-2'>" . ucfirst(str_replace('_', ' ', $col1Key)) . "</th>";
            echo "<th class='border border-gray-300 px-4 py-2'>" . ucfirst(str_replace('_', ' ', $col2Key)) . "</th>";
            if ($title === 'sectionc') {
                // For sectionC, add a 3rd column header
                echo "<th class='border border-gray-300 px-4 py-2'>Staff Qualification</th>";
            }
            echo "</tr></thead><tbody>";

            if (!isset($data[$col1Key]) || !isset($data[$col2Key])) {
                echo "<tr><td colspan='3' class='border border-gray-300 px-4 py-2'>Data missing</td></tr>";
                echo "</tbody></table></div></div>";
                return;
            }

            $col1 = $data[$col1Key];
            $col2 = $data[$col2Key];

            if ($title === 'sectionc') {
                // For sectionC, there's a third field staff_qualification
                $col3 = $data['staff_qualification'] ?? [];
                $maxRows = max(count($col1), count($col2), count($col3));

                for ($i = 0; $i < $maxRows; $i++) {
                    $val1 = $col1[$i] ?? '';
                    $val2 = $col2[$i] ?? '';
                    $val3 = $col3[$i] ?? '';
                    echo "<tr>";
                    echo "<td class='border border-gray-300 px-4 py-2'>" . e($val1) . "</td>";
                    echo "<td class='border border-gray-300 px-4 py-2'>" . e($val2) . "</td>";
                    echo "<td class='border border-gray-300 px-4 py-2'>" . e($val3) . "</td>";
                    echo "</tr>";
                }
            } else {
                // For other sections, keys are arrays or associative arrays
                $keys = array_unique(array_merge(array_keys($col1), array_keys($col2)));
                foreach ($keys as $k) {
                    $val1 = is_array($col1) && isset($col1[$k]) ? $col1[$k] : '';
                    $val2 = is_array($col2) && isset($col2[$k]) ? $col2[$k] : '';

                    // If value looks like file path, create preview link/image
                    $renderCell = function ($val) {
                        if (str_contains($val, 'attachments/')) {
                            $url = Storage::url($val);
                            $isImage = preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $url);
                            if ($isImage) {
                                return "<img src='" . asset($url) . "' alt='' class='max-w-xs max-h-20 rounded border'>";
                            }
                            return "<a href='" . asset($url) . "' target='_blank' class='text-blue-600 underline'>View File</a>";
                        }
                        return e($val);
                    };

                    echo "<tr>";
                    echo "<td class='border border-gray-300 px-4 py-2'>" . $renderCell($val1) . "</td>";
                    echo "<td class='border border-gray-300 px-4 py-2'>" . $renderCell($val2) . "</td>";
                    echo "</tr>";
                }
            }

            echo "</tbody></table></div></div>";
        }
    @endphp

    {{-- Render tables for requested sections --}}
    @if(isset($data['sectionA']))
        @php renderTable('sectionA', 'nearby_school', 'nearby_distance', $data['sectionA']); @endphp
    @endif

    @if(isset($data['sectionB']))
        @php renderTable('sectionB', 'play_equipment', 'play_equipment_qty', $data['sectionB']); @endphp
    @endif

    @if(isset($data['sectionC']))
        @php renderTable('sectionC', 'staff_surname', 'staff_other_names', $data['sectionC']); @endphp
    @endif

    @if(isset($data['sectionD']))
        @php renderTable('sectionD', 'learning_equipment', 'learning_equipment_qty', $data['sectionD']); @endphp
    @endif

    @if(isset($data['sectionE']))
        @php renderTable('sectionE', 'other_fees', 'other_fees_amount', $data['sectionE']); @endphp
    @endif

    {{-- Render rest of data excluding the above sections and uploads --}}
    @php
        $exclude = ['sectionA','sectionB','sectionC','sectionD','sectionE','uploads'];

        foreach ($form->data as $key => $value) {
            if (in_array($key, $exclude)) {
                continue;
            }

            renderData($key, $value);
        }
    @endphp
</div> 
