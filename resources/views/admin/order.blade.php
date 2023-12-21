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
        width: 100%;
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
        padding: 10px;
    }
    .tab_header{
        background-color: blue;
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
                    <h2 class="font_size">All Orders</h2>

                    <div style = "padding-left:400px; padding-top:20px;">
                        <form action="{{url('search')}}" method="get">
                            @csrf
                            <input style="color:black;" type="text" name ="search" placeholder="Search for Something">

                            <input type="submit" value = "Search" class="btn btn-outline-primary">
                        </form>
                    </div>

                    <table class="center">
                        <tr class="tab_header">
                            <th class="th_deg"> Name</th>
                            <th class="th_deg">Email</th>
                            <th class="th_deg">Address</th>
                            <th class="th_deg">Phone</th>
                            <th class="th_deg">Product Title</th>
                            <th class="th_deg">Quantity</th>
                            <th class="th_deg">Price</th>
                            <th class="th_deg">Payment Status</th>
                            <th class="th_deg">Delivery Status</th>
                            <th class="th_deg">image</th>
                            <th class="th_deg"></th>
                            <th class="th_deg">Print PDF</th>
                        </tr>
                     @forelse($order as $order)
                        <tr style="padding: 5px 0;">
                            <td>{{$order->name}}</td>
                            <td>{{$order->email}}
                            <a href="{{url('send_email', $order->id)}}" class = "btn btn-warning" )"> Send Email</a>
                            </td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->phone}}</td>
                            <td>{{$order->product_title}}</td>
                            <td>{{$order->quantity}}</td>
                            <td>{{$order->price}}</td>
                            <td>{{$order->payment_status}} 
                                @if($order->payment_status!="Paid")
                                <a href="{{url('payment_done', $order->id)}}" class = "btn btn-danger" onclick="return confirm('Are you sure? Payment has done!')"> Payment Done</a>
                                @else 
                                <p></p>
                                @endif
                            </td>
                            <td>{{$order->delivery_status}}</td>
                            <td><a href="{{url('/product_img/'.$order->image)}}" target="_blank"><img src="/product_img/{{$order->image}}" alt="" width="80" height="100"></a></td>

                            <td>
                                @if($order->delivery_status=='Processing')
                                <a href="{{url('delivered', $order->id)}}" class="btn btn-primary" onclick="return confirm('Are you sure? Payment has done!')">Delivered</a>
                                @else

                                <p style="color:green;">delivered</p>
                               

                                @endif

                            </td>
                            <td>
                                <a href="{{url('print_pdf', $order->id)}}" class="btn btn-secondary">Download PDF</a>
                            </td>
                        </tr>
                        @empty
                       <tr>
                        <td colspan="16">
                            No Data Found
                        </td>
                       </tr>
                  @endforelse
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