<a href="{{route('item.create')}}"> Add New </a>
<table border="1" height=30' width='300'>
    <tr>
        <th>Category_id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Stock_qty</th>
        <th>Action</th>
    </tr>
    @forelse ($data as $d)
    <tr>
        <td>{{$d->category_id}}</td>
        <td>{{$d->name}}</td>
        <td>{{$d->description}}</td>
        <td>{{$d->price}}</td>
        <td>{{$d->stock_qty}}</td>
        <td>
             <a href="{{route('item.edit',$d->id)}}">Update </a>
        <form method="post" action="{{route('item.destroy',$d->id)}}">
                  @csrf
                  @method('delete')
                  <button type="submit">Delete</button>
             </form>

        </td>
        @empty
        <tr>
            <td>No Data Found</td>
        </tr>
    </tr>
    @endforelse
</table>