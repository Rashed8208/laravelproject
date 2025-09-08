  
  <form action="{{route('tag.update',$tag->id)}}" method="post">
@csrf
@method('PATCH')
    <div> 
        <label for="name">Name</label>
        <input type="text" name="name" id="name", value="{{$tag->name}}">
    </div>
        
      <div>
        <button type="submit">Update</button>
      </div>

</from>