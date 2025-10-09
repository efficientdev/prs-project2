<div class="grid">
 
<div>
    <div  class="text-2xl my-2">School Details</div>
    <div class="grid md:grid-cols-2 gap-5 my-2 mb-5">
        @foreach($cData['required_details']??[] as $utility => $value)
            <div class="flex justify-between pr-5">
                <div class=" font-bold">{{ ucwords(str_replace('_', ' ', $utility)) }}</div> 
                ({{ strtoupper($value) }})
            </div>
        @endforeach
    </div>
</div>

<div class="text-2xl">Fees</div>
<table class="table my-2">
    @foreach($cData['fees'] as $class => $genders)
       <tr> 
        <td>{{ ucwords(str_replace('_', ' ', $class)) }} 
                (#{{ number_format($genders,2)}})</td>
      
        </tr>
    @endforeach
</table> 
<div class="text-2xl">Enrolment</div>
<table class="table my-2">
    @foreach($cData['enrolment'] as $class => $genders)
       <tr>    <td>{{ $class }}</td>
        
     
            @foreach($genders as $gender => $count)
                <td>{{ ucfirst($gender) }}: {{ $count }}</td>
            @endforeach
        </tr>
    @endforeach
</table> 


<div class="text-2xl">Teaching Staff</div>

<table class="table my-2">
    @foreach($cData['teaching_staff']??[] as $class => $genders)

    <tr>    <td>{{ $class }}</td>
     
            @foreach($genders as $gender => $count)
                <td>{{ ucfirst($gender) }}: {{ $count }}</td>
            @endforeach
       </td>
</tr>
    @endforeach
</table>


<div>
    <div  class="text-2xl my-2">Statutory records</div>
    <div class="grid md:grid-cols-2 gap-5 my-2 mb-5">
        @foreach($cData['statutory_record']??[] as $utility => $value)
            <div class="flex justify-between pr-5">
                <div class=" font-bold">{{ ucwords(str_replace('_', ' ', $utility)) }}</div> 
                ({{ strtoupper($value) }})
            </div>
        @endforeach
    </div>
</div>


<div>
    <div  class="text-2xl my-2">Utilities</div>
    <div class="grid md:grid-cols-2 gap-5 my-2 mb-5">
        @foreach($cData['utilities']??[] as $utility => $value)
            <div class="flex justify-between pr-5">
                <div class=" font-bold">{{ ucwords(str_replace('_', ' ', $utility)) }}</div> 
                ({{ strtoupper($value) }})
            </div>
        @endforeach
    </div>
</div>

</div>