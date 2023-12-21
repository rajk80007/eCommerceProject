<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
    .page-body-wrapper {

        width: calc(20% - 262px);
    }

    .center {
        margin: auto;
        width: 60%;
        border: 3px solid white;
        text-align: center;
        margin-top: 40px;
    }

    .font_size {
        text-align: center;
        font-size: 40px;
        padding-top: 20px;
    }

    .th_deg {
        padding: 30px;
    }
    </style>

</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <!-- partial -->
        <div class="main-panel" style="width:80vw;">
            <div class="content-wrapper" id="main">
                <div class="div_center">
                    @if(session()->has('message'))

                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{session()->get('message')}}
                    </div>

                    @endif
                    <h2 class="font_size">All Products</h2>
                    <table class="center">
                        <tr>
                            <th class="th_deg"> Product Title</th>
                            <th class="th_deg">Description</th>
                            <th class="th_deg">Quantity</th>
                            <th class="th_deg">Category</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Discount Price</th>
                            <th class="th_deg">Product Image</th>
                            <th class="th_deg">Delete</th>
                            <th class="th_deg">Edit</th>
                        </tr>
                        @foreach($data as $product)
                        <tr>
                            <td style="border: 2px solid green;">{{$product->title}}</td>
                            <td style="border: 2px solid green;">{{$product->description}}</td>
                            <td style="border: 2px solid green;">{{$product->quanitity}}</td>
                            <td style="border: 2px solid green;">{{$product->category}}</td>
                            <td style="border: 2px solid green;">{{$product->price}}</td>
                            <td style="border: 2px solid green;">{{$product->discount_price}}</td>
                            @if($product->image)
                            <td style="border: 2px solid green;"><a href="{{url('product_img/'.$product->image)}}"
                                    target="_blank"><img src="{{url('product_img/'.$product->image)}}" width="100"
                                        height="100" alt="Image not found..."></a></td>
                            @else
                            <td style="border: 2px solid green;"></td>

                            @endif
                            <td style="border: 2px solid green;"><a class="btn btn-danger"
                                    href="{{url('/delete_product', $product->id)}}"
                                    onclick="return confirm('Are you sure to delete this product?')">Delete</a></td>
                            <td style="border: 2px solid green;"><a class="btn btn-primary" href="{{url('update_product', $product->id)}}">Edit</a></td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>

            <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>