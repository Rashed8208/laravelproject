@extends('layouts.backend')
@section('page_title',"Category Add")
@section('content')  

@section('content')
<div class="container">
    <h2 class="mb-4">Edit Item</h2>

    <form action="{{ route('category.update', $category->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Type</label>
            <input type="text" name="type" value="{{ old('type', $category->type) }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('category.index') }}" class="btn btn-secondary btn-danger">Cancel</a>
    </form>
</div>
@endsection
