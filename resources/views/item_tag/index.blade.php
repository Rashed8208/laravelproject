  @extends('layouts.backend')
@section('page_title',"Item Tag")
@section('content')
  
<div class="container">
    <h2 class="mb-4">Item Tags</h2>

    <a href="{{ route('item_tag.create') }}" class="btn btn-success mb-3 float-right"> Add Item Tag</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item ID</th>
                <th>Tag ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $i=>$d)
                <tr>
                     <td scope="row">{{++$i}}</td>
                    <td>{{ $d->item_id }}</td>
                    <td>{{ $d->tag_id }}</td>
                    
                    <td>
                        <a href="{{ route('item_tag.edit', $d->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('item_tag.destroy', $d->id) }}" method="POST" style="display:inline;">
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
                    <td colspan="5" class="text-center">No item tags found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
