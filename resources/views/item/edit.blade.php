@extends('layouts.backend')
@section('page_title',"Item Add")
@section('content')
<div class="container">
    <h2 class="mb-4">Edit Item</h2>

    <form action="{{ route('item.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Category Type</label>
            <select name="category_id" class="form-control">
                  <option value="">Select Category</option>
                  @forelse ($category as $c)
                      <option value="{{$c->id}}" @if($c->id==$item->category_type) selected @endif>{{$c->name}}</option>
                  @empty

                  @endforelse
                </select>
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
         <div class="form-group">
                    <label>Image</label><br>
                    @if($item->image)
                        <img src="{{ asset('uploads/'.$item->image) }}" width="80" height="80" alt="Image"><br><br>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('item.index') }}" class="btn btn-secondary btn-danger">Cancel</a>
    </form>
</div>
@endsection
