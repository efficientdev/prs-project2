<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="Monarch" name="author">
<link href="favicon.ico" rel="shortcut icon" type="image/x-icon">
<link href="favicon.ico" rel="icon" type="image/x-icon"> 
<link href="{{asset('css/member.min.css')}}" rel="stylesheet" type="text/css">
<style type="text/css">
    [x-cloak] { display: none !important; }

</style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen ">

            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-2 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset


            <div class="max-w-7xl mx-auto flex gap-5 h-screen overflow-hidden">
                <div
                    class='w-[250px] overflow-y-auto   px-4 pl-10  transition-transform duration-300 md:block md:translate-x-0 -translate-x-full fixed inset-y-0 left-0 z-1 pt-[100px] md:relative md:inset-auto md:transform-none'
                >

                <h3>MENU</h3>
                <hr class="my-3" />



<div class="flex flex-col gap-3 ">
 

 
@php
            $sections = [
                'sectionA' => 'School Identity',
                'sectionB' => 'SCHOOL FACILITIES',
                //'sectionC' => 'Staff Profile',
                //'sectionD' => 'Infrastructure',
                //'sectionE' => 'Fees ',
                'sectionF' => 'Documents Upload',
                'sectionG' => 'Declaration',
            ];
            $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
            $form_id = \Illuminate\Support\Facades\Session::get("fid", 'default');
        @endphp


                @if(auth()->user()->hasAnyRole(['proprietor']) )
 

<a href="{{route('registration.list')}}">Home</a> 

@foreach($sections as $key => $label)
                <a href="{{ route('registration.' . $key . '.show', ['form_id' => $form_id ?? 'default']) }}" class="...">
                    {{ $label }}
                </a>
            @endforeach

                @endif
</div>
</div>

                <div class="flex h-full flex-1 z-1  "> 
 


                    <main class="flex-1 overflow-y-auto  px-0 pt-[100px] mb-1 mr-1 px-2 md:pr-5">


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

@if (session('success'))
    <div class="alert alert-primary mt-5">
        <ul>
            @foreach ((array) session('success') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif
            <!-- Page Content 
            <main class="md:max-w-7xl pr-10" >-->
                 
                {{ $slot }} 


    
<div class="text-3xl my-2"> School Registration Form</div> 
<hr class="my-2" />

<div class="w-full">
@yield('content')
</div>

        <div class="text-center text-sm my-5 capitalize">This portal is managed by the department of planning, Research & Statistics (PRS), Edo state Ministry of Education. <br/>All Information provided is subject to verification.</div>


            </main></div>
        </div>
        </div> 
         

@stack('scripts')

    </body>
</html>

  
 
  