<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>


<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="Monarch" name="author">
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="favicon.ico" rel="icon" type="image/x-icon"> 
<link href="css/member.min.css" rel="stylesheet" type="text/css">


<!-- Include Font Awesome (for icons) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-papJP6ZmZkXmxgZ1eoCxgfTiXgGmfdM7HAgfT3jT2qPZVD3n0RTKDh8rj5+dZV2DxXFEid8UJZVG3CvE3dWp0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Fonts 
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />-->

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <!--sm:justify-center items-center-->
        <div class="min-h-screen flex flex-col justify-center  items-center pt-10 sm:pt-0 bg-gray-100">
            <div class="mt-10">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </div>

            <!-- Display all form errors -->
@if ($errors->any())
    <div class="alert alert-danger mt-5">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


            <!--sm:max-w-md mt-6 bg-white  shadow-md-->
            <div class=" mb-10 mt-5 mx-auto bg-white px-6 py-4  overflow-hidden sm:rounded-lg"> 
                {{ $slot }}
            </div>
        </div>

        <div class="text-center text-sm my-5 capitalize">This portal is managed by the department of planning, Research & Statistics (PRS), Edo state Ministry of Education. <br/>All Information provided is subject to verification.</div>

@stack('scripts')
    </body>
</html>
