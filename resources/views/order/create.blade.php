@extends('layouts.backend')

@section('page_title', 'Create Order')
@section('content')

<div class="container mt-4">
    <h2>Create Order</h2>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <div class="form-group mb-2">
            <label>Coupon ID</label>
            <input type="number" name="coupon_id" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>Customer ID</label>
            <input type="number" name="customer_id" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Status</label>
            <select name="status" class="form-control">
                <option value="pending">Pending</option>
                <option value="confirmed">Confirmed</option>
                <option value="shipped">Shipped</option>
                <option value="delivered">Delivered</option>
                <option value="cancelled">Cancelled</option>
                <option value="returned">Returned</option>
            </select>
        </div>

        <div class="form-group mb-2">
            <label>Discount Amount</label>
            <input type="number" step="0.01" name="discount_amount" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>Total Price</label>
            <input type="number" step="0.01" name="total_price" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>Final Price</label>
            <input type="number" step="0.01" name="final_price" class="form-control" required>
        </div>

        <div class="form-group mb-2">
            <label>District ID</label>
            <input type="number" name="district_id" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>Division ID</label>
            <input type="number" name="division_id" class="form-control">
        </div>

        <div class="form-group mb-2">
            <label>Notes</label>
            <textarea name="notes" class="form-control"></textarea>
        </div>

        <div class="form-group mb-2">
            <label>Address</label>
            <textarea name="address" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-2">Save</button>
        <a href="{{ route('order.index') }}" class="btn btn-secondary mt-2">Back</a>
    </form>
</div>
@endsection
