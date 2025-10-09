 <x-app-layout>
<h2>Review Application: {{ $approval->application->title }}</h2>
<p><strong>Description:</strong> {{ $approval->application->description }}</p>

<?php
//this can be made to simulate points where the applicant pays approval fee or application fee
?>
@if($application->currentApproval() && $application->currentApproval()->status === 'needs_applicant_input')
    <form method="POST" action="{{ route('applications.respond', $application) }}">
        @csrf
        <div class="mb-3">
            <label>Your Response</label>
            <textarea name="response" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit Response</button>
    </form>
@endif



@if (auth()->user()->hasRole($approval->stage->role_name))
    <form method="POST" action="{{ route('approvals.approve', $approval) }}">
        @csrf
        <div class="mb-3">
            <label>Comments (optional)</label>
            <textarea name="comments" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Approve</button>
    </form>

    <form method="POST" action="{{ route('approvals.reject', $approval) }}" class="mt-2">
        @csrf
        <div class="mb-3">
            <label>Comments (required for rejection)</label>
            <textarea name="comments" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-danger">Reject</button>
    </form>

    <form method="POST" action="{{ route('approvals.request-input', $approval) }}" class="mt-2">
    @csrf
    <div class="mb-3">
        <label>What info do you need from the applicant?</label>
        <textarea name="comments" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-warning">Request Applicant Input</button>
</form>

@else
    <div class="alert alert-warning">
        You do not have permission to act on this stage.
    </div>
@endif

<!--
<form method="POST" action="{{ route('approvals.approve', $approval) }}">
    @csrf
    <div class="mb-3">
        <label>Comments (optional)</label>
        <textarea name="comments" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Approve</button>
</form>

<form method="POST" action="{{ route('approvals.reject', $approval) }}" class="mt-2">
    @csrf
    <div class="mb-3">
        <label>Comments (required for rejection)</label>
        <textarea name="comments" class="form-control" required></textarea>
    </div>
    <button type="submit" class="btn btn-danger">Reject</button>
</form>
-->
</x-app-layout>