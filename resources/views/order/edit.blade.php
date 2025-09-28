@extends('layouts.backend')

@section('page_title', 'Edit Order')
@section('content')

<div class="container mt-4">
    <h2>Edit Order</h2>

    <form action="{{ route('order.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group mb-2">
            <label>Coupon ID</label>
            <input type="number" name="coupon_id" class="form-control" value="{{ $order->coupon_id }}">
        </div>

        <div class="form-group mb-2">
            <label>Customer ID</label>
            <input type="number" name="customer_id" class="form-control" value="{{ $order->customer_id }}" required>
        </div>

        <div class="form-group mb-2">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                <option value="shipped" {{ $order->status == 'shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="delivered" {{ $order->status == 'delivered' ? 'selected' : '' }}>Delivered</option>
                <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                <option value="returned" {{ $order->status == 'returned' ? 'selected' : '' }}>Returned</option>
            </select>
        </div>

        <div class="form-group mb-2">
            <label>Discount Amount</label>
            <input type="number" step="0.01" name="discount_amount" class="form-control" value="{{ $order->discount_amount }}">
        </div>

        <div class="form-group mb-2">
            <label>Total Price</label>
            <input type="number" step="0.01" name="total_price" class="form-control" value="{{ $order->total_price }}" required>
        </div>

        <div class="form-group mb-2">
            <label>Final Price</label>
            <input type="number" step="0.01" name="final_price" class="form-control" value="{{ $order->final_price }}" required>
        </div>

        <div class="form-group mb-2">
            <label>District ID</label>
            <input type="number" name="district_id" class="form-control" value="{{ $order->district_id }}">
        </div>

        <div class="form-group mb-2">
            <label>Division ID</label>
            <input type="number" name="division_id" class="form-control" value="{{ $order->division_id }}">
        </div>

        <div class="form-group mb-2">
            <label>Notes</label>
            <textarea name="notes" class="form-control">{{ $order->notes }}</textarea>
        </div>

        <div class="form-group mb-2">
            <label>Address</label>
            <textarea name="address" class="form-control" required>{{ $order->address }}</textarea>
        </div>

        <button type="submit" class="btn btn-success mt-2">Update</button>
        <a href="{{ route('order.index') }}" class="btn btn-secondary mt-2">Back</a>
    </form>
</div>
@endsection
