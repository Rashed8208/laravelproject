@extends('layouts.backend')
@section('page_title',"Notification Add")

@section('content')

<div class="container">
    <h2 class="mb-4">Notifications</h2>

    <a href="{{ route('notification.create') }}" class="btn btn-success mb-3 float-right">+ Create Notification</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Order ID</th>
                <th>Message</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $i=>$d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->customer_id }}</td>
                    <td>{{ $d->order_id }}</td>
                    <td>{{ $d->message }}</td>
                    <td>
                        @if($d->status == 'unread')
                            <span class="badge bg-warning text-dark">Unread</span>
                        @elseif($d->status == 'read')
                            <span class="badge bg-success">Read</span>
                        @else
                            <span class="badge bg-secondary">N/A</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('notification.edit', $d->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('notification.destroy', $d->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">No notifications found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
