
 @php
    //$sectionC = $report->prs_4_report ?? [];
    $sectionA = $report->prs_4_report['sectionA'] ?? [];

 //print_r(implode("','",array_keys( $sectionA)));
    // Define order you want keys to appear
    $order = [
        'school_name','type_of_school','school_address',
    'year_founded','','inspection_date','','','philosophy','motto','school_fees','teacher_salary','physical_facilities','learning_facilities','games_facilities','',
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
@endphp
 
@include('registrations::preview.render_section', ['data' => $data['sectionB']??[], 'groups' => $groups, 'order' => $order])



<div class="text-xl mb-2">Section C</div>
<hr/>


 @php
    $sectionC = $report->prs_4_report['sectionC'] ?? [];

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
        $data=$report->prs_4_report;
@endphp
 
@include('registrations::preview.render_section', ['data' => $data['sectionC']??[], 'groups' => $groups, 'order' => $order])



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
  
