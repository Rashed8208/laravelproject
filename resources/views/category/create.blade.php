@extends('layouts.backend')
@section('page_title',"Category Add")
@section('content')

<div class="container">
    <h2 class="mb-4">Add Category</h2>

    <form action="{{ route('category.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" class="form-control" value="{{ old('type') }}">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('category.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
