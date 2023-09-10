<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
</head>
<body>
    <div class="container">
        <form action="{{ route('orders.update', ['order' => $order->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div>
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" name="product_name" value="{{ $order->product_name }}" required>
            </div>
            <div>
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" value="{{ $order->quantity }}" required>
            </div>
            <div>
                <label for="status_id">Status</label>
                <select id="status_id" name="status_id" required>
                    @foreach($activeStatuses as $status)
                        <option value="{{ $status->id }}" {{ $order->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="items">Items</label>
                @foreach($items as $item)
                    <div>
                        <input type="checkbox" id="items[{{ $item->id }}]" name="items[]" value="{{ $item->id }}" {{ $order->items->contains($item->id) ? 'checked' : '' }}>
                        <label for="items[{{ $item->id }}]">{{ $item->name }}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
