@extends('layouts.backend')
@section('page_title',"Coupon Add")
@section('content')
<div class="container">
    <h2>Edit Coupon</h2>

    <form action="{{ route('coupons.update', $coupon->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group mb-3">
            <label>Code</label>
            <input type="text" name="code" class="form-control" value="{{ old('code', $coupon->code) }}">
        </div>

        <div class="form-group mb-3">
            <label>Discount Type</label>
            <select name="discount_type" class="form-control">
                <option value="1" {{ $coupon->discount_type == 1 ? 'selected' : '' }}>Percentage</option>
                <option value="2" {{ $coupon->discount_type == 2 ? 'selected' : '' }}>Fixed Amount</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Discount Value</label>
            <input type="number" step="0.01" name="discount_value" class="form-control" value="{{ old('discount_value', $coupon->discount_value) }}">
        </div>

        <div class="form-group mb-3">
            <label>Usage Limit</label>
            <input type="number" name="usage_limit" class="form-control" value="{{ old('usage_limit', $coupon->usage_limit) }}">
        </div>

        <div class="form-group mb-3">
            <label>Used Count</label>
            <input type="number" name="used_count" class="form-control" value="{{ old('used_count', $coupon->used_count) }}">
        </div>

        <div class="form-group mb-3">
            <label>Minimum Order Amount</label>
            <input type="number" step="0.01" name="min_order_amount" class="form-control" value="{{ old('min_order_amount', $coupon->min_order_amount) }}">
        </div>

        <div class="form-group mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date', $coupon->start_date) }}">
        </div>

        <div class="form-group mb-3">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date', $coupon->end_date) }}">
        </div>

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="is_active" class="form-control">
                <option value="1" {{ $coupon->is_active == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $coupon->is_active == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('coupons.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
