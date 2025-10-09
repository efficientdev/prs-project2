<form action="{{ route('school.private.validation.post', 'section-e') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Number of classrooms in use</label>
    <input type="number" name="classrooms" required>

    <label>Number of functional toilets</label>
    <input type="number" name="functional_toilets" required>

    <label>Library available?</label>
    <select name="library" required>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>

    <label>Laboratories available?</label>
    <div>
        <label><input type="checkbox" name="laboratories[]" value="Science"> Science</label>
        <label><input type="checkbox" name="laboratories[]" value="ICT"> ICT</label>
        <label><input type="checkbox" name="laboratories[]" value="Home Economics"> Home Economics</label>
        <label><input type="checkbox" name="laboratories[]" value="Others"> Others</label>
    </div>

    <label>Upload 3 recent photos of school facilities</label>
    <input type="file" name="facility_photos[]" accept="image/*" multiple required>

    <button type="submit">Next</button>
</form>
