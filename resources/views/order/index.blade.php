@extends('layouts.backend')
@section('page_title',"Order Add")
@section('content')

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">
                Order
                <a class="btn btn-primary float-right" href="{{route('order.create')}}"> Add New </a>
            </h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">

                        <tr>
                            <th scope="col">#SL</th>
                            <th scope="col">Customer Id</th>
                            <th scope="col">Status</th>
                            <th scope="col">Payment Method</th>
                            <th scope="col">Vat</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Shipping Charge</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                            @forelse ($data as $i=>$d)
                            <tr>
                            <td scope="row">{{++$i}}</td>
                            <td>{{$d->customer_id}}</td>
                            <td>{{$d->status}}</td>
                            <td>{{$d->payment_method}}</td>
                            <td>{{$d->vat}}</td>
                            <td>{{$d->discount}}</td>
                            <td>{{$d->shipping_charge}}</td>
                            <td>{{$d->total}}</td>
                            <td>
            <a href="{{route('order.edit',$d->id)}}">Update </a>
        <form method="post" action="{{route('order.destroy',$d->id)}}">
                  @csrf
                  @method('delete')
                  <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
             </form>
        </td>
         @empty
         <tr>
            <td>No Data Found</td>
         </tr>
    </tr>
    

@endforelse
</tbody>
</table>
@endsection