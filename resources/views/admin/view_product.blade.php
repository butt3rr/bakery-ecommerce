<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style>
    .div_design {
      display: flex;
      justify-content: center;
      align-items: center;
      margin_top: 60px;
    }

    .table_design {
      border: 2px solid greenyellow;
    }

    th {
      background-color: skyblue;
      color: white;
      font-size: 18px;
      font-weight: bold;
      padding: 15px;
    }

    td {
      border: 1px solid skyblue;
      text-align: center;
      color: white;
    }

    input[type='search']
    {
      width: 500px;
      height: 60px;
      margin-left: 50px;
      margin-bottom: 50px;
    }
   </style>
  </head>
  <body>
   @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <form action="{{url('search_product')}}" method="get">
            @csrf
            <input type="search" name="search">
            <input type="submit" value="Search" class="btn btn-secondary">
          </form>

          <div class="div_design">
            <table class="table_design">
              <tr>
                <th>Product Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>

              @foreach($product as $products)
              <tr>
                <!-- name same with db table) -->
                <td>{{$products->title}}</td>
                <td>{!!Str::words($products->description, 7)!!}</td>
                <td>{{$products->category}}</td>
                <td>{{$products->price}}</td>
                <td>{{$products->quantity}}</td>
                <td>
                  <img height="100" width="100" src="products/{{$products->image}}" alt="">
                </td>
                <td>
                  <a class="btn btn-success" href="{{url('update_product', $products->slug)}}">Edit</a>
                </td>
                <td>
                <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product', $products->id)}}">Delete</a>
                </td>
              
              </tr>

              @endforeach
            </table>

            
          </div>

          <div class="div_design">
          {{$product->OnEachSide(1)->links()}}
          </div>
          
</div>
      </div>
    </div>
    <!-- JavaScript files-->

    @include('admin.js')

    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>