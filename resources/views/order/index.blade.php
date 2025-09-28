@extends('layouts.backend')

@section('page_title', 'Orders')
@section('content')

<div class="container mt-4">
    <h2>Orders</h2>
    <a href="{{ route('order.create') }}" class="btn btn-primary mb-3 float-right">Add Order</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Coupon ID</th>
                <th>Customer ID</th>
                <th>Status</th>
                <th>Discount Amount</th>
                <th>Total Price</th>
                <th>Final Price</th>
                <th>District</th>
                <th>Division</th>
                <th>Notes</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $i=>$d)
                <tr>
                    <td>{{ $d->id }}</td>
                    <td>{{ $d->coupon_id }}</td>
                    <td>{{ $d->customer_id }}</td>
                    <td>{{ $d->status }}</td>
                    <td>{{ $d->discount_amount }}</td>
                    <td>{{ $d->total_price }}</td>
                    <td>{{ $d->final_price }}</td>
                    <td>{{ $d->district_id }}</td>
                    <td>{{ $d->division_id }}</td>
                    <td>{{ $d->notes }}</td>
                    <td>{{ $d->address }}</td>
                    <td>
                        <a href="{{ route('order.edit', $d->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('order.destroy', $d->id) }}" method="POST" style="display:inline-block;">
                            @csrf 
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this order?');">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="12" class="text-center">No orders found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
