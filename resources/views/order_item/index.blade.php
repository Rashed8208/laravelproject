
@extends('layouts.backend')
@section('page_title',"Order Item Add")
@section('content')
<div class="container">
    <h2 class="mb-4">Order Items</h2>

    <a href="{{ route('order_item.create') }}" class="btn btn-success mb-3 float-right">+ Add Order Item</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Order ID</th>
                <th>Item ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $i=>$d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->order_id }}</td>
                    <td>{{ $d->item_id }}</td>
                    <td>{{ $d->quantity }}</td>
                    <td>{{ $d->price }}</td>
                    <td>
                        <a href="{{ route('order_item.edit', $d->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('order_item.destroy', $d->id) }}" method="POST" style="display:inline;">
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
                    <td colspan="7" class="text-center">No order items found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
