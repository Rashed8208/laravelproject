@extends('layouts.backend')
@section('page_title',"Order Add")
@section('content')
<div class="container">
    <h2 class="mb-4">Edit Order Item</h2>

    <form action="{{ route('order_item.update', $order_item->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label class="form-label">Order ID</label>
            <input type="number" name="order_id" value="{{ old('order_id', $order_item->order_id) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Item ID</label>
            <input type="number" name="item_id" value="{{ old('item_id', $order_item->item_id) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Quantity</label>
            <input type="number" name="quantity" value="{{ old('quantity', $order_item->quantity) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" value="{{ old('price', $order_item->price) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('order_item.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
