@extends('layouts.backend')
@section('page_title',"Review Add")

@section('content')
<div class="container">
    <h2 class="mb-4">Add Review</h2>

    <form action="{{ route('review.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Customer ID</label>
            <input type="number" name="customer_id" class="form-control" value="{{ old('customer_id') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Item ID</label>
            <input type="number" name="item_id" class="form-control" value="{{ old('item_id') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Rating (1–5)</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" value="{{ old('rating') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Comment</label>
            <textarea name="comment" class="form-control">{{ old('comment') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('review.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
