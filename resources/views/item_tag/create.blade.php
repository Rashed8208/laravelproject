@extends('layouts.backend')
@section('page_title',"Item Add")
@section('content')
<div class="container">
    <h2 class="mb-4">Add Item Tag</h2>

    <form action="{{ route('item_tag.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Item ID</label>
            <input type="number" name="item_id" value="{{ old('item_id') }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Tag ID</label>
            <input type="number" name="tag_id" value="{{ old('tag_id') }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('item_tag.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
