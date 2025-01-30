<section class="shop_section layout_padding">
    <div class="container">
    <div class="heading_container ">
        <h2 class="">
          Top Products
        </h2>
      </div>
      <div class="row">
      
      @foreach($product as $products)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="box">
           
              <div class="img-box">
                <img src="products/{{$products->image}}" alt="">
              </div>
              <div class="detail-box">
                <h6>
                  {{$products->title}}
                </h6>
                <h6>
                  Price
                  <span>
                    ${{$products->price}}
                  </span>
                </h6>
              </div>
           
            <div style="padding:15px">
              <a href="{{url('product_details', $products->id)}}" class="btn btn-danger">Details</a>

              <form action="{{ url('add_cart', $products->id) }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-primary">Add to Cart</button>
</form>

            </div>  
          </div>
        </div>
      
      @endforeach
      
      </div>
     
    </div>
  </section>