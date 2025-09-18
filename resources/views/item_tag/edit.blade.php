@extends('layouts.backend')
@section('page_title',"Item Add")
@section('content')
 
<div class="container">
    <h2 class="mb-4">Edit Item Tag</h2>

    <form action="{{ route('item_tag.update', $item_tag->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label class="form-label">Item ID</label>
            <input type="number" name="item_id" value="{{ old('item_id', $item_tag->item_id) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Tag ID</label>
            <input type="number" name="tag_id" value="{{ old('tag_id', $item_tag->tag_id) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('item_tag.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
