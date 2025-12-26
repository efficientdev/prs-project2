@php
use Illuminate\Support\Collection;
if (!function_exists('sumKeys')) {
function sumKeys(Collection $collection, array $keys): array
{
    try{
    return collect($keys)->mapWithKeys(function ($key) use ($collection) {
        return [
            $key => $collection->sum(fn ($row) => (int) ($row[$key] ?? 0))
        ];
    })->toArray();}catch(\Exception $e){return [];}
}}
if (!function_exists('sumNumericFields')) {
function sumNumericFields(array $data)
{
    $totals = 0;

try{
    foreach (array_values($data) as $key => $value) {
            if (is_numeric($value)) {
                $totals += (int) $value;
            }
        }
    }catch(\Exception $e){return 0;}

    /*foreach ($data as $row) {
    //dd($row);
        foreach ($row as $key => $value) {
            if (is_numeric($value)) {
                $totals[$key] = ($totals[$key] ?? 0) + (int) $value;
            }
        }
    }*/

    return $totals;
}}


@endphp

<div class="text-xl mb-2">Section A</div>
 @php
    $sectionA = $report->cies_reports['sectionA'] ?? [];

 //print_r(implode("','",array_keys( $sectionA)));
    // Define order you want keys to appear
    $order = [
        //'report_title',
        'date_of_inspection',
        'school_name',
        //'zonal_office',
        //'approval_number',
        //'reporting_period',
        'lga','ward'
        //,'category'
    ];
     
    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        'nearby_school' =>['nearby_school', 'nearby_distance'],
        // add more groups if needed
    ];
        $data=$report->cies_reports;
@endphp
 
@include('registrations::preview.render_section', ['data' => $data['sectionA']??[], 'groups' => $groups, 'order' => $order])



<div class="text-xl mb-2">Section B</div>
<hr/>


 @php
    $sectionB = $report->cies_reports['sectionB'] ?? [];


    $total_levels = sumKeys(collect($sectionB['levels']), ['male', 'female']);

    $final_total_levels =sumNumericFields($total_levels);
//dd($total_levels);

        $rcie=$data['sectionB']??[];
        $rcie['total_levels']=[$total_levels];

        //print_r($total_levels);

        $rcie['final_total_levels']=$final_total_levels;

    //print_r(implode("','",array_keys( $sectionB)));
    // Define order you want keys to appear
    $order = [
        'levels','total_levels','final_total_levels'
    ];
     
    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        //'levels' =>['level','male', 'female'],
        // add more groups if needed
    ];
    $arrayTableColumns =[ 
        'levels' =>['level','male', 'female'],
        'total_levels'=>['male', 'female'],
     ];
        $data=$report->cies_reports;
@endphp
 
@include('registrations::preview.render_section', ['data' => $rcie, 'groups' => $groups, 'order' => $order])



<div class="text-xl mb-2">Section C</div>
<hr/>


 @php
    $sectionC = $report->cies_reports['sectionC'] ?? [];

 //print_r(implode("','",array_keys( $sectionC)));
    // Define order you want keys to appear
    $total_staffing = sumKeys(collect($sectionC['staffing']), ['male', 'female']);
    
    $final_total_staffing =sumNumericFields($total_staffing);
    
    $total_teacher_qualifications = sumKeys(collect($sectionC['teacher_qualifications']), ['male', 'female']);
    
    $final_teacher_qualifications =sumNumericFields($total_teacher_qualifications);

        $rcie=$data['sectionC']??[];

        $rcie['final_total_staffing']=$final_total_staffing;
        $rcie['total_staffing']=[$total_staffing];

        $rcie['final_teacher_qualifications']=$final_teacher_qualifications;
        $rcie['total_teacher_qualifications']=[$total_teacher_qualifications];

    $order = [
        'staffing','total_staffing','final_total_staffing',
        'teacher_qualifications','total_teacher_qualifications','final_teacher_qualifications'
    ];
     
    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        //'levels' =>['level','male', 'female'],
        // add more groups if needed
    ];
    $arrayTableColumns =[ 
        'staffing' =>['category','male', 'female'],
        'total_staffing'=>['male', 'female'],
        'teacher_qualifications' =>['category','male', 'female'],
        'total_teacher_qualifications'=>['male', 'female'],
     ];
        $data=$report->cies_reports;

@endphp
 
@include('registrations::preview.render_section', ['data' => $rcie, 'groups' => $groups, 'order' => $order])


<div class="text-xl mb-2">Section D</div>
<hr/>


 @php
    $sectionD = $report->cies_reports['sectionD'] ?? [];

 //print_r(implode("','",array_keys( $sectionD)));
    // Define order you want keys to appear
    $order = [
        'library','security','electricity','laboratories','other_labs','water_supply','classrooms_in_use','class_dimension','average_class_size','functional_toilets'
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
 
@include('registrations::preview.render_section', ['data' => $data['sectionD']??[], 'groups' => $groups, 'order' => $order])

<div class="text-xl mb-2">Section D</div>
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
 
@include('registrations::preview.render_section', ['data' => $data['sectionG']??[], 'groups' => $groups, 'order' => $order])


@php
$data=$report->cies_reports['sectionH']??[];

$photos= \Modules\CIEs\Services\CieKonstants::getPhotoList()??[];

@endphp

@foreach($photos as $uploadItem)
     
    <div class="text-xl font-bold capitalize mt-5 mb-2 border-b">{{$uploadItem}}</div>

    @php
    $data['docs']=$data['uploads'][$uploadItem]??[];

    //print_r($data);
    @endphp
    @if(empty($data['docs']))
    <div>No photos found</div>
    @else
    @include('cies::report.lightbox')
    @endif
@endforeach


<?php
/*
@include('cies::report.lightbox')
*/
?>