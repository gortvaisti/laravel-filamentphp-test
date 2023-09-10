<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Status;
use App\Models\Item;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $searchQuery = $request->query('search');
        $orders = Order::with('status')
                        ->when($searchQuery, function ($query, $searchQuery) {
                            return $query->where('product_name', 'LIKE', '%' . $searchQuery . '%');
                        })
                        ->get();
    
        return view('orders.index', compact('orders'));
    }
    
    

    public function create()
    {
        $activeStatuses = Status::where('is_active', true)->get();
        $items = Item::all();
        return view('orders.create', compact('activeStatuses', 'items'));
    }    
    
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required|numeric',
            'status_id' => 'required|exists:statuses,id',
            'items' => 'required|array',
            'items.*' => 'exists:items,id',
        ]);
    
        $order = Order::create($request->all());
        $order->items()->sync($request->items);
    
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');
    }

    public function edit(Order $order)
    {
        $activeStatuses = Status::where('is_active', true)->get();
        $items = Item::all();
        return view('orders.edit', compact('order', 'activeStatuses', 'items'));
    }
    
    
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'product_name' => 'required',
            'quantity' => 'required|numeric',
            'status_id' => 'required|exists:statuses,id',
            'items' => 'required|array',
            'items.*' => 'exists:items,id',
        ]);
    
        $order->update($request->all());
        $order->items()->sync($request->items);
    
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}

