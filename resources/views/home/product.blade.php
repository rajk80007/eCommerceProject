<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
            <form action="{{url('product_search')}}" method="GET">
                @csrf
                <input type="text" name="search" placeholder="search for something">
                <input type="submit" class="btn btn-primary" value="Search">
            </form>
        </div>
        @if(session()->has('message'))

        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
            {{session()->get('message')}}
        </div>
        @endif
        <div class="row">
            @foreach($product as $products)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <a href="{{url('product_details', $products->id)}}" class="option1">
                                Product Details
                            </a>
                            <form action="{{url('add_card', $products->id)}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">

                                        <input type="number" name="quantity" id="" value="1" min="1">
                                    </div>
                                    <div class="col-md-4">

                                        <input type="submit" value="Add to card">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="img-box">
                        <img height="150" width="150" src="{{url('product_img/'.$products->image)}}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{$products->title}}
                        </h5>
                        @if($products->discount_price)
                        <h6 style="color:red;">
                            Discount Price <br>
                            ${{$products->discount_price}}
                        </h6>
                        <h6 style="text-decoration: line-through; color:blue;">
                            Price <br>
                            ${{$products->price}}
                        </h6>
                        @else
                        <h6 style="color:blue;">
                            ${{$products->price}}
                        </h6>
                        @endif
                    </div>
                </div>
            </div>

            @endforeach

        </div>
        <div style="margin-top: 10px;">{!! $product->appends(Request::all())->links() !!} </div>
        <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div>
    </div>
</section>