<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Status</title>
</head>
<body>
    <div class="container">
        <form action="{{ route('statuses.update', ['status' => $status->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Status Name</label>
                <input type="text" id="name" name="name" value="{{ $status->name }}" required>
            </div>
            <div>
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ $status->is_active ? 'checked' : '' }}>
                <label for="is_active">Active</label>
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

