{{-- <x-app-layout>
   
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .h2_font {
            font-size: 40px;
            padding-bottom: 10px;
        }

        .input_color {
            color: black;
        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 2px;
            border: 3px solid white;
        }

        .image_size {
            width: 50px;
            height: 50px;
        }

        .tr_color {
            background-color: cadetblue;
        }

        .td_deg {
            padding-left: 30px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')

        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="div_center">
                    <h2 class="h2_font"> View Product</h2>
                </div>
                <table class="center">
                    <tr class="center tr_color">
                        <td class="td_deg">Title</td>
                        <td class="td_deg">Discription</td>

                        <td class="td_deg">Catagory</td>
                        <td class="td_deg">Price</td>
                        <td class="td_deg">Quantity</td>
                        <td class="td_deg">Dis_Price</td>
                        <td class="td_deg">Image</td>

                        <td class="td_deg">Delete</td>
                        <td class="td_deg">Edit</td>
                    </tr>
                    @foreach ($data as $data)
                        <tr>
                            <td>{{ $data->title }}</td>

                            <td>{{ $data->description }}</td>

                            <td>{{ $data->catagory }}</td>
                            <td>{{ $data->price }}</td>
                            <td>{{ $data->quantity }}</td>

                            <td>{{ $data->discount_price }}</td>

                            <td><img class="image_size" src="/product/{{ $data->image }}"></td>


                            <td>
                                <a onclick="return confirm('Are You Sure Delete this ?')" class="btn btn-danger"
                                    href="{{ url('delete_product', $data->id) }}">Delete</a>

                            </td>
                            <td>
                                <a href="{{ url('/update_product',$data->id) }}" class="btn btn-info td_deg" > Edit</a>

                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>


    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
