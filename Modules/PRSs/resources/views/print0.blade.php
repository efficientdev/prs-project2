

 @php
    $sectionC = $report->prs_4_report ?? [];
  
  /**/
    // Define order you want keys to appear
    $order = ['school_name','type_of_school','location_of_school',
    'year_founded','','date_of_inspection','name_of_inspectors','','','philosophy','motto','school_fees','salary_of_teachers','physical_facilities','learning_facilities','games_facilities','',
    'school_record',
    'other_record',
        'levels',
        'teacher_qualifications'
    ];
     
    // Define groups (tables) of multiple keys to show side by side
    $groups = [
        //'levels' =>['level','male', 'female'],
        // add more groups if needed
    ];
    $arrayTableColumns =[ 
        'levels' =>['level','male', 'female','remarks'],
        'teacher_qualifications' =>['category','male', 'female','remarks'],
     ];
        $data=$report->prs_4_report;
@endphp
 
@include('registrations::preview.render_section', ['data' => $data??[], 'groups' => $groups, 'order' => $order])



 @php
    $approvals = $report->prs_4_report['approvals2'] ?? [];
 
 @endphp
<div class="space-y-6">
    @foreach($approvals as $category => $entries)
        <div class="border rounded-md p-4 shadow-sm">
            <h3 class="font-semibold text-lg text-gray-800 mb-4">{{ $category }}</h3>

            <div class="space-y-4 grid md:grid-cols-2 gap-4">
                @foreach($entries as $entry)
                    @php
                        $file = 'storage/'.$entry['file'];
                        $status = $entry['status'];
                        $reason = $entry['reason'];
                        $ext = pathinfo($file, PATHINFO_EXTENSION);
                        $isImage = in_array(strtolower($ext), ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                    @endphp

                    <div class="p-4 bg-gray-50 flex gap-4 items-start rounded-md border space-y-2">
                        <!-- File display -->
                        <div class="flex items-center space-x-4">
                            @if ($isImage)
                                <img src="{{ asset($file) }}" alt="Image" class="w-20 h-20 object-cover border rounded">
                            @else
                                <a href="{{ asset($file) }}" target="_blank" class="text-blue-600 underline text-sm">
                                    {{ basename($file) }}
                                </a>
                            @endif
                        </div>

                        <div>

                            <span class="text-sm text-gray-600 break-all"> {{ basename($file) }}<!--{{ $file }}--></span>
                        <!-- Status -->
                        <div class="text-sm">
                            <span class="font-medium">Status:</span>
                            @if ($status === 'approved')
                                <span class="text-green-600 font-semibold">Approved</span>
                            @elseif ($status === 'rejected')
                                <span class="text-red-600 font-semibold">Rejected</span>
                            @endif
                        </div>

                        <!-- Rejection reason -->
                        @if ($status === 'rejected' && $reason)
                            <div class="text-sm text-gray-700">
                                <span class="font-medium">Reason:</span> {{ $reason }}
                            </div>
                        @endif
                    </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

<br/>
 @php
    $sectionG = $report->prs_4_report ?? [];
 
    $order = [
        'observations','recommendations'
    ];
     
    // Gefine groups (tables) of multiple keys to show side by side
    $groups = [
        //'levels' =>['level','male', 'female'], 
    ];
    $arrayTableGolumns =[ 
        //'levels' =>['level','male', 'female'],
     ];
        $data=$report->prs_4_report;
@endphp
 
@include('registrations::preview.render_section', ['data' => $data??[], 'groups' => $groups, 'order' => $order])
