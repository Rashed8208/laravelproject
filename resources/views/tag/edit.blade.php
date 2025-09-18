@extends('layouts.backend')
@section('page_title',"Tag Add")
@section('content')
<div class="container">
    <h2 class="mb-4">Edit Tag</h2>

    <form action="{{ route('tag.update', $tag->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label class="form-label">Tag Name</label>
            <input type="text" name="name" value="{{ old('name', $tag->name) }}" class="form-control" placeholder="Enter tag name">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('tag.index') }}" class="btn btn-secondary">Delete</a>
    </form>
</div>
@endsection
