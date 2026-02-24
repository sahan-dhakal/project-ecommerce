@extends('backend.layout')

@section('title')
Orders
@endsection

@section('breadcrumb')
@include('backend.breadcrumb', ['text' => 'Orders'])
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Order Management</h4>
            </div>
            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Phone</th>
                                <th>Total Amount</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($orders as $order)
                            <tr>
                                <td><strong>{{ $order->order_number }}</strong></td>
                                <td>{{ $order->customer_name }}</td>
                                <td>{{ $order->customer_phone }}</td>
                                <td>Rs. {{ number_format($order->total_amount, 2) }}</td>
                                <td>
                                    <span class="badge bg-{{ $order->payment_status == 'Paid' ? 'success' : 'warning' }}">
                                        {{ $order->payment_status }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-info">
                                        {{ $order->order_status }}
                                    </span>
                                </td>
                                <td>{{ $order->created_at->format('d M, Y') }}</td>
                                <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-primary"><i class="ri-eye-line"></i> View</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">No orders found yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection