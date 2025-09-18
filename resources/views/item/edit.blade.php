@extends('layouts.backend')
@section('page_title',"Item Add")
@section('content')
<div class="container">
    <h2 class="mb-4">Edit Item</h2>

    <form action="{{ route('item.update', $item->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Category ID</label>
            <input type="text" name="category_id" value="{{ old('category_id', $item->category_id) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name', $item->name) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description', $item->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" value="{{ old('price', $item->price) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Stock Qty</label>
            <input type="number" name="stock_qty" value="{{ old('stock_qty', $item->stock_qty) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('item.index') }}" class="btn btn-secondary btn-danger">Cancel</a>
    </form>
</div>
@endsection
