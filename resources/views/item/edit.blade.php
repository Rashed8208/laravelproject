  
  <form action="{{route('item.update',$item->id)}}" method="post">
@csrf
@method('PATCH')
    <div> 
        <label for="category_id">Category_id</label>
        <input type="text" name="category_id" id="category_id", value="{{$item->category_id}}">
    </div>
     <div> 
        <label for="name">Name</label>
        <input type="text" name="name" id="name", value="{{$item->name}}">
    </div>
     <div> 
        <label for="description">Description</label>
        <input type="text" name="description" id="description", value="{{$item->description}}">
    </div>
     <div> 
        <label for="price">Price</label>
        <input type="integer" name="price" id="price", value="{{$item->price}}">
    </div>
    <div> 
        <label for="stock_qty">Stock_qty</label>
        <input type="integer" name="stock_qty" id="stock_qty", value="{{$item->stock_qty}}">
    </div>
        
      <div>
        <button type="submit">Update</button>
      </div>

</from>