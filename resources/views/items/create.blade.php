<!DOCTYPE html>
<html>
<head>
    <title>Create New Item</title>
</head>
<body>
    <div class="container">
        <h2>Create New Item</h2>

        <form action="{{ route('items.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="mb-3">
                <label for="condition" class="form-label">Condition</label>
                <select class="form-select" id="condition" name="condition" required>
                    <option value="új">Új</option>
                    <option value="használt">Használt</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="color">Color:</label>
                <input type="color" id="color" name="color" value="{{ old('color', $item->color ?? '#000000') }}">
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</body>
</html>
