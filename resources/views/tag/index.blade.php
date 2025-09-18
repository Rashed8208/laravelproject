@extends('layouts.backend')
@section('page_title',"Tag Add")
@section('content')
<div class="container">
    <h2 class="mb-4">Tags</h2>

    <a href="{{ route('tag.create') }}" class="btn btn-success mb-3 float-right">+ Add Tag</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $i=>$d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->name }}</td>
                    <td>
                        <a href="{{ route('tag.edit', $d->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('tag.destroy', $d->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No tags found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
