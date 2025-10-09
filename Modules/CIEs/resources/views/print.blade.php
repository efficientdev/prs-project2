

<div class="text-xl mb-2">Section A</div>
 @php
    $sectionA = $report->cies_reports['sectionA'] ?? [];

 //print_r(implode("','",array_keys( $sectionA)));
    // Define order you want keys to appear
    $order = [
        'report_title','school_name','zonal_office','approval_number','reporting_period','lga','category'
    ];
     
    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        'nearby_school' =>['nearby_school', 'nearby_distance'],
        // add more groups if needed
    ];
        $data=$report->cies_reports;
@endphp
 
@include('registrations::preview.render_section', ['data' => $data['sectionA'], 'groups' => $groups, 'order' => $order])



<div class="text-xl mb-2">Section B</div>
<hr/>


 @php
    $sectionB = $report->cies_reports['sectionB'] ?? [];

 //print_r(implode("','",array_keys( $sectionB)));
    // Define order you want keys to appear
    $order = [
        'levels'
    ];
     
    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        //'levels' =>['level','male', 'female'],
        // add more groups if needed
    ];
    $arrayTableColumns =[ 
        'levels' =>['level','male', 'female'],
     ];
        $data=$report->cies_reports;
@endphp
 
@include('registrations::preview.render_section', ['data' => $data['sectionB'], 'groups' => $groups, 'order' => $order])



<div class="text-xl mb-2">Section C</div>
<hr/>


 @php
    $sectionC = $report->cies_reports['sectionC'] ?? [];

 //print_r(implode("','",array_keys( $sectionC)));
    // Define order you want keys to appear
    $order = [
        'staffing'
    ];
     
    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        //'levels' =>['level','male', 'female'],
        // add more groups if needed
    ];
    $arrayTableColumns =[ 
        'staffing' =>['category','male', 'female'],
     ];
        $data=$report->cies_reports;
@endphp
 
@include('registrations::preview.render_section', ['data' => $data['sectionC'], 'groups' => $groups, 'order' => $order])


<div class="text-xl mb-2">Section D</div>
<hr/>


 @php
    $sectionD = $report->cies_reports['sectionD'] ?? [];

 //print_r(implode("','",array_keys( $sectionD)));
    // Define order you want keys to appear
    $order = [
        'library','security','electricity','laboratories','water_supply','classrooms_in_use','average_class_size','functional_toilets'
    ];
     
    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        //'levels' =>['level','male', 'female'],
        // add more groups if needed
    ];
    $arrayTableDolumns =[ 
        //'levels' =>['level','male', 'female'],
     ];
        $data=$report->cies_reports;
@endphp
 
@include('registrations::preview.render_section', ['data' => $data['sectionD'], 'groups' => $groups, 'order' => $order])

<div class="text-xl mb-2">Section E</div>
<hr/>

 @php
    $sectionG = $report->cies_reports['sectionG'] ?? [];

 //print_r(implode("','",array_keys( $sectionG)));
    // Gefine order you want keys to appear
    $order = [
        'observations','recommendations'
    ];
     
    // Gefine groups (tables) of multiple keys to show side by side
    $groups = [
        //'levels' =>['level','male', 'female'],
        // add more groups if needed
    ];
    $arrayTableGolumns =[ 
        'levels' =>['level','male', 'female'],
     ];
        $data=$report->cies_reports;
@endphp
 
@include('registrations::preview.render_section', ['data' => $data['sectionG'], 'groups' => $groups, 'order' => $order])


@php
$data=$report->cies_reports['sectionG'];
@endphp

    @include('cies::report.lightbox')
