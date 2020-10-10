<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route('orders.store')}}" method="post">
    @csrf
 <input type="text" name="name">
 <input type="text" name="quantity">
 <input type="text" name="totalPrice">
 <input type="text" name="user_id">
 <button type="submit">Ok</button>
</form>
  
</body>
</html>