@extends('layouts.backend')
@section('page_title',"Tag Add")
@section('content')
<div class="container">
    <h2 class="mb-4">Add Tag</h2>

    <form action="{{ route('tag.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Tag Name</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter tag name">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('tag.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
