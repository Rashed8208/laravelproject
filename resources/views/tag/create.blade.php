
<form action="{{route('tag.store')}}" method="post"> 
@csrf
    <div> 
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>
      <div>
        <button type="submit">Save</button>
      </div>

</from>