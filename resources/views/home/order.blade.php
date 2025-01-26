<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Orders</title>
  @include('home.css')

  <style>

    .div_center {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 60px;

    }

    table {
      border: 2px solid black;
      text-align: center;
      width: 800px; 
    }

    th {
      border: 2px solid black;
      background-color: black;
      color: white;
      font-weight: bold;
      font-size: 19px;
      text-align: center;
      padding: 10px;
    }

    td {
      border: 2px solid black;
      padding: 10px;
      font-size: 18px;
    }
  </style>
</head>
<body>

<div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
</div>

<div class="div_center">
  <table>
    <tr>
      <th>Product Name</th>
      <th>Price</th>
      <th>Delivery Status</th>
      <th>Image</th>
    </tr>

    @foreach($order as $order)
    <tr>
      <td>{{$order->product->title}}</td>
      <td>RM{{$order->product->price}}</td>
      <td>{{$order->status}}</td>
      <td>
      <img height="200" width="200" src="products/{{$order->product->image}}"></td>
    </tr>

    @endforeach
  </table>
</div>

@include('home.footer')
</body>
</html>