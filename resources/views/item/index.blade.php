@extends('layouts.backend')
@section('page_title',"Item Add")
@section('content')

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">
                Item
                <a class="btn btn-primary float-right" href="{{route('item.create')}}"> Add New </a>
            </h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">

                        <tr>
                            <th scope="col">#SL</th>
                            <th scope="col">Category_id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock_qty</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                     </thead>  
                      <tbody> 
                            @forelse ($data as $i=>$d)
                            <tr>
                                <td scope="row">{{++$i}}</td>
                                <td>{{$d->category_id}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->description}}</td>
                                <td>{{$d->price}}</td>
                                <td>{{$d->stock_qty}}</td>
                                <td>
                                    @if($d->image)
                                        <img src="{{ asset('uploads/'.$d->image) }}" width="60" height="60" alt="Image">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                    <td>
                                <a href="{{ route('item.edit', $d->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('item.destroy', $d->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                               </td>
                            </tr>
                            @empty
                                <tr>
                                    <td>No Data Found</td>
                                </tr>
                            @endforelse
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Progress Table end -->
    @endsection