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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

<body>
    <div class="hero_area">
        @include('home.header')
        
    
        @include('sweetalert::alert')

    @include('home.product_view')
</div>
    {{-- comment and replay system starts here --}}
    <div style="text-align:center">
        <h1 style="text-align:center;font-size:30px;padding-bottom:10px; ">Comment</h1>

        <form action="{{ url('add_comment') }}" method="POST">
            @csrf
            <textarea style="height: 150px;width:600px" name="comment" placeholder="Comment Something here"></textarea> <br>
            <button class="btn btn-primary" type="submit">Comment</button>
        </form>
    </div>
    <div style="padding-left:20% ;padding-top:20px">
        <h1 style="font-size: 20px;">All Comments</h1>
        @foreach ($comment as $comment)
            <div>
                <b>{{ $comment->name }}</b>
                <p>{{ $comment->comment }}</p>
               

                <a href="javascript:void(0)" onclick="reply(this)">Reply</a>

            </div>
        @endforeach

        <div style="display: none" class="replyDiv">
            <input type="text" name="commentId" value="" hidden >
            <textarea style="height: 100px;width:300px" placeholder="Reply here"></textarea><br>
            <button class="btn btn-primary">Reply</button>
            <a href="javascript:void(0)" class="btn " onclick="replay_close(this)" 
            data-Commentid="{{ $comment->id}}">Close</a>

        </div>

    </div>



    {{-- comment and replay system end here --}}



    
    @include('home.footer')

    <div class="cpy_">
        <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Aktar.io</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

        </p>
    </div>

    <script type="text/javascript">
        function reply(caller) {
            // document.getElementById("commentId").value=$(caller).attr('data-Commentid');
            // document.getElementByID('CommentId').value=$(caller).attr('data-Commentid');
            // document.getElementById("commentId").value=$(caller).attr('data-Commentid');
            $('.replyDiv').insertAfter($(caller));
            $('.replyDiv').show();
        }

        function replay_close(caller) {

            $('.replyDiv').hide();
        }
    </script>
     <script>
        document.addEventListener("DOMContentLoaded", function(event) { 
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>
    <!-- popper js -->
    <script src="{{ asset('home/js/jquery-3.4.1.min.js') }}"></script>
    <script></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('home/js/bootstrap.js') }}"></script>
    <!-- custom js -->
    <script src="{{ asset('home/js/custom.js') }}"></script>


</body>

</html>
