<form action="{{ route('school.private.validation.post', 'section-g') }}" method="POST">
    @csrf

    <label>
        <input type="checkbox" name="declaration" value="1" required>
        I affirm that the information provided is true and accurate.
    </label>

    <label>Digital Signature (Type full name)</label>
    <input type="text" name="digital_signature" required>

    <label>Date</label>
    <input type="date" name="signature_date" required>

    <button type="submit">Submit</button>
</form>
