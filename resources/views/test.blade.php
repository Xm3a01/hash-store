<form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
@csrf
<input type="text" name="name">
<input type="text" name="description">
<input type="text" name="price">
<input type="text" name="category_id">
<input type="file" name="image">
<button type="submit">Ok</button>
</form>
<img src="{{$product->image ?? ""}}" alt="">