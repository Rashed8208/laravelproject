
@extends('layouts.backent')
@section('page_title',"Order Item Add")
@section('content')
<div class="container">
    <h2 class="mb-4">Add Order Item</h2>

    <form action="{{ route('order_item.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Order ID</label>
            <input type="number" name="order_id" value="{{ old('order_id') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Item ID</label>
            <input type="number" name="item_id" value="{{ old('item_id') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" value="{{ old('quantity') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" value="{{ old('price') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('order_item.index') }}" class="btn btn-secondary">Delete</a>
    </form>
</div>
@endsection
