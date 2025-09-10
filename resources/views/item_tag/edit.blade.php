  
  <form action="{{route('item_tag.update',$item_tag->id)}}" method="post">
@csrf
@method('PATCH')
    <div> 
        <label for="item_id">Item_id</label>
        <input type="text" name="item_id" id="item_id", value="{{$item_tag->item_id}}">
    </div>
     <div> 
        <label for="tag_id">Tag_id</label>
        <input type="text" name="tag_id" id="tag_id", value="{{$item_tag->tag_id}}">
    </div>
      <div>
        <button type="submit">Update</button>
      </div>

</from>