<!-- header section strats -->

<header class="header_section">
   
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{ url('/') }}"><img width="200" src="{{ asset('home/images/logo.png') }}"
                    alt="#" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                            aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span
                                    class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="about.html">About</a></li>
                            <li><a href="testimonial.html">Testimonial</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('all_product') }}">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog_list.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/show_order') }}">Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('show_cart') }}"><span class="material-symbols-outlined">shopping_cart</span></a>
                    </li>
                    

                    {{-- <form  action="{{ url('product_search') }}" class="form-inline">
                        @csrf
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form> --}}
                    


                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="btn btn-primary" id="logincss" href="{{ route('profile.show') }}">{{ Auth::user()->name }}</a>
                            </li>
                            <li class="nav-item" > 
                                {{-- <a href="" class="btn btn-danger">Log Out</a> --}}
                                {{-- <form method="POST" action="{{ route('logout') }}" class="nav-item">
                                    @csrf
                
                                    <button type="submit" class="btn btn-danger">
                                        {{ __('Log Out') }}
                                    </button>
                                    <a href="" class="btn btn-danger">Log Out</a>
                                </form> --}}
                            </li>
                            
                        @else
                            <li class="nav-item">
                                <a class="btn btn-primary" id="logincss" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-success" href="{{ route('register') }}">Resister</a>
                            </li>
                        @endauth
                    @endif
                    {{-- cut option --}}
                    {{-- <li class="nav-item">
                   <a class="nav-link" href="#">
                      <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                         <g>
                            <g>
                               <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                  c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                            </g>
                         </g>
                         <g>
                            <g>
                               <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                  C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                  c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                  C457.728,97.71,450.56,86.958,439.296,84.91z" />
                            </g>
                         </g>
                         <g>
                            <g>
                               <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                  c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                            </g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                         <g>
                         </g>
                      </svg>
                   </a>
                </li> --}}
                    {{-- end cut option --}}

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- end header section -->
