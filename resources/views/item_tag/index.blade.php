<a href="{{route('item_tag.create')}}"> Add New </a>
<table border="1" height=30' width='300'>
 <tr>
        <th>Item_id</th>
         <th>Tag_id</th>
        <th>Action</th>
    </tr>
    @forelse ($data as $d)
    <tr>
        <td>{{$d->item_id}}</td>
        <td>{{$d->tag_id}}</td>
        <td>
             <a href="{{route('item_tag.edit',$d->id)}}">Update </a>
        <form method="post" action="{{route('item_tag.destroy',$d->id)}}">
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