<div x-data="multiStepForm()" class="max-w-3xl mx-auto p-4">
    <template x-if="currentStep === 1">
        @include('cies.sections.section_a_form', ['formId' => 'form-section-a'])
    </template>

    <template x-if="currentStep === 2">
        @include('cies.sections.section_b_form', ['formId' => 'form-section-b'])
    </template>

    <template x-if="currentStep === 3">
        @include('cies.sections.section_c_form', ['formId' => 'form-section-c'])
    </template>

    <template x-if="currentStep === 4">
        @include('cies.sections.section_d_form', ['formId' => 'form-section-d'])
    </template>

    <template x-if="currentStep === 5">
        @include('cies.sections.section_g_form', ['formId' => 'form-section-g'])
    </template>

    <div class="mt-4">
        <button
            type="button"
            x-on:click="prevStep()"
            x-bind:disabled="currentStep === 1"
            class="px-4 py-2 bg-gray-300"
        >Previous</button>

        <button
            type="button"
            x-show="currentStep < totalSteps"
            x-on:click="nextStep()"
            class="px-4 py-2 bg-blue-600 text-white"
        >Next</button>

        <button
            type="button"
            x-show="currentStep === totalSteps"
            x-on:click="submitAll()"
            class="px-4 py-2 bg-green-600 text-white"
        >Submit</button>
    </div>
</div>

<script>
function multiStepForm() {
    return {
        currentStep: 1,
        totalSteps: 5,

        nextStep() {
            if (this.currentStep < this.totalSteps) {
                this.currentStep++;
            }
        },

        prevStep() {
            if (this.currentStep > 1) {
                this.currentStep--;
            }
        },

        submitAll() {
            // You could either submit each step individually (AJAX) or gather all data
            // For simplicity: submit the currently included form (with full data from all)
            const form = $el => $el.querySelector('form');
            // Or you can build a combined payload and send via fetch/axios
        },
    }
}
</script>
