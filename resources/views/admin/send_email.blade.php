<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <base href="/public">
    @include('admin.css')
    <style>
    .page-body-wrapper {

        width: calc(20% - 262px);
    }
  
    .font_size {
        text-align: center;
        font-size: 25px;
        padding-top: 20px;
    }
    label {
        display: inline-block;
        width: 300px;
        font-size: 15px;
        font-weight: bold;
    }
    input {
        color:black;
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

                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                        {{session()->get('message')}}
                    </div>

                    @endif
                    <h2 class="font_size">Send Email to {{$order->email}}</h2>
                    
                    <form action="{{url('send_user_email', $order->id)}}" method ="post">
                    @csrf
                    <div style="padding-left:35%; padding-top:35px;">
                        <label for="">Email Greeating :</label>
                        <input style="color:black;" type="text" name ="greeting">
                    </div>
                    <div style="padding-left:35%; padding-top:35px;">
                        <label for="">Email FirstLine :</label>
                        <input style="color:black;" type="text" name ="firstline">
                    </div>
                    <div style="padding-left:35%; padding-top:35px;">
                        <label for="">Email Body :</label>
                        <input style="color:black;" type="text" name ="body">
                    </div>
                    </div>
                    <div style="padding-left:35%; padding-top:35px;">
                        <label for="">Email Button Name :</label>
                        <input style="color:black;" type="text" name ="button">
                    </div>
                    <div style="padding-left:35%; padding-top:35px;">
                        <label for="">Email Url :</label>
                        <input style="color:black;" type="text" name ="url">
                    </div>
                    <div style="padding-left:35%; padding-top:35px;">
                        <label for="">Email Last Line :</label>
                        <input style="color:black;" type="text" name ="lastline">
                    </div>
                        
                    <div align="center" style="padding-top:35px;">
                       
                        <input type="submit" class="btn btn-success" value="Send Email">
                    </div>

             
                    </form>
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