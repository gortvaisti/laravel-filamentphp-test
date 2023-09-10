<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Statuses</title>
</head>
<body>
    <div class="container">
        <div class="mb-2">
            <a href="{{ route('statuses.create') }}">Create New Status</a>
        </div>
        <div class="filter-container">
            <form action="{{ route('statuses.index') }}" method="GET">
                <select name="is_active" onchange="this.form.submit()">
                    <option value="">All</option>
                    <option value="1" {{ request()->query('is_active') == '1' ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ request()->query('is_active') == '0' ? 'selected' : '' }}>Inactive</option>
                </select>
            </form>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Active</th>
                <th>Actions</th>
            </tr>
            @foreach($statuses as $status)
                <tr>
                    <td>{{ $status->id }}</td>
                    <td>{{ $status->name }}</td>
                    <td>{{ $status->is_active ? 'Yes' : 'No' }}</td>
                    <td>
                        <a href="{{ route('statuses.edit', $status->id) }}">Edit</a>
                        <form action="{{ route('statuses.destroy', $status->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
