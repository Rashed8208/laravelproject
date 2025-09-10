<a href="{{route('customer.create')}}">Add New</a>
<table border="1" height='40' width='300'>

<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Password</th>
    <th>Phone</th>
    <th>Address</th>
    <th>City</th>
    <th>District</th>
    <th>Post_code</th>
    <th>Action</th>
    </tr>
    <tr>
        @forelse ($data as $d)
        <td>{{$d->name}}</td>
        <td>{{$d->email}}</td>
        <td>{{$d->password}}</td>
        <td>{{$d->phone}}</td>
        <td>{{$d->address}}</td>
        <td>{{$d->city}}</td>
        <td>{{$d->district}}</td>
        <td>{{$d->post_code}}</td>
        <td>
            <a href="{{route('customer.edit',$d->id)}}">Update </a>
        <form method="post" action="{{route('customer.destroy',$d->id)}}">
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