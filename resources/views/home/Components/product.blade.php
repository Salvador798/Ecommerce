<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Latest Products
            </h2>
        </div>
        <div class="row">

            @foreach ($data as $row)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="box">
                        <div class="img-box">
                            <img src="products/{{ $row->image }}" alt="">
                        </div>
                        <div class="detail-box">
                            <h6>{{ $row->title }}</h6>
                            <h6>
                                Price
                                <span>{{ $row->price }}</span>
                            </h6>
                        </div>
                        <div style="padding: 15px">
                            <a style="color: #fff" href="{{ url('/details', $row->id) }}"
                                class="btn btn-danger">Details</a>

                            <a style="color: #fff" href="{{ url('/cart/create', $row->id) }}"
                                class="btn btn-primary">Add to
                                Cart</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>
</section>
