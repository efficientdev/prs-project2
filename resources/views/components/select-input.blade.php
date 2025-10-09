<select name="{{ $name }}" id="{{ $id ?? $name }}" {{ $attributes->merge(['class' => 'form-controlv w-full rounded border-gray-300']) }}>
    @foreach($options as $key => $label)
        <option value="{{ $key }}" {{ $selected == $key ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>
 