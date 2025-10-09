<x-app-layout>


<div class="  min-h-screen ">  
        @php
            $sections = [
                'sectionA' => 'School Identity',
                'sectionB' => 'Ownership & Admin',
                'sectionC' => 'Staff Profile',
                'sectionD' => 'Student Enrolment',
                'sectionE' => 'Infrastructure',
                'sectionF' => 'Compliance & Renewal',
                'sectionG' => 'Declaration',
            ];
            $currentRoute = \Illuminate\Support\Facades\Route::currentRouteName();
            $form_id = \Illuminate\Support\Facades\Session::get("fid", 'default');
        @endphp
  
    

        @if(session('success'))
    <div class="max-w-4xl mx-auto bg-white p-8 rounded shadow">
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                {{ session('success') }}
            </div>
    </div>

        @endif
 		 

<div class="flex flex-1">
    <div class="w-[250px]">

        <div class="p-4 grid  gap-2 text-gray-700">
            @foreach($sections as $key => $label)
                <a href="{{ route('private.validation.' . $key . '.show', ['form_id' => $form_id ?? 'default']) }}" class="...">
                    {{ $label }}
                </a>
            @endforeach
        </div>
    </div>

<div class="w-full">
@yield('content')
</div>
 


</div>

</div> 


 </x-app-layout>