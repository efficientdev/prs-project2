<form action="{{ route('school.private.validation.post', 'section-d') }}" method="POST">
    @csrf

    <label>Total enrolment (current academic year)</label>
    <input type="number" name="total_enrolment" required>

    <label>Enrolment by level and gender</label>
    <div>
        <p>Nursery (Boys)</p>
        <input type="number" name="enrolment_breakdown[nursery][boys]" required>
        <p>Nursery (Girls)</p>
        <input type="number" name="enrolment_breakdown[nursery][girls]" required>

        <p>Primary (Boys)</p>
        <input type="number" name="enrolment_breakdown[primary][boys]" required>
        <p>Primary (Girls)</p>
        <input type="number" name="enrolment_breakdown[primary][girls]" required>

        <p>JSS (Boys)</p>
        <input type="number" name="enrolment_breakdown[jss][boys]" required>
        <p>JSS (Girls)</p>
        <input type="number" name="enrolment_breakdown[jss][girls]" required>

        <p>SSS (Boys)</p>
        <input type="number" name="enrolment_breakdown[sss][boys]" required>
        <p>SSS (Girls)</p>
        <input type="number" name="enrolment_breakdown[sss][girls]" required>
    </div>

    <button type="submit">Next</button>
</form>
