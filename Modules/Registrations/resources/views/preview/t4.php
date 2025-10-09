
<div class="container py-4">
    <h1 class="text-2xl font-bold mb-6">Application Data</h1>

    @php
        $data=$form->data;

        function storageUrl($path) {
            if (str_starts_with($path, 'attachments/')) {
                return Storage::url($path);
            }
            return $path;
        }

        function renderUploads($uploads)
        {
            if (!is_array($uploads)) return;

            echo "<div class='mb-6'>";
            echo "<h2 class='text-xl font-semibold mb-3'>Uploads</h2>";
            foreach ($uploads as $label => $filePath) {
                $url = storageUrl($filePath);
                $isImage = preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $url);
                echo "<div class='mb-4 flex items-center space-x-4'>";
                if ($isImage) {
                    echo "<a href='" . asset($url) . "' target='_blank'>";
                    echo "<img src='" . asset($url) . "' alt='" . e($label) . "' class='w-24 h-24 object-cover rounded border'>";
                    echo "</a>";
                } else {
                    // Generic file icon + link
                    echo "<a href='" . asset($url) . "' target='_blank' class='inline-flex items-center space-x-2 text-blue-600 underline'>";
                    echo '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">';
                    echo '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16h8M8 12h8m-8-4h8M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />';
                    echo '</svg>';
                    echo "<span>" . e($label) . "</span>";
                    echo "</a>";
                }
                echo "</div>";
            }
            echo "</div>";
        }

        function renderTable($title, $col1Key, $col2Key, $data, $extraCols = [])
        {
            $titleFormatted = ucfirst(str_replace('_', ' ', $title));
            echo "<div class='mb-8'>";
            echo "<h2 class='text-xl font-semibold mb-3'>$titleFormatted</h2>";

            // Render any other keys in the section besides the table keys and extraCols
            $exclude = array_merge([$col1Key, $col2Key], $extraCols);
            $otherKeys = array_diff(array_keys($data), $exclude);
            if (count($otherKeys) > 0) {
                echo "<div class='mt-4 grid grid-cols-3 gap-2'>";
                foreach ($otherKeys as $key) {
                    $val = $data[$key];
                    $label = ucfirst(str_replace('_', ' ', $key));

                    if (is_array($val)) {
                        echo "<div class='mb-3 grid grid-cols-3 gap-2'>";
                        echo "<strong>$label:</strong>";
                        echo "<div class=' ml-6 '>";
                        foreach ($val as $k => $v) {
                            echo "<div>" . e("$k : $v") . "</div>";
                        }
                        echo "</div></div>";
                    } else {
                        echo "<div><strong>$label:</strong> " . e($val) . "</div>";
                    }
                }
                echo "</div>";
            }

            echo "</div>";

            echo "<table class='table-auto border-collapse border border-gray-300 w-full mb-4'>";
            echo "<thead><tr class='bg-gray-100'>";
            echo "<th class='border border-gray-300 px-4 py-2'>" . ucfirst(str_replace('_', ' ', $col1Key)) . "</th>";
            echo "<th class='border border-gray-300 px-4 py-2'>" . ucfirst(str_replace('_', ' ', $col2Key)) . "</th>";
            foreach ($extraCols as $col) {
                echo "<th class='border border-gray-300 px-4 py-2'>" . ucfirst(str_replace('_', ' ', $col)) . "</th>";
            }
            echo "</tr></thead><tbody>";

            if (!isset($data[$col1Key]) || !isset($data[$col2Key])) {
                echo "<tr><td colspan='" . (2 + count($extraCols)) . "' class='border border-gray-300 px-4 py-2'>Data missing</td></tr>";
                echo "</tbody></table></div>";
                return;
            }

            $col1 = $data[$col1Key];
            $col2 = $data[$col2Key];

            if (count($extraCols) > 0) {
                $extraData = [];
                foreach ($extraCols as $col) {
                    $extraData[] = $data[$col] ?? [];
                }
                $maxRows = max(count($col1), count($col2));
                foreach ($extraData as $arr) {
                    $maxRows = max($maxRows, count($arr));
                }

                for ($i = 0; $i < $maxRows; $i++) {
                    echo "<tr>";
                    echo "<td class='border border-gray-300 px-4 py-2'>" . e($col1[$i] ?? '') . "</td>";
                    echo "<td class='border border-gray-300 px-4 py-2'>" . e($col2[$i] ?? '') . "</td>";
                    foreach ($extraData as $arr) {
                        echo "<td class='border border-gray-300 px-4 py-2'>" . e($arr[$i] ?? '') . "</td>";
                    }
                    echo "</tr>";
                }
            } else {
                // normal 2 column arrays (associative)
                $keys = array_unique(array_merge(array_keys($col1), array_keys($col2)));
                foreach ($keys as $k) {
                    $val1 = is_array($col1) && isset($col1[$k]) ? $col1[$k] : '';
                    $val2 = is_array($col2) && isset($col2[$k]) ? $col2[$k] : '';

                    // Render file/image preview if applicable
                    $renderCell = function ($val) {
                        if (str_contains($val, 'attachments/')) {
                            $url = Storage::url($val);
                            $isImage = preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $url);
                            if ($isImage) {
                                return "<img src='" . asset($url) . "' alt='' class='h-5 rounded border'>";
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

            echo "</tbody></table>";

        }

        function renderSimpleData($key, $value)
        {
            $keyFormatted = ucfirst(str_replace('_', ' ', $key));

            if (is_array($value)) {
                echo "<div class='mb-4'>";
                echo "<h2 class='text-xl font-semibold mb-2'>$keyFormatted</h2>";
                echo "<div class=' ml-6 grid md:grid-cols-3 gap-2'>";
                foreach ($value as $k => $v) {
                    if (is_array($v)) {
                        echo "<div><strong>" . e($k) . ":</strong>";
                        echo "<ul class='list-disc ml-6'>";
                        foreach ($v as $kk => $vv) {
                            echo "<li>" . e("$kk : $vv") . "</li>";
                        }
                        echo "</ul></div>";
                    } else {
                        echo "<div>" . e("$k : $v") . "</div>";
                    }
                }
                echo "</div></div>";
            } else {
                echo "<p><strong>$keyFormatted:</strong> " . e($value) . "</p>";
            }
        }
    @endphp


    {{-- Section A --}}
    @if(isset($data['sectionA']))
        @php renderTable('sectionA', 'nearby_school', 'nearby_distance', $data['sectionA']); @endphp
    @endif

    {{-- Section B --}}
    @if(isset($data['sectionB']))
        @php renderTable('sectionB', 'play_equipment', 'play_equipment_qty', $data['sectionB']); @endphp
    @endif

    {{-- Section C --}}
    @if(isset($data['sectionC']))
        @php renderTable('sectionC', 'staff_surname', 'staff_other_names', $data['sectionC'], ['staff_qualification']); @endphp
    @endif

    {{-- Section D --}}
    @if(isset($data['sectionD']))
        @php renderTable('sectionD', 'learning_equipment', 'learning_equipment_qty', $data['sectionD']); @endphp
    @endif

    {{-- Section E --}}
    @if(isset($data['sectionE']))
        @php renderTable('sectionE', 'other_fees', 'other_fees_amount', $data['sectionE']); @endphp
    @endif

    {{-- Render other sections not displayed above --}}
    @php
        $exclude = ['sectionA','sectionB','sectionC','sectionD','sectionE','uploads'];

        echo "<div class='grid grid-cols-3 gap-2'> ";
        foreach ($data as $key => $value) {
            if (in_array($key, $exclude)) {
                continue;
            }

            renderSimpleData($key, $value);
        }
    echo '</div>';
    @endphp


    {{-- Show uploads with thumbnails and links --}}
    @if(isset($data['uploads']))
        @php renderUploads($data['uploads']); @endphp
    @endif

</div> 
