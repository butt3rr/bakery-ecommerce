<style>
    .promo-slider {
        width: 80%;
        max-height: 400px;
        object-fit: cover;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<section class="slider_section">
    <!-- slider container -->
    <div class="slider_container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
            @foreach($promotions as $promotion)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="container-fluid">
                            <div class="row">
                                <!-- Image from the promotion table -->
                                <div class="col-12">
                                <img src="{{ url('promotion/' . $promotion->image) }}" class="promo-slider d-block img-fluid" alt="{{ $promotion->promotion_name }}" title="{{ $promotion->promotion_name }}">

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Carousel Controls (left and right)-->
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>
