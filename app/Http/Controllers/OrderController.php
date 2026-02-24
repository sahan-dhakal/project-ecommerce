<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('backend.orders', compact('orders'));
    }
    public function show($id)
    {
        // Find the specific order by its ID, or fail and show a 404 page if it doesn't exist
        $order = Order::findOrFail($id);
        
        return view('backend.order-details', compact('order'));
    }
}
