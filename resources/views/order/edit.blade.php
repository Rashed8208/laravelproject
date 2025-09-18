@extends('layouts.backend')
@section('page_title',"Order Add")
@section('content')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Order</h2>

    <form action="{{ route('order.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Customer ID</label>
            <input type="number" name="customer_id" value="{{ old('customer_id', $order->customer_id) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" value="{{ old('status', $order->status) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Payment Method</label>
            <input type="text" name="payment_method" value="{{ old('payment_method', $order->payment_method) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">VAT</label>
            <input type="number" step="0.01" name="vat" value="{{ old('vat', $order->vat) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Discount</label>
            <input type="number" step="0.01" name="discount" value="{{ old('discount', $order->discount) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Shipping Charge</label>
            <input type="number" step="0.01" name="shipping_charge" value="{{ old('shipping_charge', $order->shipping_charge) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Total</label>
            <input type="number" step="0.01" name="total" value="{{ old('total', $order->total) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('order.index') }}" class="btn btn-secondary btn-danger">Cancel</a>
    </form>
</div>
@endsection
