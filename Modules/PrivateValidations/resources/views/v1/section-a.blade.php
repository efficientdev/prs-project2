<form action="{{ route('school.private.validation.post', 'section-a') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>School Name</label>
    <input type="text" name="school_name" value="{{ old('school_name', $data['section-a']['school_name'] ?? '') }}" required>

    <label>Approval Number</label>
    <input type="text" name="approval_number" value="{{ old('approval_number', $data['section-a']['approval_number'] ?? '') }}" required>

    <label>School Category</label>
    <select name="school_category" required>
        <option value="">Select</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
    </select>

    <label>School Level</label>
    <select name="school_level" required>
        <option value="Nursery">Nursery</option>
        <option value="Primary">Primary</option>
        <option value="Basic">Basic</option>
        <option value="Junior Secondary">Junior Secondary</option>
        <option value="Senior Secondary">Senior Secondary</option>
    </select>

    <label>Date of Approval</label>
    <input type="date" name="date_of_approval">

    <label>Approval Letter</label>
    <input type="file" name="approval_letter" required>

    <label>Certificate of Registration Available?</label>
    <select name="certificate_available" required>
        <option value="YES">YES</option>
        <option value="NO">NO</option>
    </select>

    <label>Upload Certificate (if any)</label>
    <input type="file" name="certificate_file">

    <label>LGA</label>
    <input type="text" name="lga">

    <label>Ward</label>
    <input type="text" name="ward">

    <button type="submit">Next</button>
</form>
