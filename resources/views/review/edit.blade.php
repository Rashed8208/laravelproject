@extends('layouts.backend')
@section('page_title',"Review Add")

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Review</h2>

    <form action="{{ route('review.update', $review->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label class="form-label">Customer ID</label>
            <input type="number" name="customer_id" value="{{ old('customer_id', $review->customer_id) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Item ID</label>
            <input type="number" name="item_id" value="{{ old('item_id', $review->item_id) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Rating (1–5)</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" value="{{ old('rating', $review->rating) }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Comment</label>
            <textarea name="comment" class="form-control">{{ old('comment', $review->comment) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('review.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
