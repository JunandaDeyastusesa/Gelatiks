
<!-- Form Edit Coverage -->
<form action="{{ route('coverage.update', $coverage->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="provinsi" class="form-label">Province Coverage</label>
        <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{ $coverage->provinsi }}" required>
    </div>

    <div class="mb-3">
        <label for="happy_client" class="form-label">Happy Client</label>
        <input type="number" class="form-control" id="happy_client" name="happy_client" value="{{ $coverage->happy_client }}" min="0" required>
    </div>

    <div class="mb-3">
        <label for="years_experience" class="form-label">Years Experience</label>
        <input type="number" class="form-control" id="years_experience" name="years_experience" value="{{ $coverage->years_experience }}" min="0" required>
    </div>

    <button type="submit" class="btn btn-primary">Update Coverage</button>
</form>