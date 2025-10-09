<div class="text-2xl my-2 font-bold"><h5><br><b>GENERAL INFORMATION</b><hr></h5></div>

<div class="row">
<div class="form-group col-md-6">
    <label>Year Founded</label>
    <input autocomplete="off" class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="year_founded" required="required" value="{{old('year_founded')?old('year_founded'):(isset($cData['year_founded'])?$cData['year_founded']:'')}}">
</div>
<div class="form-group col-md-6">
    <label>Date of Inspection</label>
    <input autocomplete="off" class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="inspection_date" required="required" value="{{old('inspection_date')?old('inspection_date'):(isset($cData['inspection_date'])?$cData['inspection_date']:'')}}">
</div>
<div class="form-group col-md-6">
    <label>Purpose of Inspection</label>
    <textarea class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="inspection_purpose" required="required">{{old('inspection_purpose')?old('inspection_purpose'):(isset($cData['inspection_purpose'])?$cData['inspection_purpose']:'')}}</textarea>
</div>
<div class="form-group col-md-6">
    <label>Name &amp; Ranks of Inspectors</label>
    <textarea class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="inspectors" required="required">{{old('inspectors')?old('inspectors'):(isset($cData['inspectors'])?$cData['inspectors']:'')}}</textarea>
</div>
    </div>

        @php
            $required_details = explode(',', $category->required_details??'');
            $oldDetails = old('required_details', $cData['required_details'] ?? []);
        @endphp

        @if(count($required_details) > 0)    
            <div class="text-2xl my-2 font-bold">
                <h5><br><b>SCHOOL DETAILS</b><hr></h5>
            </div>
        @endif

            <div class="row">
        @foreach($required_details as $required_detail)
            @php
                $fieldKey = \Illuminate\Support\Str::slug($required_detail, '_'); // Converts "School Address" => "school_address"
                $value = $oldDetails[$fieldKey] ?? ($cData->$fieldKey ?? '');
            @endphp
            <div class="form-group col-md-4">
                <label>{{ $required_detail }}</label>
                <textarea 
                    autocomplete="off" 
                    class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" 
                    name="required_details[{{ $fieldKey }}]" 
                    required  
                >{{ $value }}</textarea>
            </div>
        @endforeach
    </div>


    @php
        $classes = array_filter(array_map('trim', explode(',', $category->classes)));
    @endphp

    @if(count($classes) > 0)
        <div class="text-2xl my-2 font-bold">
            <h5><br><b>SCHOOL FEES</b><hr></h5>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @foreach($classes as $class)
                @php
                    $fieldId = 'fees_' . \Illuminate\Support\Str::slug($class, '_');
                    //$oldDetails[$fieldKey] ?? 
                $value = ($cData['fees'][$class] ?? '');


                @endphp

                <div>
                    <label for="{{ $fieldId }}" class="capitalize text-sm font-medium text-gray-700">
                        {{ $class }} (per term)
                    </label>

                    <input
                        type="number"
                        name="fees[{{ $class }}]"
                        id="{{ $fieldId }}"
                        required value='{{ $value }}'
                        autocomplete="off"
                        placeholder="Amount"
                        class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none"
                    />
                </div>
            @endforeach
        </div>
    @endif

    @php
        $required_utilities = array_filter(array_map('trim', explode(',', $category->required_utilities)));
        $oldUtilities = old('utilities', $cData['utilities'] ?? []);
    @endphp

    @if(count($required_utilities) > 0)    
        <div class="text-2xl my-2 font-bold">
            <h5><br><b>UTILITIES</b><hr></h5>
        </div>
    @endif

    <div class="row"> 
    @foreach($required_utilities as $required_utility)
        @php
            // Create a safe input name like "internet_access" from "Internet Access"
            $fieldKey = \Illuminate\Support\Str::slug($required_utility, '_');
            $value = $oldUtilities[$fieldKey] ?? ($cData->$fieldKey ?? '');
        @endphp

        <div class="form-group col-md-4">
            <label for="utility_{{ $fieldKey }}">{{ $required_utility }}</label>
            <input
                type="text"
                autocomplete="off"
                class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none"
                id="utility_{{ $fieldKey }}"
                name="utilities[{{ $fieldKey }}]"
                required
                value="{{ $value }}"
            >
        </div>
    @endforeach
