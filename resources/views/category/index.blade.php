@extends('layouts.backend')
@section('page_title',"Category Add")
@section('content')

<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <h4 class="header-title">
                Category
                <a class="btn btn-primary float-right" href="{{route('category.create')}}"> Add New </a>
            </h4>
            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">#SL</th>
                                <th scope="col">Type</th>
                                <th scope="col">Name</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $i=>$d)
                            <tr>
                                <th scope="row">{{++$i}}</th>
                                 <td>{{$d->type}}</td>
                                <td>{{$d->name}}</td>
                               
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <a href="{{ route('category.edit', $d->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            <form method="post" action="{{route('category.destroy',$d->id)}}">
                                                @csrf
                                                @method('delete')
                                             <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
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
