<form action="{{ route('school.private.validation.post', 'section-b') }}" method="POST">
    @csrf

    <label>Proprietor’s Name</label>
    <input type="text" name="proprietor_name" value="{{ old('proprietor_name', $data['section-b']['proprietor_name'] ?? '') }}" required>

    <label>Proprietor’s Phone</label>
    <input type="text" name="proprietor_phone" value="{{ old('proprietor_phone', $data['section-b']['proprietor_phone'] ?? '') }}" required>

    <label>Proprietor’s Email</label>
    <input type="email" name="proprietor_email" value="{{ old('proprietor_email', $data['section-b']['proprietor_email'] ?? '') }}" required>

    <label>Head Teacher / Principal Name</label>
    <input type="text" name="head_teacher" value="{{ old('head_teacher', $data['section-b']['head_teacher'] ?? '') }}" required>

    <label>Contact Address</label>
    <textarea name="contact_address" required>{{ old('contact_address', $data['section-b']['contact_address'] ?? '') }}</textarea>

    <button type="submit">Next</button>
</form>
