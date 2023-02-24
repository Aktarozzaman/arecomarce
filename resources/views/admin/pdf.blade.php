<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order_pdf</title>
</head>
<body>
    <h1>Order Details</h1>
    <u>Customar Name:</u> <h3>{{ $order->name}}</h3>
    <u>Customar Email:</u><h3>{{ $order->email}}</h3>
    <u>Customar Phone:</u><h3>{{ $order->phone}}</h3>
    <u>Customar Address:</u><h3>{{ $order->address}}</h3>
    <u>Customar Id:</u><h3>{{ $order->user_id }}</h3>

    <u>Product Name:</u><h3>{{ $order->product_title }}</h3>
    <u>Product Quantity:</u><h3>{{ $order->quantity }}</h3>
    <u>Product Price:</u><h3>{{ $order->price}}</h3>
    <u>Product ID:</u><h3>{{ $order->product_id}}</h3>
    <u>Payment Status:</u><h3>{{ $order->payment_status}}</h3>
    <u>Product Image:</u>
    <br> <br>
    
    <img height="250" width="300" src="/product/{{ $order->image }}"> 
    
</body>
</html>