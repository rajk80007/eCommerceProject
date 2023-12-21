<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style>
        #main{
            width:80vw;
        }
        .div_center{
            text-align: center;
            padding-top:40px;
        }
        .h2_font{
            font-size:40px;
            padding-bottom:40px;
        }
        .input_color{
            color:black;
        }
        .center{
            margin:auto;
            width:50%;
            text-align:center;
            margin-top:30px;
            border: 3px solid white;
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
                    {{session()->get('message')}}
                </div>

            @endif
            @if(session()->has('delete'))

                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{session()->get('delete')}}
                </div>

            @endif

                <h2 class="h2_font">Add Category</h2>
                <form action="{{url('add_category')}}" method = "POST">
                    @csrf
                    <input class="input_color" type="text" name="category" placeholder="Write category name">
                    <input type="submit" class="btn btn-primary" value="Add Categroy">
                </form>


            </div>

            <table class="center">
                <tr>
                    <th>Category name</th>
                    <th>Action</th>
                </tr>

                @foreach($data as $data)

                <tr>
                    <td>{{$data->category_name}}</td>
                    <td><a class = "btn btn-danger" href="{{url('delete_category', $data->id)}}" onclick='return confirm("Do you really want to delete category?")'>Delete</a></td>
                </tr>

                @endforeach
            </table>


            </div>
        </div>
    </div>
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>