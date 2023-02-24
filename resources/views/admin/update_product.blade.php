<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;

        }

        .center {
            margin: auto;
            width: 50%;
            text-align: center;
            margin-top: 0px;
            margin-bottom: 10px;
            border: 3px solid white;
        }

        label {
            display: inline-block;
            width: 200px;

        }

        .div_design {
            padding-bottom: 15px;
        }
        .image_size{
            width: 100px;
            height: 50px;;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        @include('admin.sidebar')

        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                {{-- message --}}
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div class="div_center center">
                    <h1 class="font_size">Update Product</h1>


                    <form action="{{ url('/update/product',$data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design ">
                            <label class="center">Product Title:</label>
                            <input type="text" value="{{ $data->title }}" name="title"
                                placeholder="Enter Product Title">
                        </div>
                        <div class="div_design">
                            <label class="center">Product Description:</label>
                            <input type="text"value="{{ $data->description }}" class="" name="discription"
                                placeholder="Enter Product Description">
                        </div>

                        <div class="div_design">
                            <label class="center">Product Quantity:</label>
                            <input type="number"value="{{ $data->quantity }}" class="" name="quantity"
                                min="0" placeholder="Enter Product Quantity">
                        </div>
                        <div class="div_design">
                            <label class="center">Product Price:</label>
                            <input type="number"value="{{ $data->price }}" class="" name="price"
                                placeholder="Enter Product Price">
                        </div>
                        <div class="div_design">
                            <label class="center">Discount Price:</label>
                            <input type="number"value="{{ $data->discount_price }}" class="" name="dis_price"
                                placeholder="Enter Product Title">
                        </div>
                        <div class="div_design">
                            <label class="center">Product Catagory:</label>
                            <select name="catagory">
                                <option value="{{ $data->catagory }}" selected="">{{ $data->catagory }}</option>
                                @foreach ($catagory as $catagory)
                                <option  value="{{ $catagory->catagory_name }}">{{ $catagory->catagory_name }}
                                </option>
                            @endforeach

                            </select>
                        </div>
                        <div class="div_design">
                            <label class="center"> Current Product Image:</label>
                            <img class="image_size" src="/product/{{ $data->image }}">


                        </div>
                        <div class="div_design">
                            <label class="center"value="{{ $data->image }}"> Chenge Product Image:</label>
                            <input type="file" name="image">
                            

                        </div>

                        <button class="btn btn-primary" type="submit">Update Product</button>


                    </form>


                </div>
            </div>
        </div>

    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
