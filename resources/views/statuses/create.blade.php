<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Status</title>
</head>
<body>
    <div class="container">
        <form action="{{ route('statuses.store') }}" method="POST">
            @csrf
            <div>
                <label for="name">Status Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div>
                <input type="checkbox" id="is_active" name="is_active" value="1" checked>
                <label for="is_active">Active</label>
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
