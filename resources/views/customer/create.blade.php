<form action="{{route('customer.store')}}" method="post">
    @csrf
    <div>
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" name="email" id="email">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="text" name="password" id="password">
    </div>
    <div>
        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone">
    </div>
    <div>
        <label for="address">Address</label>
        <input type="text" name="address" id="address">
    </div>
    <div>
        <label for="city">City</label>
        <input type="text" name="city" id="city">
    </div>
    <div>
        <label for="district">District</label>
        <input type="text" name="district" id="district">
    </div>
    <div>
        <label for="post_code">Post_code</label>
        <input type="text" name="post_code" id="post_code">
    </div>
    <div>
        <button type="submit">Save</button>
      </div>
</form>