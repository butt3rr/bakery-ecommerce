<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<center>
  <h3>Customer name: {{$data->name}}</h3>
  <h3>Address: {{$data->rec_address}}</h3>
  <h3>Phone Number: {{$data->phone}}</h3>
  <h2>Product Name: {{$data->product->title}}</h2>
  <h2>Price: RM{{$data->product->price}}</h2>
  <img src="products/{{$data->product->image}}" width="150" alt="">
</center>






  
</body>
</html>