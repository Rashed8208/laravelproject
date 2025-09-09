
<form action="{{route('category.store')}}" method="post"> 
@csrf
    <div> 
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>
    <div> 
        <label for="type">Type</label>
        <input type="text" name="type" id="type">
    </div>
      <div>
        <button type="submit">Save</button>
      </div>

</from>