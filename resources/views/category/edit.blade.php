  
  <form action="{{route('category.update',$category->id)}}" method="post">
@csrf
@method('PATCH')
    <div> 
        <label for="name">Name</label>
        <input type="text" name="name" id="name", value="{{$category->name}}">
    </div>
     <div> 
        <label for="type">Type</label>
        <input type="text" name="type" id="type", value="{{$category->type}}">
    </div>
      <div>
        <button type="submit">Update</button>
      </div>

</from>