

@extends('layouts.backend')
@section('page_title',"Review Add")
@section('content')
<div class="container">
    <h2 class="mb-4">Reviews</h2>

    <a href="{{ route('review.create') }}" class="btn btn-success mb-3 float-right">+ Add Review</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Item ID</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $i=>$d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->customer_id }}</td>
                    <td>{{ $d->item_id }}</td>
                    <td>
                        <span class="badge bg-info">{{$d->rating }}</span>
                    </td>
                    <td>{{$d->comment}}</td>
                    <td>
                        <a href="{{ route('review.edit', $d->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('review.destroy',$d->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No reviews found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
