<!DOCTYPE html>
<html>
<head>
    <title>Create Order</title>
</head>
<body>
    <div class="container">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf
            <div>
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" name="product_name" required>
            </div>
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" required>
            </div>
            <div>
                <label for="status_id">Status</label>
                <select id="status_id" name="status_id" required>
                    @foreach($activeStatuses as $status)
                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="items">Items</label>
                @foreach($items as $item)
                    <div>
                        <input type="checkbox" id="items[{{ $item->id }}]" name="items[]" value="{{ $item->id }}">
                        <label for="items[{{ $item->id }}]">{{ $item->name }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
