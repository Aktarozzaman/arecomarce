<!DOCTYPE html>
<html>

<head>
    {{-- <base href="/public"> --}}
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('home/images/favicon.png') }}" type="">
    <title>AR - Fashion </title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
    <!-- font awesome style -->
    <link href="{{ asset('home/css/font-awesome.min.css') }}" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="{{ asset('home/css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('home/css/responsive.css') }}" rel="stylesheet" />
    <style>
        .image_size {

            
            
            height: 40%;
            padding:30px;
           
            margin-left: 30%;

        }
    </style>

</head>

<body>
    @include('sweetalert::alert')
    <div class="hero_area">
        @include('home.header')


        <div class="col-sm-6 col-md-4 col-lg-4 image_size  ">
            <div class="box ">


                <div class="img-box ">
                    <img width="300" height="300" src="{{ url('product', $productr->image) }}" alt="">

                </div>

                <div class="detail-box">
                    <h5>

                        {{ $productr->title }}
                    </h5>
                    @if ($productr->discount_price != null)
                        <h6 style="color: red">
                            
                            <b>Discount Price: ${{ $productr->discount_price }}</b>
                        </h6>

                        <h6 style="text-decoration:line-through; color:blue">
                            <b>Price: ${{ $productr->price }}</b>
                            
                        </h6>
                    @else
                        <h6 style="color: blue">
                            <b>Price: ${{ $productr->price }}</b>
                            
                        </h6>
                    @endif
                    <h6> <b>Product Catagory:</b> {{ $productr->catagory }}</h6>
                    <h6> <b>Product Details:</b> {{ $productr->description }}</h6>
                    <h6> <b>Product Quantity:</b> {{ $productr->quantity }}</h6>
                    <form action="{{ url('add_cart',$productr->id) }}" method="POST">
                        @csrf
                        <div class="row ">
                            <div class="col-md-4 ">
                                <input type="number" name="quantity" value="1" min="1"
                                    style="width: 100px">

                            </div>
                            <div class="col-md-4 ">
                                <input class="" type="submit" value="Add To Cart">
                            </div>


                        </div>
                </div>
            </div>
        </div>

        @include('home.footer')
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Aktar.io</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <!-- jQery -->
        <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
        <!-- popper js -->
        <script src="{{ asset('home/js/popper.min.js') }}"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('home/js/bootstrap.js') }}"></script>
        <!-- custom js -->
        <script src="{{ asset('home/js/custom.js') }}"></script>
</body>

</html>
