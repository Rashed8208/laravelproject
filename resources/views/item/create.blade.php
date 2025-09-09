
<form action="{{route('item.store')}}" method="post"> 
@csrf
    <div> 
        <label for="category_id">Category_id</label>
        <input type="text" name="category_id" id="category_id">
    </div>
     <div> 
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
    </div>
     <div> 
        <label for="description">Description</label>
        <input type="text" name="description" id="description">
    </div>
     <div> 
        <label for="price">Price</label>
        <input type="integer" name="price" id="price">
    </div>
    <div> 
        <label for="stock_qty">Stock_qty</label>
        <input type="integer" name="stock_qty" id="stock_qty">
    </div>
      <div>
        <button type="submit">Save</button>
      </div>

</from>