</div>



    <div class="text-2xl my-2 font-bold"><h5><br><b>CATCHMENT AREA</b><hr></h5></div>
    <div class="form-group col-md-12">
        <textarea class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="catchment_area" required="required">{{old('catchment_area')?old('catchment_area'):(isset($cData['catchment_area'])?$cData['catchment_area']:'')}}</textarea>
    </div>
 

    @php
        $classList = explode(',', $category->classes);
        $oldData = old('enrolment', $cData['enrolment'] ?? []);
    @endphp
    @if(count($classList) > 0)

<script>
    function eForm() {
        return {
                classes: @json($classList),
                male1: @json(array_map(fn($d) => $d['male'] ?? 1, $oldData)),
                female1: @json(array_map(fn($d) => $d['female'] ?? 1, $oldData)),
                male: @json(array_values(array_map(fn($class) => $oldData[$class]['male'] ?? 0, $classList))),
                female: @json(array_values(array_map(fn($class) => $oldData[$class]['female'] ?? 0, $classList))),

                get total() {
                    return this.male.map((m, i) => m + Number(this.female[i] || 0));
                },
                get totalMale() {
                    return this.male.reduce((sum, val) => sum + Number(val || 0), 0);
                },
                get totalFemale() {
                    return this.female.reduce((sum, val) => sum + Number(val || 0), 0);
                },
                get grandTotal() {
                    return this.totalMale + this.totalFemale;
                }
            }
    }
</script>
    <div class="text-2xl my-2 font-bold"><h5><br><b>ENROLMENT</b><hr></h5></div>
    <table>
        <thead>
            <tr>
                <th>Class</th>
                <th class="text-center" width="100">Male</th>
                <th class="text-center" width="100">Female</th>
                <th class="text-center" width="100">Total</th>
            </tr>
        </thead>

        <tbody 
            x-data="eForm()"
        >
            @foreach($classList as $index => $className)
            <tr>
                <td>{{ $className }}</td>

                <td>
                    <input 
                        type="number" 
                        class="form-control text-center"
                        min="0"
                        name="enrolment[{{ $className }}][male]"
                        x-model.number="male[{{ $index }}]"
                        required
                    >
                </td>
                <td>
                    <input 
                        type="number" 
                        class="form-control text-center"
                        min="0"
                        name="enrolment[{{ $className }}][female]"
                        x-model.number="female[{{ $index }}]"
                        required
                    >
                </td>
                <td class="text-center">
                    <b x-text="male[{{ $index }}] + female[{{ $index }}]">0</b>
                </td>
            </tr>
            @endforeach

            <!-- Totals row -->
            <tr class="text-right font-bold">
                <td><b>TOTAL</b></td>
                <td class="text-center"><b x-text="totalMale">0</b></td>
                <td class="text-center"><b x-text="totalFemale">0</b></td>
                <td class="text-center"><b x-text="grandTotal">0</b></td>
            </tr>
        </tbody>

    </table>
    @endif

    

    @php
        $teachingStaffList = explode(',', $category->teaching_staff);
        $oldData = old('teaching_staff', $cData['teaching_staff'] ?? []);
    @endphp

    @if(count($teachingStaffList) > 0)

<script>
    function tsForm() {
        return {
                teaching_staff: @json($teachingStaffList),
                male1: @json(array_map(fn($d) => $d['male'] ?? 1, $oldData)),
                female1: @json(array_map(fn($d) => $d['female'] ?? 1, $oldData)), 
                male: @json(array_values(array_map(fn($tsitem) => $oldData[$tsitem]['male'] ?? 0, $teachingStaffList))),
                female: @json(array_values(array_map(fn($tsitem) => $oldData[$tsitem]['female'] ?? 0, $teachingStaffList))),
                get total() {
                    return this.male.map((m, i) => m + Number(this.female[i] || 0));
                },
                get totalMale() {
                    return this.male.reduce((sum, val) => sum + Number(val || 0), 0);
                },
                get totalFemale() {
                    return this.female.reduce((sum, val) => sum + Number(val || 0), 0);
                },
                get grandTotal() {
                    return this.totalMale + this.totalFemale;
                }
            }
    }
