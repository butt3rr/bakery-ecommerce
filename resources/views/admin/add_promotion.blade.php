<!DOCTYPE html>
<html>
  <head> 
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
   @include('admin.css')

   <style type="text/css">

.div_design {
  display: flex;
  justify-content: center;
  align-items: center;
  margin_top: 60px;
}

h1 {
  color: white;
}

label {
  display: inline-block;
  width: 200px;
  font-size: 18px!important;
  color: white!important;
}

input[type='text']
{
  width: 300px;
  height: 50px;
}
textarea {
  width: 450px;
  height: 80px;
}

.input_design {
  padding: 15px;
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

          <h1>Add Promotion</h1>
          <div class="div_design">
            <form action="{{url('upload_promotion')}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="input_design">
                <label for="">Promotion Name</label>
                <input type="text" name="promotion_name" required>
              </div>

              <div class="input_design">
                <label for="">Description</label>
                <textarea name="description" required></textarea>
              </div>    

              <div class="input_design">
                <label for="">Promo Poster (Display at Home Page Slider)</label>
                <input type="file" name="image" >
              </div>

              <div class="input_design">
                  <label for="daterange">Start and End Date</label>
                  <input type="text" id="daterange" placeholder="Select date range">
              </div>
              <input type="hidden" id="start_date" name="start_date">
              <input type="hidden" id="end_date" name="end_date">

              <div class="input_design">
                
                <input class="btn btn-success"type="submit" value="Add Promotion">
              </div>
            </form>
          </div>
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

  </body>
</html>

<script>
   flatpickr("#daterange", {
    mode: "range",
    dateFormat: "d-m-Y",
    minDate: "today",
    maxDate: new Date().fp_incr(90), 
    onChange: function(selectedDates, dateStr) {
        let dates = dateStr.split(" to "); 
        
        document.getElementById("start_date").value = dates[0] || "";
        document.getElementById("end_date").value = dates[1] || "";
    }
  });
</script>