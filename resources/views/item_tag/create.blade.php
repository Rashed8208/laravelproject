
<form action="{{route('item_tag.store')}}" method="post"> 
@csrf
    <div> 
        <label for="item_id">Item_id</label>
        <input type="text" name="item_id" id="item_id">
    </div>
    <div> 
        <label for="tag_id">Tag_id</label>
        <input type="text" name="tag_id" id="tag_id">
    </div>
      <div>
        <button type="submit">Save</button>
      </div>

</from>