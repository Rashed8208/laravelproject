<a href="{{route('category.create')}}"> Add New </a>
<table border="1" height=30' width='300'>
 <tr>
        <th>Name</th>
         <th>Type</th>
        <th>Action</th>
    </tr>
    @forelse ($data as $d)
    <tr>
        <td>{{$d->name}}</td>
        <td>{{$d->type}}</td>
        <td>
             <a href="{{route('category.edit',$d->id)}}">Update </a>
        <form method="post" action="{{route('category.destroy',$d->id)}}">
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