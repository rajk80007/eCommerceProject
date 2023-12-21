<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <style>
    #main {
        width: 80vw;
    }

    .div_center {
        text-align: center;
        padding-top: 40px;
    }

    .h2_font {
        font-size: 40px;
        padding-bottom: 40px;
    }

    .input_color {
        color: black;
        width: 200px;
        padding-bottom: 20px;
    }

    .center {
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 30px;
        border: 3px solid white;
    }

    label {
        display: inline-block;
        width: 200px;
    }

    .div_design {
        padding-bottom: 15px;
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
        <div class="main-panel">
            <div class="content-wrapper" id="main">
                <div class="div_center">
                    @if(session()->has('message'))

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{session()->get('message')}} <a href="{{url('show_product')}}">Go to show product</a>
                    </div>

                    @endif
                    <h1 class="h2_font">Edit product</h1>
                    <form action="{{url('/update_product_confirm', $data->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                            <label for="">Product Title :</label>
                            <input class="input_color" type="text" name="title" placeholder="Write a title" required value = "{{$data->title}}">
                        </div>
                        <div class="div_design">
                            <label for="">Product Description :</label>
                            <input class="input_color" type="text" name="description" placeholder="Write a description"
                                required value = "{{$data->description}}">
                        </div>
                        <div class="div_design">
                            <label for="">Product Price:</label>
                            <input class="input_color" type="number" name="price" placeholder="Write product price"
                                required value = "{{$data->price}}">
                        </div>
                        <div class="div_design">
                            <label for="">Discount Price :</label>
                            <input class="input_color" type="text" name="discount" placeholder="Write a discount price"
                                required value = "{{$data->discount_price}}">
                        </div>
                        <div class="div_design">
                            <label for="">Product Quantity :</label>
                            <input class="input_color" type="text" name="quantity"
                                placeholder="Write the product quantity" required value = "{{$data->quanitity}}">
                        </div>
                        <div class="div_design">
                            <label for="">Product Category :</label>
                            <select class="input_color" type="text" name="category">
                                <option value = "{{$data->category}}" selected>{{$data->category}}</option>
                                @foreach($category as $category)
                                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                                @endforeach;
                            
                            </select>
                        </div>
                        <div class="div_design">
                            <label for="">Current Product Image</label>
                          <img style="margin:auto;" height="100" width="100" src="/product_img/{{$data->image}}" alt="">
                        </div>

                        <div class="div_design">
                            <label for="">Change Product Image Here</label>
                            <input class="input_color" type="file" name="image">
                        </div>
                        <div class="div_design">

                            <input class="btn btn-success" type="submit" value="Update Product">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>