<!DOCTYPE html>
<html lang="en">


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo">
    <!-- Document title -->
    <title>Digital Artist</title>
    <!-- Stylesheets & Fonts -->
    <link href="//fonts.googleapis.com/css?family=Cedarville+Cursive" rel="stylesheet" type="text/css">

    <link href="{{asset('Frontend/css/plugins.css')}}" rel="stylesheet">
    <link href="{{asset('Frontend/css/style.css')}}" rel="stylesheet">
</head>


<body class="side-panel side-panel-static">

    <!-- Side Panel -->
    <div id="side-panel" class="text-center dark">
        <div id="close-panel">
            <i class="fa fa-times"></i>
        </div>

        <div class="side-panel-wrap">
            <div class="logo">
                <a href="#"><img src="{{asset('Frontend/homepages/architect/images/logo-dark.png')}}"></a>
            </div>
            <hr class="space">
            <!--Navigation-->
            <div id="mainMenu" class="menu-onclick menu-vertical">
                <div class="container">
                    <nav>
                        <ul>
                            <li><a href="{{'/'}}">Home</a></li>
                            <li><a href="#section1">About</a></li>
                            <li><a href="#section2">Works</a></li>
                            <li><a href="#section3">Events</a></li>
                            <li><a href="#section4">Artists</a></li>
                            <li><a href="{{'/login'}}">Login</a></li>
                            <li><a href="{{'/register'}}">Register</a></li>

                            
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->


            <hr class="space">
            <hr class="space">
            <!--social icons-->
            <div class="social-icons social-icons-colored text-center">
                <ul>
                    <li class="social-facebook"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li class="social-twitter"><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li class="social-google"><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                    <li class="social-pinterest"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    <li class="social-vimeo"><a href="#"><i class="fab fa-vimeo"></i></a></li>
                </ul>
            </div>
            <!--end: social icons-->

            <!--copyright text-->
            <p class="small">© 2019 POLO - Best HTML5 Template Ever. All Rights Reserved.</p>
            <!--end: copyright text-->
        </div>

    </div>
    <!-- end: Side Panel -->

    <!-- Body Inner -->
    <div class="body-inner">

        <!-- Header -->
        <header id="header" class="d-block d-md-none dark" data-transparent="true">

            <div class="header-inner">
                <div class="container">
                    <!--Header Extras-->
                    <div class="header-extras">
                        <ul>
                            <li>
                                <!--side panel-->
                                <a id="side-panel-trigger" href="#" class="toggle-item" data-target="body" data-class="side-panel-active">
                                    <i class="fa fa-bars"></i>
                                    <i class="fa fa-times"></i>
                                </a>
                                <!--end: side panel-->
                            </li>
                        </ul>
                    </div>
                    <!--end: Header Extras-->

                </div>
            </div>
        </header>
        <!-- end: Header -->

    

      <!-- Content -->
        <section id="page-content">
        
            <div class="container">
                <!-- post content -->
                <!-- Page title -->
                <div class="page-title">
                    <h1>{{$event->name}}</h1>
                    <div class="breadcrumb float-left">
                        <ul>
                            <li><a href="#">Home</a>
                            </li>
                            <li><a href="#">Events</a>
                            </li>
                            <li class="active"><a href="#">Details</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end: Page title -->
                <!-- ABOUT AUTHOR -->
        <section id="section7">
            <div class="container">
                <div class="row  m-b-50">
                    <div class="col-lg-12">
                        <h2 class="text-center">{{$event->title}}</h2>
                        <br>
                        {{-- <h1 class="text-center text-medium-light m-b-80">{{$event->sub_title}}</h1> --}}

                    </div>
                    <div class="col-lg-12">
                        <div class="row">
                            
                            <div class="col-lg-12">
                                <p class="lead">The most happiest time of the day!. Morbi sagittis, sem quis lacinia faucibus, orci ipsum gravida tortor, vel interdum mi sapien ut justo. Nulla varius consequat magna, id molestie ipsum volutpat quis. A true story, that never been told!. Fusce id mi diam, non ornare orci. Pellentesque ipsum erat,
                                    <br>
                                    <br>
                                <div class="text-center">

                                    <address>
                                        {{-- <strong>{{$event->title}}</strong><br>
                                        {{$event->sub_title}}<br> --}}
                                        {{$event->date}}<br>
                                    </address>

                                    <address>
                                        <strong>Email us</strong><br>
                                        <a href="mailto:#">first.last@example.com</a>
                                    </address>

                                </div>
                                

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>
        <!-- end: ABOUT AUTHOR -->
                <!-- Blog -->
                <div id="blog" class="grid-layout post-3-columns m-b-30" data-item="post-item">
                    <!-- Post item-->
                     @foreach($event->artWorks as $key => $data)
                    <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-image">
                                <a href="#">
                                    <img alt="" src='{{asset("dashboard/pictures/artworks/$data->image")}}'>
                                </a>
                                <span class="post-meta-category"><a href="">{{$data->artist->name}}</a></span>
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>{{$data['created_at']->diffForHumans() }}</span>
                                
                                <span class="post-meta-comments"><a href=""><i class="fa fa-comments-omat('j-f-Y')">{{$data->created_at->format('H:i:s')}}</i></a></span>
                                <h2><a href="#">Standard post with a single image
                                    </a></h2>
                                <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>
                                <a href="#" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end: Post item-->
                    @endforeach
                   

                    {{-- {{dd($data)}} --}}
                     <!-- Post item-->
                    {{-- <div class="post-item border">
                        <div class="post-item-wrap">
                            <div class="post-slider">
                                <div class="carousel dots-inside arrows-visible arrows-only" data-items="1" data-loop="true" data-autoplay="true" data-lightbox="gallery">
                                    <a href="images/blog/11.jpg" data-lightbox="gallery-image">
                                        <img alt="" src="{{asset("dashboard/pictures/gallery/$data->image")}}">
                                    </a>
                                    <a href="images/blog/16.jpg" data-lightbox="gallery-image">
                                        <img alt="" src="images/blog/11.jpg">
                                    </a>
                                </div>
                                <span class="post-meta-category"><a href="">Technology</a></span>
                            </div>
                            <div class="post-item-description">
                                <span class="post-meta-date"><i class="fa fa-calendar-o"></i>Jan 21, 2017</span>
                                <span class="post-meta-comments"><a href=""><i class="fa fa-comments-o"></i>33 Comments</a></span>
                                <h2><a href="#">Simplicity, a post with slider gallery</a></h2>
                                <p>Curabitur pulvinar euismod ante, ac sagittis ante posuere ac. Vivamus luctus commodo dolor porta feugiat. Fusce at velit id ligula pharetra laoreet.</p>
                                <a href="#" class="item-link">Read More <i class="icon-chevron-right"></i></a>
                            </div>
                        </div>
                    </div> --}}
                    <!-- end: Post item-->
                   
                    
                </div>
                <!-- end: Blog -->
                <!-- Pagination -->
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item active"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                </ul>
                <!-- end: Pagination -->
            </div>
            <!-- end: post content -->
        </section> <!-- end: Content -->

        <!-- Footer -->
        <footer id="footer">
            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="widget">

                                <div class="widget-title">Polo HTML5 Template</div>
                                <p class="mb-5">Built with love in Fort Worth, Texas, USA<br>
                                    All rights reserved. Copyright © 2019. INSPIRO.</p>
                                <a href="https://themeforest.net/item/polo-responsive-multipurpose-html5-template/13708923" class="btn btn-inverted">Purchase Now</a>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <div class="widget-title">Discover</div>
                                        <ul class="list">
                                            <li><a href="#">Features</a></li>
                                            <li><a href="#">Layouts</a></li>
                                            <li><a href="#">Corporate</a></li>
                                            <li><a href="#">Updates</a></li>
                                            <li><a href="#">Pricing</a></li>
                                            <li><a href="#">Customers</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="widget">
                                        <div class="widget-title">Features</div>
                                        <ul class="list">
                                            <li><a href="#">Layouts</a></li>
                                            <li><a href="#">Headers</a></li>
                                            <li><a href="#">Widgets</a></li>
                                            <li><a href="#">Footers</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-3">
                                    <div class="widget">
                                        <div class="widget-title">Pages</div>
                                        <ul class="list">
                                            <li><a href="#">Portfolio</a></li>
                                            <li><a href="#">Blog</a></li>
                                            <li><a href="#">Shop</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget">
                                        <div class="widget-title">Support</div>
                                        <ul class="list">
                                            <li><a href="#">Help Desk</a></li>
                                            <li><a href="#">Documentation</a></li>
                                            <li><a href="#">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            <div class="copyright-content">
                <div class="container">
                    <div class="copyright-text text-center">&copy; 2019 POLO - Responsive Multi-Purpose HTML5 Template. All Rights Reserved.<a href="http://www.inspiro-media.com" target="_blank"> INSPIRO</a> </div>
                </div>
            </div>
        </footer>
        <!-- end: Footer -->

    </div>
    <!-- end: Body Inner -->

    <!-- Scroll top -->
    <a id="scrollTop"><i class="icon-chevron-up"></i><i class="icon-chevron-up"></i></a>
    <!--Plugins-->
    <script src="{{asset('Frontend/js/jquery.js')}}"></script>
    <script src="{{asset('Frontend/js/plugins.js')}}"></script>

    <!--Template functions-->
    <script src="{{asset('Frontend/js/functions.js')}}"></script>

</body>

</html>