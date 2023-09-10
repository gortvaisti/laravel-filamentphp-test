<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders</title>
</head>
<body>
    <div class="container">

        <div class="search-container">
            <form action="{{ route('orders.index') }}" method="GET">
                <input type="text" name="search" placeholder="Search..." value="{{ request()->query('search') }}">
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="mb-2">
            <a href="{{ route('orders.create') }}">Create New Order</a>
        </div>
        <table>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Status</th>
                <th>Items</th> 
                <th>Actions</th>
            </tr>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->product_name }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ optional($order->status)->name }}</td>
                    <td>
                        @foreach($order->items as $item)
                            {{ $item->name }}
                            @if(!$loop->last), @endif
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('orders.edit', ['order' => $order->id]) }}">Edit</a>
                        <form action="{{ route('orders.destroy', ['order' => $order->id]) }}" method="POST" style="display:inline;">
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
