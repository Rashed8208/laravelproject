@extends('layouts.backend')
@section('page_title',"Item Add")
@section('content')

<div class="container">
    <h2 class="mb-4">Add Item</h2>

    <form action="{{ route('item.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Category ID</label>
            <input type="text" name="category_id" value="{{ old('category_id') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="number" name="price" value="{{ old('price') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Stock Qty</label>
            <input type="number" name="stock_qty" value="{{ old('stock_qty') }}" class="form-control">
        </div>
         <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" value="{{ old('image') }}" class="form-control">
                </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('item.index') }}" class="btn btn-secondary btn-danger">Delete</a>
    </form>
</div>
@endsection
