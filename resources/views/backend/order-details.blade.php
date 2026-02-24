@extends('backend.layout')

@section('title')
Order Details
@endsection

@section('breadcrumb')
@include('backend.breadcrumb', ['text' => 'Order Details'])
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Invoice: {{ $order->order_number }}</h4>
                <a href="{{ route('admin.orders') }}" class="btn btn-sm btn-light">Back to Orders</a>
            </div>
            
            <div class="card-body">
                <div class="row mb-4">
                    <div class="col-sm-6">
                        <h6 class="text-uppercase text-muted mb-3">Customer Details</h6>
                        <p class="mb-1"><strong>Name:</strong> {{ $order->customer_name }}</p>
                        <p class="mb-1"><strong>Email:</strong> {{ $order->customer_email ?? 'N/A' }}</p>
                        <p class="mb-1"><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                    </div>
                    
                    <div class="col-sm-6 text-sm-end">
                        <h6 class="text-uppercase text-muted mb-3">Order Info</h6>
                        <p class="mb-1"><strong>Order Date:</strong> {{ $order->created_at->format('d M, Y h:i A') }}</p>
                        <p class="mb-1"><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                        <p class="mb-1"><strong>Payment Status:</strong> 
                            <span class="badge bg-{{ $order->payment_status == 'Paid' ? 'success' : 'warning' }}">{{ $order->payment_status }}</span>
                        </p>
                        <p class="mb-1"><strong>Order Status:</strong> 
                            <span class="badge bg-info">{{ $order->order_status }}</span>
                        </p>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-12">
                        <h6 class="text-uppercase text-muted mb-3">Shipping Address</h6>
                        <p class="mb-1">{{ $order->shipping_address }}</p>
                        <p class="mb-1"><strong>City:</strong> {{ $order->city }}</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($order->items as $item)
                            <tr>
                                <td>
                                    <strong>{{ $item->product_name }}</strong>
                                
                                    @if($item->variation)
                                        <br><small class="text-muted">{{ $item->variation }}</small>
                                    @endif
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>Rs. {{ number_format($item->price, 2) }}</td>
                                <td>Rs. {{ number_format($item->quantity * $item->price, 2) }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted">
                                    <em>No items found for this order.</em>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-end">Subtotal:</th>
                                <th>Rs. {{ number_format($order->total_amount, 2) }}</th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-end">Shipping Fee:</th>
                                <th>Rs. {{ number_format($order->shipping_fee, 2) }}</th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-end text-success">Discount:</th>
                                <th class="text-success">- Rs. {{ number_format($order->discount_amount, 2) }}</th>
                            </tr>
                            <tr>
                                <th colspan="3" class="text-end fs-5">Grand Total:</th>
                                <th class="fs-5">Rs. {{ number_format($order->total_amount + $order->shipping_fee - $order->discount_amount, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection