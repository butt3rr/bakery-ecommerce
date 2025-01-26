<!DOCTYPE html>
<html>
  <head> 
   @include('admin.css')

   <style type="text/css">

    
    table {
      border: 2px solid skyblue;
      text-align: center;
    }

    th {
      background-color: skyblue;
       padding: 10px;
       font-size: 18px;
       font-weight: bold;
       text-align: center;
       color: black;
       border: 1px solid black;
    }

    td {
      color: white;
      padding: 10px;
      border: 1px solid skyblue;
    }


    .div_design {
      display: flex;
      justify-content: center;
      align-items: center;
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

          <h3>All Orders</h3>
          <br>

          <div class="div_design">
          <table>
            <tr>
              <th>Customer Name</th>
              <th>Address</th>
              <th>Phone Number</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Image</th>
              <th>Payment Method</th>
              <th>Status</th>
              <th>Change Status</th>
              <th>Print</th>

            </tr>

            @foreach($data as $data)

            <tr>
              <td>{{$data->name}}</td>
              <td>{{$data->rec_address}}</td>
              <td>{{$data->phone}}</td>
              <td>{{$data->product->title}}</td>
              <td>{{$data->product->price}}</td>
              <td>
                <img src="products/{{$data->product->image}}" width="150" alt="">
              </td>
              <td>{{$data->payment_status}}</td>
              <td>{{$data->status}}</td>
              <td>
                <a href="{{url('shipped', $data->id)}}" class="btn btn-primary ">Shipped</a>

                <a href="{{url('delivered', $data->id)}}" class="btn btn-success ">Delivered</a>
              </td>

              <td ><a class="btn btn-secondary"href="{{url('print_pdf', $data->id)}}">Print PDF</a></td>
            </tr>

            @endforeach
          </table>

          
</div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
  </body>
</html>