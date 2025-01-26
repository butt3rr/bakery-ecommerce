<!DOCTYPE html>
<html>

<head>
  @include('home.css')

  <style type="text/css">

    .div_design
    {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 60px;
    }

    table
    {
      border: 2px solid black;
      text-align: center;
      width: 800px;
    }

    th
    {
      border: 2px solid black;
      text-align: center;
      color: white;
      font: 20px;
      font-weight: bold;
background-color: black;
    }

    td
    {
      border: 1px solid skyblue;
    }

    .cart_value
    {
      text-align: center;
      margin-bottom: 40px;
      padding: 20px;
    }

    .order_design
    {
      margin-top: -50px;
      padding-right: 100px;
      display: flex;
      justify-content: center;
      align-items: center;
      padding-bottom: 10px;
    }

    label 
    {
      display: inline-block;
      width: 150px;

    }

    .div_gap
    {
      padding: : 20px;
      
    }

  </style>
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    @include('home.header')
    <!-- end header section -->
  
  </div>
  
  
  <div class="div_design">



  
  <table>

  <tr>
    <th>Product Title</th>
    <th>Price</th>
    <th>Image</th>
    <th>Remove</th>

  </tr>

  <?php 
  $value =0;
  ?>

  <tr>

  @foreach($cart as $cart)  <!--come from HomeController -->
    <td>{{$cart->product->title}}</td>
    <td>{{$cart->product->price}}</td>
    <td>
      <img width="150px" src="/products/{{$cart->product->image}}" alt="">
    </td>
    <td><a href="{{url('delete_cart', $cart->id)}}" class="btn btn-danger">Remove</a></td>
  </tr>

  <?php 
  $value += $cart->product->price;
  ?>

  @endforeach
</table>
  </div>
 
<div class="cart_value">
  <h3>Total: RM{{$value}}</h3>
</div>

<div class="order_design">
    <form action="{{url('confirm_order')}}" method="Post">

    @csrf
      <div class="div_gap">
        <label for="">Name</label>
        <input type="text" name="name" value="{{Auth::user()->name}}">
        </div>

        <div class="div_gap">
        <label for="">Address</label>
        <textarea name="address">{{Auth::user()->address}}</textarea>
        </div>
       
        <div class="div_gap"> 
        <label for="">Phone Number</label>
        <input type="text" name="phone" value="{{Auth::user()->phone}}">
        </div>
        
        <div class="div_gap">
        <input class="btn btn-primary" type="submit" value="Cash On Delivery">

        <a href="{{url('stripe', $value)}}" class="btn btn-success">Pay with Card</a>
        </div>
      
    </form>
  </div>




  
   

  <!-- info section -->

  @include('home.footer')

</body>

</html>