<div class="uppercase text-2xl font-bold">section A</div>

 @php
    //$owner=\App\Models\User::find()
    $sectionA = $data['sectionA'] ?? [];
    // Define order you want keys to appear
    $order = [
        'owner_address',
        'owner_qualifications',
        //'owner_address_lga',
        'owner_lga',
        //'owner_address_city',
        'owner_ward',
        '','',
        'proposed_name',
        'funding_source',
        //'funding_capital',
        //'postal_address',
        'school_address',
        'school_sector',
        //'school_address_lga',
        'school_lga',
        //'school_address_city',
        'school_ward',
        'purpose_for_establishment',
        'nearby_school', 
        //'nearby_distance',
    ];
    

    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        'nearby_school' =>['nearby_school', 'nearby_distance'],
        // add more groups if needed
    ];
        $data=$form->data;
@endphp
 
@include('registrations::preview.render_section', ['data' => $data['sectionA'] ?? [], 'groups' => $groups, 'order' => $order])


<div class="uppercase  my-4 text-2xl font-bold">section b</div>
@php
 $sectionB = $data['sectionB'] ?? [];

 $order =[
 'dimension','permanent',
 //'labs',
 'fenced',
 //'stores',
 'sickbay','inhabited',
 //'workshops',
 'classrooms','toilets',
 //'staff_offices',
 //'childrentoilet',
 '','other_facilities','play_indoor',
 //'play_indoor_size',
 'play_outdoor',
 //'play_outdoor_size'
 ];


    // Define groups (tables) of multiple keys to show side by side
    $groups = [
    //'play_equipment' =>['play_equipment', 'play_equipment_qty'],
    // add more groups if needed
    ];

 //print_r(implode("','",array_keys( $sectionB)));
@endphp

@include('registrations::preview.render_section', ['data' => $sectionB ?? [], 'groups' => $groups, 'order' => $order])


@php
 $sectionB = $data['sectionB'] ?? [];

 $order =[ 
 'playground_types','',
 'Indoor_equipments',
 'Outdoor_equipments'
 ];


    // Define groups (tables) of multiple keys to show side by side
    $groups = [
    //'play_equipment' =>['play_equipment', 'play_equipment_qty'],
    // add more groups if needed
    ];
    $xi=(array)json_decode($sectionB['playground_data']);
//print_r($xi);
 //print_r(implode("','",array_keys( $xi)));
@endphp
@include('registrations::preview.render_section', ['data' => $xi ?? [], 'groups' => $groups, 'order' => $order])


<?php
/*
using alphine js , design inputs and check boxes for 
Play ground should be: indoor, Outdoor (on select, display the type) 

Indoor Play equipment (checkbox): Chess, Scrabble, Ludo, Table Tennis, Play mate, others

Outdoor Play equipment (checkbox): Swings, Merry-go-round, slide, bouncing castles, sport equipment, others

also generate llaravel validations too

<hr/>
<div class="uppercase text-2xl font-bold">section c</div>
@php
 $sectionC = $data['sectionC'] ?? [];

 $order =['staff_surname'];


    // Define groups (tables) of multiple keys to show side by side
    $groups = [
    'staff_surname' =>['staff_surname','staff_other_names','staff_qualification'],
    // add more groups if needed
    ];

 //print_r(implode("','",array_keys( $sectionC)));
@endphp

@include('registrations::preview.render_section', ['data' => $sectionC, 'groups' => $groups, 'order' => $order])


<hr/>

<div class="capitalize">section d</div>
@php
 $sectionD = $data['sectionD'] ?? [];

 $order =['learning_equipment'];


    // Define groups (tables) of multiple keys to show side by side
    $groups = [
    'learning_equipment' =>['learning_equipment','learning_equipment_qty'],
    // add more groups if needed
    ];

 //print_r(implode("','",array_keys( $sectionD)));
@endphp

@include('registrations::preview.render_section', ['data' => $sectionD, 'groups' => $groups, 'order' => $order])


<div class="capitalize">section e</div>
@php
 $sectionE = $data['sectionE'] ?? [];

 $order =['fees','other_fees'];


    // Define groups (tables) of multiple keys to show side by side
    $groups = [
    'other_fees' =>['other_fees','other_fees_amount'],
    // add more groups if needed
    ];

 //print_r(implode("','",array_keys( $sectionE)));
@endphp

@include('registrations::preview.render_section', ['data' => $sectionE, 'groups' => $groups, 'order' => $order])

*/
?>



<div class="uppercase my-4 text-2xl font-bold">section c</div>
@php

//for lightbox
 $data['docs']=array_values($data['uploads'] ?? []);

@endphp

<div class=" capitalize font-bold">uploaded documents</div>
    @include('cies::report.lightbox')
<br/>

@php
 $sectionF = $data['sectionF'] ?? [];

 $order =['reference'];


    // Define groups (tables) of multiple keys to show side by side
    $groups = [
    'other_fees' =>['other_fees','other_fees_amount'],
    // add more groups if needed
    ];

 //print_r(implode("','",array_keys( $sectionF)));
@endphp



@include('registrations::preview.render_section', ['data' => $sectionF ?? [], 'groups' => $groups, 'order' => $order])

