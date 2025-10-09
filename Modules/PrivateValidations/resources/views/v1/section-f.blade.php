<form action="{{ route('school.private.validation.post', 'section-f') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Date of last renewal</label>
    <input type="date" name="last_renewal_date" required>

    <label>Upload renewal receipts for 2022–2025</label>
    <input type="file" name="renewal_receipts[2022]" accept="application/pdf" required>
    <input type="file" name="renewal_receipts[2023]" accept="application/pdf" required>
    <input type="file" name="renewal_receipts[2024]" accept="application/pdf" required>
    <input type="file" name="renewal_receipts[2025]" accept="application/pdf" required>

    <label>Expiry Date</label>
    <input type="date" name="expiry_date" required>

    <label>Has the school paid renewal fees?</label>
    <select name="renewal_paid" required>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
    </select>

    <button type="submit">Next</button>
</form>
