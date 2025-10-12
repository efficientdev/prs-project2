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


            <div class="max-w-7xl mx-auto flex gap-5 h-screen overflow-hidden pt-[50px]">
                <div
                    class='w-[250px] overflow-y-auto   px-4 pl-10  transition-transform duration-300 md:block md:translate-x-0 -translate-x-full fixed inset-y-0 left-0 z-1 pt-[40px] md:relative md:inset-auto md:transform-none'
                >

                <h3>MENU</h3>
                <hr class="my-3" />



<div class="flex flex-col gap-3 font-bold capitalize ">

     @if(auth()->user()->hasAnyRole(['ADM','DFA']) )

<a href="{{route('admin.users.index')}}">Users</a>
                @endif

                @if(auth()->user()->hasAnyRole(['ADM','DFA']) )

<a href="{{route('admin.payments.index')}}">Payments</a>
                @endif

@if(auth()->user()->hasAnyRole(['ADM','CIE']) )
<a href="{{route('srapprovals.my')}}">Pending School Approvals</a> 
@endif


@if(!auth()->user()->hasAnyRole(['proprietor']) )
<div class="mt-5 border-b pb-1">Approved Applications </div>
<a href="{{route('srapproved.index')}}"> - Fully Approved Schools</a> 
<a href="{{route('afp.index')}}"> - pending Approval Fee </a> 
@endif



<!--
@if(auth()->user()->hasAnyRole(['ADM','CIE']) )
<a href="{{route('cie.applications.index')}}">Applications (CIE)</a>
                @endif

@if(auth()->user()->hasAnyRole(['ADM','DG']) )
<a href="{{route('dg.applications.index')}}">Applications (DG)</a>
                @endif
@if(auth()->user()->hasAnyRole(['ADM','COMM']) )
<a href="{{route('commissioner.applications.index')}}">Applications (commissioner)</a>
                @endif
-->
                

                @if(auth()->user()->hasAnyRole(['proprietor']) )

<a href="{{route('application.types.index')}}">New Application</a> 
<!--
<a href="{{route('application.types.index')}}">My Application</a>
-->
<a href="{{route('registration.list')}}">School registration</a>  

<a href="{{route('public.validation.list')}}">Public validation</a>  
<a href="{{route('private.validation.list')}}">Private validation</a> 




                @endif
</div>
</div>

                <div class="flex h-full flex-1 z-1  "> 
 


                    <main class="flex-1 overflow-y-auto  px-0 pt-[50px] mb-1 mr-1 px-2 md:pr-5">

<!-- Display all form errors -->
@if ($errors->any())
    <div class="mt-5 p-4 bg-red-100 border border-red-400 text-red-700 rounded capitalize mb-5">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="mt-5 p-4 bg-green-100 border border-green-400 text-green-700 rounded capitalize mb-5">
        <ul class="list-disc list-inside">
            @foreach ((array) session('success') as $message)
                <li>{{ $message }}</li>
            @endforeach
        </ul>
    </div>
@endif

            <!-- Display all form errors 
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
-->

            <!-- Page Content 
            <main class="md:max-w-7xl pr-10" >-->
                 
                {{ $slot }} 


        <div class="text-center text-sm my-5 capitalize">This portal is managed by the department of planning, Research & Statistics (PRS), Edo state Ministry of Education. <br/>All Information provided is subject to verification.</div>


            </main></div>
        </div>
        </div> 
        <!--
<script>
    function dynamicForm(prefix, min, fields, initialValues = []) {
        return {
            prefix,
            min,
            fields,
            entries: initialValues.length
                ? initialValues
                : Array.from({ length: min }, () => {
                    let obj = {};
                    fields.forEach(field => obj[field.name] = '');
                    return obj;
                }),
            addEntry() {
                const newEntry = {};
                this.fields.forEach(f => newEntry[f.name] = '');
                this.entries.push(newEntry);
            },
            removeEntry(index) {
                if (this.entries.length > this.min) {
                    this.entries.splice(index, 1);
                }
            }
        };
    }
</script> 
<script>
function imageViewer(images) {
    return {
        images: images,
        isOpen: false,
        current: 0,

        open(index) {
            this.current = index;
            this.isOpen = true;
        },
        close() {
            this.isOpen = false;
        },
        next() {
            if (this.current < this.images.length - 1) {
                this.current++;
            }
        },
        prev() {
            if (this.current > 0) {
                this.current--;
            }
        }
    }
}
</script>-->

@stack('scripts')

    </body>
</html>
