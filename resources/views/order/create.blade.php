@extends('layouts.backend')
@section('page_title',"Order Add")
@section('content')

@section('content')
<div class="container">
    <h2 class="mb-4">Create Order</h2>

    <form action="{{ route('order.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Customer ID</label>
            <input type="number" name="customer_id" class="form-control" value="{{ old('customer_id') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" value="{{ old('status') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Payment Method</label>
            <input type="text" name="payment_method" class="form-control" value="{{ old('payment_method') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">VAT</label>
            <input type="number" step="0.01" name="vat" class="form-control" value="{{ old('vat') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Discount</label>
            <input type="number" step="0.01" name="discount" class="form-control" value="{{ old('discount') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Shipping Charge</label>
            <input type="number" step="0.01" name="shipping_charge" class="form-control" value="{{ old('shipping_charge') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Total</label>
            <input type="number" step="0.01" name="total" class="form-control" value="{{ old('total') }}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('order.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
