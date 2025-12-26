<x-prss::layouts.master>

@php
$data = old() ?: ($inspectionReport ?? []);
@endphp



 
<form method="POST"
    enctype="multipart/form-data" action="{{ route('prss.sectionA.store', $report->id) }}"
    x-data="inspectionForm({{ json_encode($data) }})"
    class="space-y-6 ">



<div class="grid grid-cols-2 gap-3 capitalize">
<div><label>School name</label><br/>
    <input type="hidden" name="school_name" value="{{$proprietorSectionA['proposed_name']}}" />
{{$proprietorSectionA['proposed_name']}}
</div>
<div><label>school address</label><br/>
{{$proprietorSectionA['school_address']}}<input type="hidden" name="school_location" value="{{$proprietorSectionA['school_address']}}" />
</div></div>

<div class="grid grid-cols-2 gap-3 capitalize">
<div><label>proprietor phone number</label><br/>
{{$proprietorSectionA['phone_number']}}
</div>
</div>



    @csrf
<?php
/*bg-white p-6 rounded shadow
<!--
<form 
    method="POST" 
    enctype="multipart/form-data"
    action="{{ isset($inspectionReport) ? route('inspection.update', $inspectionReport) : route('inspection.store', $inspectionReport) }}"
    x-data="inspectionForm({{ json_encode($data) }})"
    class="space-y-6 bg-white p-6 rounded shadow"
>
    @csrf
    @isset($inspectionReport)
        @method('PUT')
    @endisset
-->
*/?>

    <!-- Year Founded -->
    <div class="mb-4">
        <label>Year Founded</label><input type="text" name="year_founded" x-model="form.year_founded"
        class="w-full border rounded p-2" placeholder="Year Founded" /></div>

    <!-- Date of Inspection -->
    <div class="mb-4">
        <label>Date of Inspection</label><input type="date" name="inspection_date" x-model="form.inspection_date"
        class="w-full border rounded p-2" /></div>

    <!-- Inspectors -->
    <div>
        <label class="font-semibold">Inspectors</label>
        <div class="flex gap-2">
        <template x-for="(inspector, index) in form.inspectors" :key="index">
            <input type="text" 
                :name="`inspectors[${index}]`"
                x-model="form.inspectors[index]"
                class="w-[150px] border rounded p-2 mt-2"
                placeholder="Inspector Name">
        </template></div>
    
    <div class="mt-6">
    <h3 class="font-semibold text-lg">Inspector Signatures</h3>
<div class="flex gap-2">
    <template x-for="(inspector, index) in form.inspectors" :key="index">
        <div class=" py-2 mt-1 w-[150px]">
            <p class="font-medium" x-text="inspector || 'Inspector'"></p>

            <!-- Existing Signature -->
            <template x-if="existingSignatures[index]">
                <img :src="existingSignatures[index]"
                     class="h-20 mt-2 border">
            </template>

            <!-- Upload -->
            <input type="file"
                   accept="image/*"
                   :name="`signatures[${index}]`"
                   @change="previewSignature($event, index)"
                   class="mt-2">

            <!-- Preview -->
            <template x-if="signaturePreviews[index]">
                <img :src="signaturePreviews[index]"
                     class="h-20 mt-2 border">
            </template>
        </div>
    </template></div>
</div>


        <button type="button" @click="addInspector"
            class="text-blue-600 mt-2">+ Add Inspector</button>

        <!-- Signatures -->
        <div class="mt-4">
            <h4 class="font-semibold">Signatures</h4>
            <template x-for="name in form.inspectors" :key="name">
                <p class="italic text-sm">Signed: <span x-text="name"></span></p>
            </template>
        </div>
    </div>

    <!-- Text Areas -->
    <div class="mb-4">
        <label>Philosophy / Objective</label>
        <textarea name="philosophy" x-model="form.philosophy" class="w-full border p-2"
        placeholder="Philosophy / Objective"></textarea>
    </div>

    <div class="mb-4">
        <label>School Motto</label>
        <input type="text" name="motto" x-model="form.motto" class="w-full border p-2"
        placeholder="School Motto">
    </div>

    <div class="mb-4">
        <label>School Fees</label>
        <input type="text" name="school_fees" x-model="form.school_fees"
        class="w-full border p-2" placeholder="School Fees">
    </div>

    <div class="mb-4">
        <label>Salary of Teachers</label>
        <input type="text" name="teacher_salary" x-model="form.teacher_salary"
        class="w-full border p-2" placeholder="Salary of Teachers">
    </div>

    <div class="mb-4">
        <label>Physical Facilities</label>
        <textarea name="physical_facilities" x-model="form.physical_facilities"
        class="w-full border p-2" placeholder="Physical Facilities"></textarea>
    </div>

    <div class="mb-4">
        <label>Learning Facilities</label>
        <textarea name="learning_facilities" x-model="form.learning_facilities"
        class="w-full border p-2" placeholder="Learning Facilities"></textarea>
    </div>

    <div class="mb-4">
        <label>Games Facilities</label>
        <textarea name="games_facilities" x-model="form.games_facilities"
        class="w-full border p-2" placeholder="Games Facilities"></textarea>
    </div>

    <!-- School Records -->
    <div>
        <label class="font-semibold">School Records</label>
        @php
            $records = [
                'Class attendance register', 'Admission register', 'Class diaries',
                'Time book', 'Visitors’ book', 'School timetable', 'Log book',
                'National Policy on Education', 'Scheme of work', 'Lesson notes',
                'Staff Movement Book', 'Lesson plan', 'Staff Meeting book'
            ];
        @endphp

        @foreach($records as $record)
            <label class="flex items-center space-x-2">
                <input type="checkbox" name="school_records[]"
                    value="{{ $record }}"
                    :checked="form.school_records.includes('{{ $record }}')">
                <span>{{ $record }}</span>
            </label>
        @endforeach

        <input type="text" name="other_records"
            x-model="form.other_records"
            class="w-full border p-2 mt-2"
            placeholder="Others (specify)">
    </div>

    <button type="submit"
        class="bg-blue-600 text-white px-6 py-2 rounded">
        Next
    </button>
</form>
<script>
function inspectionForm(data = {}) {
    return {
        form: {
            year_founded: data.year_founded || '',
            inspection_date: data.inspection_date || '',
            inspectors: data.inspectors || [''],
            philosophy: data.philosophy || '',
            motto: data.motto || '',
            school_fees: data.school_fees || '',
            teacher_salary: data.teacher_salary || '',
            physical_facilities: data.physical_facilities || '',
            learning_facilities: data.learning_facilities || '',
            games_facilities: data.games_facilities || '',
            school_records: data.school_records || [],
            other_records: data.other_records || '',
        },
        addInspector() {
            this.form.inspectors.push('');
        },

        existingSignatures1: Object.values(data.signatures || {}).map(path =>
            path ? `/storage/${path}` : null
        ),
        existingSignatures: Object.values(data.signatures || {}).map(path => {
            if (!path) return null;

            // Already a full URL or already contains /storage
            if (path.startsWith('http') || path.includes('/storage/')) {
                return path;
            }

            // Relative storage path
            return `/storage/${path}`;
        }),


        signaturePreviews: {},
 

        previewSignature(event, index) {
            const file = event.target.files[0];
            if (!file) return;

            this.signaturePreviews[index] = URL.createObjectURL(file);
        }
    }
}
</script>

</x-prss::layouts.master>