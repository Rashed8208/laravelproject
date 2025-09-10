<form action="{{route('customer.update',$customer->id)}}" method="post">
    @csrf
    @method('PATCH')
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name", value="{{$customer->name}}">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email", value="{{$customer->email}}">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="text" name="password" id="password", value="{{$customer->password}}">
    </div>
    <div>
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone", value="{{$customer->phone}}">
    </div>
    <div>
        <label for="address">Address</label>
        <input type="text" name="address" id="address", value="{{$customer->address}}">
    </div>
    <div>
        <label for="city">City</label>
        <input type="text" name="city" id="city", value="{{$customer->city}}">
    </div>
    <div>
        <label for="district">District</label>
        <input type="text" name="district" id="district", value="{{$customer->district}}">
    </div>
    <div>
        <label for="post_code">Post_code</label>
        <input type="text" name="post_code" id="post_code", value="{{$customer->post_code}}">
    </div>
    <div>
        <button type="submit">Update</button>
      </div>
</form>