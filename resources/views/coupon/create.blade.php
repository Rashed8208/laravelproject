

@extends('layouts.backend')
@section('page_title',"Coupon Add")
@section('content')


<div class="container">
    <h2>Add Coupon</h2>

    <form action="{{ route('coupon.store') }}" method="POST">
        @csrf
        <div class="form-group mb-3">
            <label>Code</label>
            <input type="text" name="code" class="form-control" value="{{ old('code') }}">
            @error('code') <small class="text-danger">{{ $message }}</small>@enderror
        </div>

        <div class="form-group mb-3">
            <label>Discount Type</label>
            <select name="discount_type" class="form-control">
                <option value="1">Percentage</option>
                <option value="2">Fixed Amount</option>
            </select>
        </div>

        <div class="form-group mb-3">
            <label>Discount Value</label>
            <input type="number" step="0.01" name="discount_value" class="form-control" value="{{ old('discount_value') }}">
        </div>

        <div class="form-group mb-3">
            <label>Usage Limit</label>
            <input type="number" name="usage_limit" class="form-control" value="{{ old('usage_limit') }}">
        </div>

        <div class="form-group mb-3">
            <label>Used Count</label>
            <input type="number" name="used_count" class="form-control" value="{{ old('used_count') }}">
        </div>

        <div class="form-group mb-3">
            <label>Minimum Order Amount</label>
            <input type="number" step="0.01" name="min_order_amount" class="form-control" value="{{ old('min_order_amount') }}">
        </div>

        <div class="form-group mb-3">
            <label>Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ old('start_date') }}">
        </div>

        <div class="form-group mb-3">
            <label>End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ old('end_date') }}">
        </div>

        <div class="form-group mb-3">
            <label>Status</label>
            <select name="is_active" class="form-control">
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('coupon.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
