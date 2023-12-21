<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order PDF</title>
    <style>
        h3{
            width:500px;

        }
        .left {
            width:250px;
            display:inline-block;
        }
        .left span{
            padding-left: 100px;
        }
    </style>
</head>
<body>
   <h1 align="center">Order Details</h1>

   <h3><span class="left"> Customer Name</span>    : <span> {{$order->name}} </span></h3>
   <h3><span class="left">Customer Email</span>    : <span> {{$order->email}} </span></h3>
   <h3><span class="left">Customer Mobile</span>    : <span> {{$order->phone}} </span></h3>
   <h3><span class="left">Customer Address</span>    : <span> {{$order->address}} </span></h3>
   <h3><span class="left">Customer ID</span>    : <span> {{$order->user_id}} </span></h3>
   <h3><span class="left">Product Name</span>    : <span> {{$order->product_title}} </span></h3>
   <h3><span class="left">Product Price</span>    : <span> {{$order->price}} </span></h3>
   <h3><span class="left">Product Quantity</span>    : <span> {{$order->quantity}} </span></h3>
   <h3><span class="left">Payment Status</span>    : <span> {{$order->payment_status}} </span></h3>
   <h3><span class="left">Product ID</span>    : <span> {{$order->id}} </span></h3>
   <h3><span class="left">Delivery Status</span>    : <span> {{$order->delivery_status}} </span></h3>

   <img height="250" width="200" src="product_img/{{$order->image}}" alt="">
</body>
</html>