</script>
    <div class="text-2xl my-2 font-bold"><h5><br><b>TEACHING STAFF</b><hr></h5></div>
    <table>
        <thead>
            <tr>
                <th>Category</th>
                <th class="text-center" width="100">Male</th>
                <th class="text-center" width="100">Female</th>
                <th class="text-center" width="100">Total</th>
            </tr>
        </thead>
        
        <tbody 
            x-data="tsForm()"
        >
            @foreach($teachingStaffList as $index => $teachingStaffName)
            <tr>
                <td>{{ $teachingStaffName }}</td>

                <td>
                    <input 
                        type="number" 
                        teachingStaff="form-control text-center"
                        min="0" value="0"
                        name="teaching_staff[{{ $teachingStaffName }}][male]"
                        x-model.number="male[{{ $index }}]"
                        required
                    >
                </td>
                <td>
                    <input 
                        type="number" 
                        teachingStaff="form-control text-center"
                        min="0" value="0"
                        name="teaching_staff[{{ $teachingStaffName }}][female]"
                        x-model.number="female[{{ $index }}]"
                        required
                    >
                </td>
                <td teachingStaff="text-center">
                    <b x-text="male[{{ $index }}] + female[{{ $index }}]">0</b>
                </td>
            </tr>
            @endforeach

            <!-- Totals row -->
            <tr teachingStaff="text-right font-bold">
                <td><b>TOTAL</b></td>
                <td teachingStaff="text-center"><b x-text="totalMale">0</b></td>
                <td teachingStaff="text-center"><b x-text="totalFemale">0</b></td>
                <td teachingStaff="text-center"><b x-text="grandTotal">0</b></td>
            </tr>
        </tbody>

    </table>
    @endif

<p class="form-group col-md-12">&nbsp;</p>

<?php
/*
    @if($school->school_status == 5)
<div class="form-group col-md-4">
    <label>Non-Teaching Staff</label>
    <input autocomplete="off" class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="nonteaching_staff" required="required" value="{{old('nonteaching_staff')?old('nonteaching_staff'):(isset($cData->nonteaching_staff)?$cData->nonteaching_staff:0)}}">
</div>
<div class="form-group col-md-4">
    <label>Board of Governors</label>
    <input autocomplete="off" class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="board_governors" required="required" value="{{old('board_governors')?old('board_governors'):(isset($cData->board_governors)?$cData->board_governors:'')}}">
</div>
<div class="form-group col-md-4">
    <label>P.T.A.</label>
    <input autocomplete="off" class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="pta" required="required" value="{{old('pta')?old('pta'):(isset($cData->pta)?$cData->pta:'')}}">
</div>


<div class="text-2xl my-2 font-bold"><h5><br><b>SCHOOL ACCOUNT RECORDS</b><hr></h5></div>
<div class="form-group col-md-6">
    <label>Tuition Fees</label>
    <input autocomplete="off" class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="tuition_fees" required="required" value="{{old('tuition_fees')?old('tuition_fees'):(isset($cData->tuition_fees)?$cData->tuition_fees:'')}}">
</div>
<div class="form-group col-md-6">
    <label>Personal Savings</label>
    <input autocomplete="off" class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="personal_savings" required="required" value="{{old('personal_savings')?old('personal_savings'):(isset($cData->personal_savings)?$cData->personal_savings:'')}}">
</div>

<div class="text-2xl my-2 font-bold"><h5><br><b>SECURITY AGREEMENT FOR AVAILABLE FUND</b><hr></h5></div>
<div class="form-group col-md-12">
    <input autocomplete="off" class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="security_agreement" required="required" value="{{old('security_agreement')?old('security_agreement'):(isset($cData->security_agreement)?$cData->security_agreement:'')}}">
</div>
    @endif
*/
?>

