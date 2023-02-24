{{-- <x-app-layout>
   
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        .title_deg {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
            padding-bottom: 20px;
        }

        .table_deg {
            border: 2px solid white;
            width: 100%;
            padding-top: 50px;
            margin: auto;
            text-align: center;

        }

        .th_deg {
            border: 2px solid white;
            background-color: skyblue;


        }

        .tr_deg {
            border: 2px solid white;
        }

        .image_size {
            width: 50px;
            height: 50px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')

        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                {{-- success --}}
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('success') }}
                    </div>
                @endif
                <h1 class="title_deg">All Orders</h1>
                <div style="padding-left:400px;padding-bottom:30px">
                    <form action="{{ url('search') }}" method="get">
                        @csrf
                        <input type="text" name="search" style="color: black" placeholder="Search Something">
                        <input type="submit" value="search" class="btn btn-outline-primary">
                    </form>
                </div>

                <table class="">
                    <tr class="">
                        <th class="th_deg">Name</th>
                        <th class="th_deg">Email</th>
                        <th class="th_deg">Phone</th>
                        <th class="th_deg">Address</th>
                        <th class="th_deg">Product Title</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Price</th>

                        <th class="th_deg">Payment Status</th>
                        <th class="th_deg">Delivary Status</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Delivered</th>
                        <th class="th_deg"> Print PDF</th>
                        <th class="th_deg"> Send Email</th>



                    </tr>
                    @forelse ($order as $order)
                        <tr class="tr_deg">
                            <td class="tr_deg">{{ $order->name }}</td>
                            <td class="tr_deg">{{ $order->email }}</td>
                            <td class="tr_deg">{{ $order->phone }}</td>
                            <td class="tr_deg">{{ $order->address }}</td>
                            <td class="tr_deg">{{ $order->product_title }}</td>
                            <td class="tr_deg">{{ $order->quantity }}</td>
                            <td class="tr_deg">{{ $order->price }}</td>
                            <td class="tr_deg">{{ $order->payment_status }}</td>
                            <td class="tr_deg">{{ $order->delivary_status }}</td>
                            <td class="tr_deg"><img class="image_size" src="/product/{{ $order->image }}"></td>
                            <td>
                                @if ($order->delivary_status == 'Processing')
                                    <a href="{{ url('delivered', $order->id) }}"
                                        onclick="return confirm('Are You Sure this product is delivered ?')"class="btn btn-info">Delivered</a>
                                @else
                                    <a href="{{ url('/delivered/delete', $order->id) }}"
                                        onclick="return confirm('Are You Sure Delete this product ?')"
                                        class="btn btn-danger">Delete</a>
                                @endif
                            </td>
                            <td class="tr_deg" style="padding: 10px;">
                                <a href="{{ url('print_pdf', $order->id) }}" class="btn btn-primary ">Print PDF</a>
                            </td>
                            <td>
                                <a href="{{ url('send_email', $order->id) }}" class="btn btn-info">Send Email</a>
                            </td>
                        </tr>

                        @empty
                        <tr>
                            <td colspan="16">No Data Found</td>
                        </tr>
                        
                    
                    @endforelse
                </table>
            </div>
        </div>


    </div>

    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
