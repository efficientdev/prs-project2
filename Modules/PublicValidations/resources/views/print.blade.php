<div class="border-b border-t my-2 py-2">
<div class="uppercase my-4 text-2xl font-bold">section A: School Identity</div>

<div class="shadow p-2 rounded">

 @php

    $data=$form->data;
    //$owner=\App\Models\User::find()
    $sectionA = $data['sectionA'] ?? [];
    // Define order you want keys to appear
 
 /*
Phone Email: 08038474777

 */

    $order = [
    'school_id', 'user_name','school_name', 'lga','ward','type','principal_name','emis_code'
    ]; 

    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        //'nearby_school' =>['nearby_school', 'nearby_distance'], 
    ];
@endphp
 
@include('registrations::preview.render_section', ['data' => $sectionA ?? [], 'groups' => $groups, 'order' => $order])
</div>

<div class="uppercase  my-4 text-2xl font-bold">section b : SCHOOL proprietor</div>


<div class="shadow p-2 rounded">
@php
 $sectionB = $data['sectionB'] ?? [];

 $order =[
 'proprietor_name', 'proprietor_phone', 'proprietor_email', 'head_teacher_name', 'contact_address'
 ];


    // Define groups (tables) of multiple keys to show side by side
    $groups = [
    //'play_equipment' =>['play_equipment', 'play_equipment_qty'],
    // add more groups if needed
    ];

 //print_r(implode("','",array_keys( $sectionB)));
@endphp

@include('registrations::preview.render_section', ['data' => $sectionB ?? [], 'groups' => $groups, 'order' => $order])
</div>

<div class="uppercase  my-4 text-2xl font-bold">section c : SCHOOL Staff</div>


<div class="shadow p-2 rounded">
@php
 $sectionB = $data['sectionC'] ?? [];

 $order =[
 'total_teaching_staff', 'qualified_teachers', 'non_teaching_staff', 'staff_list_file'];


    // Define groups (tables) of multiple keys to show side by side
    $groups = [
    //'play_equipment' =>['play_equipment', 'play_equipment_qty'],
    // add more groups if needed
    ];

 //print_r(implode("','",array_keys( $sectionB)));
@endphp

@include('registrations::preview.render_section', ['data' => $sectionB ?? [], 'groups' => $groups, 'order' => $order])
</div>

<div class="uppercase  my-4 text-2xl font-bold">section d : SCHOOL total enrolment</div>


@php
$sectionD= $data['sectionD'] ?? [];
@endphp
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Category</th>
            <th>Value</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nursery Male</td>
            <td>{{ $sectionD['enrolment_nursery_male'] }}</td>
        </tr>
        <tr>
            <td>Nursery Female</td>
            <td>{{ $sectionD['enrolment_nursery_female'] }}</td>
        </tr>
        <tr>
            <td>Primary Male</td>
            <td>{{ $sectionD['enrolment_primary_male'] }}</td>
        </tr>
        <tr>
            <td>Primary Female</td>
            <td>{{ $sectionD['enrolment_primary_female'] }}</td>
        </tr>
        <tr>
            <td>JSS Male</td>
            <td>{{ $sectionD['enrolment_jss_male'] }}</td>
        </tr>
        <tr>
            <td>JSS Female</td>
            <td>{{ $sectionD['enrolment_jss_female'] }}</td>
        </tr>
        <tr>
            <td>SSS Male</td>
            <td>{{ $sectionD['enrolment_sss_male'] }}</td>
        </tr>
        <tr>
            <td>SSS Female</td>
            <td>{{ $sectionD['enrolment_sss_female'] }}</td>
        </tr>
        <tr>
            <td>Total Enrolment</td>
            <td>{{ $sectionD['total_enrolment'] }}</td>
        </tr>
    </tbody>
</table>
 

<div class="uppercase  my-4 text-2xl font-bold">section e : SCHOOL FACILITIES</div>

@php
 $sectionB = $data['sectionE'] ?? [];

 $order =[
 'laboratories_available','', 'laboratories_science','laboratories_ict','laboratories_others', 'library_available', 'facility_photos','num_toilets','num_classrooms'];
  
    // Define groups (tables) of multiple keys to show side by side
    $groups = [
    //'facility_photos' =>['play_equipment', 'play_equipment_qty'],
    // add more groups if needed
    ];

 //print_r(implode("','",array_keys( $sectionB)));
@endphp

@include('registrations::preview.render_section', ['data' => $sectionB ?? [], 'groups' => $groups, 'order' => $order])
 

<div class="uppercase  my-4 text-2xl font-bold">section f : renewal receipts</div>


<div class="shadow p-2 rounded">
@php
 $sectionB = $data['sectionF'] ?? [];

  
 $order =[
 'last_renewal_date','expiry_date', 'paid_renewal_fees','renewal_receipts'];


    // Define groups (tables) of multiple keys to show side by side
    $groups = [
    //'play_equipment' =>['play_equipment', 'play_equipment_qty'],
    // add more groups if needed
    ];

 //print_r(implode("','",array_keys( $sectionB)));
@endphp

@include('registrations::preview.render_section', ['data' => $sectionB ?? [], 'groups' => $groups, 'order' => $order])
</div>

   

<div class="uppercase my-4 text-2xl font-bold">section g: Declaration</div>

<div class="shadow p-2 rounded">
@php
 $sectionG = $data['sectionG'] ?? [];

    $sectionA = $data['sectionA'] ?? [];
@endphp

@if(isset($sectionG['declaration_agreed']))

    I, {{$sectionG['digital_signature']??''}} on  {{$sectionG['declaration_date']??''}} hereby affirm that all information and documents provided in this school registration application are true, and accurate. I understand that any false or misleading information may result in the loss of my registration status.

@endif
</div>

</div>