@php
    $statutory_records = array_filter(array_map('trim', explode(',', $category->statutory_records)));
    $oldUtilities = old('statutory_record', $cData['statutory_record'] ?? []);
@endphp

@if(count($statutory_records) > 0)    
    <div class="text-2xl my-2 font-bold">
        <h5><br><b>STATUTORY RECORDS</b><hr></h5>
    </div>
@endif 

<div class="row"> 
@foreach($statutory_records as $statutory_record)
    @php
        // Create a safe input name like "internet_access" from "Internet Access"
        $fieldKey = \Illuminate\Support\Str::slug($statutory_record, '_');
        $value = $oldUtilities[$fieldKey] ?? ($cData->$fieldKey ?? '');
    @endphp

    <div class="form-group col-md-4">
        <label for="statutory_record_{{ $fieldKey }}">{{ $statutory_record }}</label>
        <input
            type="text"
            autocomplete="off"
            class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none"
            id="statutory_record_{{ $fieldKey }}"
            name="statutory_record[{{ $fieldKey }}]"
            required
            value="{{ $value }}"
        >
    </div>
@endforeach
</div>


<div class="text-2xl my-2 font-bold"><h5><br><b>GENERAL OBSERVATIONS &amp; FINDINGS</b><hr></h5></div>
<div class="form-group  ">
    <textarea class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="notes" required="required">
{{old('notes')?old('notes'):(isset($cData['notes'])?$cData['notes']:'')}}</textarea>
</div>

<div class="flex gap-5">
    <div class="flex gap-2 items-center">
        <input type="radio" required name="proceed" value="approve"> Approve
    </div>
    <div class="flex gap-2 items-center">
        <input type="radio" required name="proceed" value="reject"> Reject
    </div>
</div>

<?php
/*
    @if($school->school_status == 6)
<div class="form-group col-md-12">
    <label>Recommendation</label>
    <textarea class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" name="recommendation" required="required">{{old('recommendation')?old('recommendation'):(isset($note->recommendation)?$note->recommendation:'')}}</textarea>
</div>
    @endif
*/
?>  
<!-- resources/views/components/file-upload.blade.php (optional if you want it as a component) -->
 
{{-- Show existing uploaded documents --}}
@if(!empty($cData['docs']))
    @foreach($cData['docs'] as $doc)
        @if(!empty($doc))
            <div class="mb-1">
                <a href="{{ asset('storage/' . $doc) }}" target="_blank">{{ basename($doc) }}</a>
            </div>
        @endif
    @endforeach
@endif

{{-- File upload section --}}
@php
    $isRequired = count($cData['docs'] ?? []) < 1;
@endphp

<div 
    x-data="{
        files: Array({{ max(count($cData['docs'] ?? []), 1) }}).fill(null),
        addFile() {
            this.files.push(null);
        },
        removeFile(index) {
            if (this.files.length > 1) {
                this.files.splice(index, 1);
            }
        }
    }"
>
    <div class="text-2xl my-2 font-bold">
        <h5 class="mt-3"><b>FILE ATTACHMENTS</b></h5>
        <hr>
    </div>

    <template x-for="(file, index) in files" :key="index">
        <div class="form-group col-md-6 d-flex align-items-center gap-2 mb-2">
            <input 
                class="mt-1 block w-full rounded-md shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 resize-none" 
                name="docs[]" 
                type="file"
                @if($isRequired) required @endif
            >
            <button 
                type="button" 
                class="btn btn-danger btn-sm" 
                x-show="files.length > 1" 
                @click="removeFile(index)"
            >
                ✕
            </button>
        </div>
    </template>

    <div class=" mt-2">
        <button type="button" class="btn btn-primary btn-sm" @click="addFile()">
            + Add Another File
        </button>
    </div>
</div>



<div class="clearfix col-md-12">&nbsp;</div>