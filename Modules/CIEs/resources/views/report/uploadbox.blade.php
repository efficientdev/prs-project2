
{{-- File upload section --}}
@php
    $isRequired = count($data['docs'] ?? []) < 1;
@endphp

<div 
    x-data="{
        files: Array({{ max(count($data['docs'] ?? []), 1) }}).fill(null),
        addFile() {
            if(this.files.length<5){
                this.files.push(null);
            }else{
                alert('max upload reached');
            }
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

