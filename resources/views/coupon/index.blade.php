@extends('layouts.backend')
@section('page_title',"Coupon Add")
@section('content')


<div class="container">
    <h2>Coupons</h2>
    <a href="{{ route('coupon.create') }}" class="btn btn-primary mb-3 float-right" >Add Coupon</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Discount Type</th>
                <th>Discount Value</th>
                <th>Usage Limit</th>
                <th>Used Count</th>
                <th>Min Order</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th width="180px">Action</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach ($data as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->code }}</td>
                <td>
                    {{ $d->discount_type == 1 ? 'Percentage' : 'Fixed Amount' }}
                </td>
                <td>{{ $d->discount_value }}</td>
                <td>{{ $d->usage_limit }}</td>
                <td>{{ $d->used_count }}</td>
                <td>{{ $d->min_order_amount }}</td>
                <td>{{ $d->start_date }}</td>
                <td>{{ $d->end_date }}</td>
                <td>
                    @if($d->is_active == 1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-danger">Inactive</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('coupon.edit', $d->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('coupon.destroy', $d->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    
</div>
@endsection
