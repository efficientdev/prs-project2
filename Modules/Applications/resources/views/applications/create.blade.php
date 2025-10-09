 <x-app-layout>
<h2>Submit New Application</h2>

<form method="POST" action="{{ route('applications.store') }}">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required />
    </div>
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form> 
</x-app-layout>