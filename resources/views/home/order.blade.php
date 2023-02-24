<!DOCTYPE html>
<html>

<head>
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
        .table_deg {
            border: 2px solid black;
            width: 80%;
            padding-top: 50px;
            margin: auto;
            text-align: center;

        }

        .th_deg {
            border: 2px solid rgb(15, 15, 15);
            background-color: skyblue;


        }

        .tr_deg {
            border: 2px solid rgb(15, 15, 15);
        }

        .image_size {
            width: 50px;
            height: 50px;
        }
    </style>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    @include('sweetalert::alert')
    <div class="hero_area">
        @include('home.header')
        <!-- slider section -->
        <div>
            @if (session()->has('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    {{ session()->get('success') }}
                </div>
            @endif
            <table class="table_deg">
                <tr class="th_detable_degg">
                    <th class="th_deg">Product Title</th>
                    <th class="th_deg">Product Quantity</th>
                    <th class="th_deg">Product Price</th>
                    <th class="th_deg">Delivery Status</th>
                    <th class="th_deg">Payment Status</th>
                    <th class="th_deg">Product Image</th>
                    <th class="th_deg">Cancel Order</th>

                </tr>
                @foreach ($order as $data)
                    <tr class="">
                        <td class="tr_deg">{{ $data->product_title }}</td>
                        <td class="tr_deg">{{ $data->quantity }}</td>
                        <td class="tr_deg">{{ $data->price }}</td>
                        <td class="tr_deg">{{ $data->delivary_status }}</td>
                        <td class="tr_deg">{{ $data->payment_status }}</td>
                        <td class="tr_deg"><img class="image_size" src="/product/{{ $data->image }}">

                        </td>
                        <td class="tr_deg">
                            @if($data->delivary_status=='Processing')
                                <a 
                                    href="{{ url('cancel_order', $data->id) }}" class="btn btn-danger">Cancel Order</a>
                            @else
                                <p style='color:blue' >Not Allow</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>



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
