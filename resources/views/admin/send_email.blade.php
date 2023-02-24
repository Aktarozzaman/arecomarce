{{-- <x-app-layout>
   
</x-app-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style>
        label {
            display: inline-block;
            width: 200px;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')

        @include('admin.header')


        <div class="main-panel">
            <div class="content-wrapper">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('success') }}
                    </div>
                @endif
                
                <h1 style="text-align: center;font-size:20px">Send Email to: {{ $order->email }}</h1>


                <form action="{{ url('send_user_email', $order->id) }}" method="POST">
                    @csrf
                    <div style="padding-left: 35%; padding-top:30px;">
                        <label for="">Email Greeting :</label>
                        <input type="text" name="greeting">
                    </div>
                    <div style="padding-left: 35%; padding-top:30px;">
                        <label for="">Email Firstline :</label>
                        <input type="text" name="firstline">
                    </div>
                    <div style="padding-left: 35%; padding-top:30px;">
                        <label for="">Email Body:</label>
                        <input type="text" name="body">
                    </div>
                    <div style="padding-left: 35%; padding-top:30px;">
                        <label for="">Email Button Name :</label>
                        <input type="text" name="button">
                    </div>
                    <div style="padding-left: 35%; padding-top:30px;">
                        <label for="">Email Url:</label>
                        <input type="text" name="url">
                    </div>
                    <div style="padding-left: 35%; padding-top:30px;">
                        <label for="">Email Last Line :</label>
                        <input type="text" name="lastline">
                    </div>
                    <div style="padding-left: 35%; padding-top:30px;">
                        <input type="submit" class="btn btn-info" value="Send Email">
                    </div>
                </form>


            </div>
        </div>

    </div>

    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
