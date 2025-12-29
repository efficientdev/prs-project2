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


 @php
    //$sectionC = $report->prs_4_report ?? [];
    $sectionA = $report->prs_4_report['sectionA'] ?? [];

 //print_r(implode("','",array_keys( $sectionA)));
    // Define order you want keys to appear
    $order = [
        'school_name','type_of_school','school_address',
    'year_founded','inspection_date','', 'philosophy','motto','school_fees','teacher_salary','physical_facilities','learning_facilities','games_facilities','',
    'school_records',
    'other_records'
    ];
     
    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        'nearby_school' =>['nearby_school', 'nearby_distance'],
        // add more groups if needed
    ];
        $data=$report->prs_4_report;
@endphp
 
@include('registrations::preview.render_section', ['data' => $data['sectionA']??[], 'groups' => $groups, 'order' => $order])



<div class="text-xl mb-2">Section B</div>
<hr/>


 @php
    $sectionB = $report->prs_4_report['sectionB'] ?? [];

/*
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
        $data=$report->prs_4_report;

*/

    $levels_total = sumKeys(collect($sectionB['levels']), ['male', 'female']);

    $levels_final_total =sumNumericFields($levels_total);
//dd($levels_total);

        $rcie=$data['sectionB']??[];
        $rcie['levels_total']=[$levels_total];

        //print_r($levels_total);

        $rcie['levels_final_total']=$levels_final_total;

    //print_r(implode("','",array_keys( $sectionB)));
    // Define order you want keys to appear
    $order = [
        'levels','levels_total','levels_final_total'
    ];
     
    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        //'levels' =>['level','male', 'female'],
        // add more groups if needed
    ];
    $arrayTableColumns =[ 
        'levels' =>['level','male', 'female'],
        'levels_total'=>['male', 'female'],
     ];
        //$data=$report->cies_reports;

@endphp
 
@include('registrations::preview.render_section', ['data' => $rcie, 'groups' => $groups, 'order' => $order])



<div class="text-xl mb-2">Section C</div>
<hr/>


 @php
    $sectionC = $report->prs_4_report['sectionC'] ?? [];


 //print_r(implode("','",array_keys( $sectionC)));
    // Define order you want keys to appear
    $total_staffing = sumKeys(collect($sectionC['staffing']??[]), ['male', 'female']);
    
    $final_total_staffing =sumNumericFields($total_staffing);
    
    $total_teacher_qualifications = sumKeys(collect($sectionC['teacher_qualifications']??[]), ['male', 'female']);
    
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
/*

 //print_r(implode("','",array_keys( $sectionC)));
    // Define order you want keys to appear
    $order = [
        'staffing',
        'teacher_qualifications'
    ];
     
    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        //'levels' =>['level','male', 'female'],
        // add more groups if needed
    ];
    $arrayTableColumns =[ 
        'staffing' =>['category','male', 'female'],
        'teacher_qualifications' =>['category','male', 'female'],
     ];

     */
        $data=$report->prs_4_report;
@endphp
 
@include('registrations::preview.render_section', ['data' => $rcie, 'groups' => $groups, 'order' => $order])



@php
$printmode=true;

        $approved = $report->getPrs1('sectionD') ?? null;
        $data2 = $report->getSection('sectionH') ?? [];
@endphp
    <h2 class="text-lg font-bold mb-4">Section D: Approved Uploads</h2>

  
    @include('prss::report.uploadbox2')



 @php
    $sectionG = $report->prs_4_report['sectionG'] ?? [];
 
    // Define order you want keys to appear
    $order = [
        'observations','recommendations'
    ];
     
    // Gefine groups (tables) of multiple keys to show side by side
    $groups = [
        //'levels' =>['level','male', 'female'],
        // add more groups if needed
    ];
    $arrayTableGolumns =[ 
        //'levels' =>['level','male', 'female'],
     ];
        $data=$report->prs_4_report;
@endphp
 
@include('registrations::preview.render_section', ['data' => $data['sectionG']??[], 'groups' => $groups, 'order' => $order])


@php
$data = old() ?: ($report->prs_4_report['sectionA'] ?? []);
@endphp

 
    <h3 class="mt-6 font-semibold text-lg">Inspector's Signatures</h3>
<div x-data="inspectionForm({{ json_encode($data) }})">
 
    <div class="mt-2"> 
    <div class="flex gap-2">
        <template x-for="(inspector, index) in form.inspectors" :key="index">
            <div class=" py-2 mt-1 w-[150px]">

                <p class="font-medium" x-text="inspector || 'Inspector'"></p>
                <!-- Existing Signature -->
                <template x-if="existingSignatures[index]">
                    <img :src="existingSignatures[index]"
                         class="h-20 mt-2 border">
                </template>
  
            </div>
        </template></div>
    </div>
 

</div>

<script>
function inspectionForm(data = {}) {
    return {
        form: { 
            inspectors: data.inspectors || [''], 
        },  
        existingSignatures: Object.values(data.signatures || {}).map(path => {
            if (!path) return null;

            // Already a full URL or already contains /storage
            if (path.startsWith('http') || path.includes('/storage/')) {
                return path;
            }

            // Relative storage path
            return `/storage/${path}`;
        }),
 
    }
}
</script>
  
