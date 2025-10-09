<form action="{{ route('school.private.validation.post', 'section-c') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Total number of teaching staff</label>
    <input type="number" name="total_teaching_staff" required>

    <label>Number of qualified teachers (with TRCN certification)</label>
    <input type="number" name="qualified_teachers" required>

    <label>Number of non-teaching staff</label>
    <input type="number" name="non_teaching_staff" required>

    <label>Upload updated staff list (Excel/PDF)</label>
    <input type="file" name="staff_list_file" accept=".pdf,.xls,.xlsx" required>

    <button type="submit">Next</button>
</form>
