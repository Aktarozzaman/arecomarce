<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    <style type="text/css">
        .center {
            margin: auto;
            width: 55%;
            text-align: center;
            padding: 30px;
        }

        table,
        th,
        td {
            border: solid gray;
        }

        .tr {
            font-size: 20px;
            padding: 5px;
            background-color: aqua;
        }

        .image_size {
            width: 50px;
            height: 50px;
        }

        .order {
            font-size: 25px;
            padding-bottom: 15px;
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <div class="hero_area">
        @include('home.header')
        @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{ session()->get('message') }}
            </div>
        @endif

        <div class="center">
            <table>
                <tr>
                    <th class="tr">Product Title</th>
                    <th class="tr">Product Quantity</th>
                    <th class="tr">Price</th>
                    <th class="tr">Image</th>
                    <th class="tr">Action</th>

                </tr>
                <?php $totalprice = 0; ?>
                @foreach ($cart as $cart)
                    <tr>
                        <td>{{ $cart->product_title }}</td>
                        <td>{{ $cart->quantity }}</td>

                        <td>${{ $cart->price }}</td>

                        <td><img class="image_size" src="/product/{{ $cart->image }}"></td>

                        <td><a class="btn btn-danger" href="{{ url('/remove_cart', $cart->id) }}" onclick="conformation(event)" >Remove </a></td>
                       
                        
                    </tr>
                    <?php $totalprice = $totalprice + $cart->price; ?>
                @endforeach

            </table>
            <div>
                <h1>Total Price: ${{ $totalprice }}</h1>
            </div>
            <div>
                <h1 class="order">Procced to Order</h1>
                <a href="{{ url('/cash/order') }}" class="btn btn-danger">Cash on Delivary</a>
                <a href="{{ URL('stripe', $totalprice) }}" class="btn btn-danger">Pay Using Card</a>

            </div>
        </div>

        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Aktar.io</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <script>
            function conformation(e) {
                
                e.preventDefault(); 
                var urlToRedirect=e.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                var href = $(this).attr('href');
                var message = $(this).data('confirm');

                //pop up
                swal({
                        title: "Are You Sure To Remove This Product?",
                        text: message,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            swal("Poof! Your Product has been deleted!", {
                                icon: "success",
                            });
                            window.location.href = urlToRedirect;
                        } else {
                            swal("Your Order is safe!");
                        }
                    });
                    

            }
        </script>

        <!-- jQery -->
        <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
        <!-- popper js -->
        <script src="{{ asset('home/js/popper.min.js') }}"></script>
        <!-- bootstrap js -->
        <script src="{{ asset('home/js/bootstrap.js') }}"></script>
        <!-- custom js -->
        <script src="{{ asset('home/js/custom.js') }}"></script>
    </div>
</body>

</html>
