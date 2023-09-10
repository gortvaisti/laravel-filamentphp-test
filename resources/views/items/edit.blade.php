<!DOCTYPE html>
<html>
<head>
    <title>Edit Item</title>
</head>
<body>
    <div class="container">
        <h2>Edit Item #{{ $item->id }}</h2>

        <form action="{{ route('items.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}" required>
            </div>

            <div class="mb-3">
                <label for="condition" class="form-label">Condition</label>
                <select class="form-select" id="condition" name="condition" required>
                    <option value="új" {{ $item->condition == 'új' ? 'selected' : '' }}>Új</option>
                    <option value="használt" {{ $item->condition == 'használt' ? 'selected' : '' }}>Használt</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="color" class="form-control" id="color" name="color" value="{{ $item->color }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
