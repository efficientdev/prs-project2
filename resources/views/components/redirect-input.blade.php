@php
    $redirectData = [
        'route' => route($routeName, $params),
        'params' => $params,
    ];
@endphp

<input type="hidden" name="redirect_to" value="{{ json_encode($redirectData) }}">
