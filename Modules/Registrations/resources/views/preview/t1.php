
<div class="container py-4">
    <h1 class="text-2xl font-bold mb-6">Application Data</h1>
use Illuminate\Support\Facades\Storage;

    @php
        
        function renderData2($key, $value)
        {
            $keyFormatted = ucfirst(str_replace('_', ' ', $key));

            if (is_array($value)) {
                // Special case: Flat arrays (like staff names) in table format
                $isFlat = array_values($value) === $value && is_array(reset($value)) === false;

                if ($isFlat) {
                    echo "<div x-data='{ open: false }' class='mb-4 border rounded shadow-sm'>";
                    echo "<button @click='open = !open' class='w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 font-semibold'>$keyFormatted</button>";
                    echo "<div x-show='open' class='px-4 py-2'>";
                    foreach ($value as $index => $item) {
                        echo "<p><strong>" . ($index + 1) . ":</strong> " . e($item) . "</p>";
                    }
                    echo "</div></div>";
                    return;
                }

                echo "<div x-data='{ open: false }' class='mb-4 border rounded shadow-sm'>";
                echo "<button @click='open = !open' class='w-full text-left px-4 py-2 bg-gray-100 hover:bg-gray-200 font-semibold'>$keyFormatted</button>";
                echo "<div x-show='open' class='px-4 py-2 space-y-2'>";

                foreach ($value as $subKey => $subValue) {
                    renderData($subKey, $subValue);
                }

                echo "</div></div>";
            } else {
                if (str_contains($value, 'attachments/')) {
                    $url = Storage::url($value);
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
    @endphp

    @foreach ($form->data as $key => $value)
        @php renderData($key, $value); @endphp
    @endforeach
</div> 

