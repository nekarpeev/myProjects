<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tag -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO -->
    <meta name="description" content="150 words">
    <meta name="author" content="uipasta">
    <meta name="url" content="http://www.yourdomainname.com">
    <meta name="copyright" content="company name">
    <meta name="robots" content="index,follow">


    <title>DevBlog - Personal Blog Template</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('template/images/favicon/favicon.ico') }}"
    ">
    <link rel="apple-touch-icon" sizes="144x144" type="image/x-icon"
          href="{{ asset('template/images/favicon/apple-touch-icon.png') }}">

    <!-- All CSS Plugins -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/css/style.css') }}">

    <!-- Main CSS Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('template/css/plugin.css') }}">

    <!-- Google Web Fonts  -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700">


    <!-- HTML5 shiv and Respond.js support IE8 or Older for HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>

<body>


<!-- Preloader Start -->
{{--<div class="preloader">--}}
    {{--<div class="rounder"></div>--}}
{{--</div>--}}
<!-- Preloader End -->


<div id="main">
    <div class="container">
        <div class="row">


            <!-- About Me (Left Sidebar) Start -->
            <div class="col-md-3">
                <div class="about-fixed">

                    <div class="my-pic">
                        <img src="{{ asset('template/images/pic/my-pic.png') }}" alt="">
                        <a href="javascript:void(0)" class="collapsed" data-target="#menu" data-toggle="collapse"><i
                                    class="icon-menu menu"></i></a>
                        <div id="menu" class="collapse">
                            <ul class="menu-link">
                                <li><a href="about.html">About</a></li>
                                <li><a href="work.html">Work</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="my-detail">

                        <div class="white-spacing">
                            <h1>Alex Parker</h1>
                            <span>Web Developer</span>
                        </div>

                        <ul class="social-icon">
                            <li><a href="#" target="_blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" target="_blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" target="_blank" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#" target="_blank" class="github"><i class="fa fa-github"></i></a></li>
                        </ul>

                    </div>
                </div>
            </div>
            <!-- About Me (Left Sidebar) End -->

            <!-- Blog Post (Right Sidebar) Start -->
            <div class="col-md-9">
                <div class="col-md-12 page-body">
                    <div class="row">

                        <div class="sub-title">
                            <a href="{{route('blog.articles.index')}}"><h2>My Blog</h2></a>
                            <a href="contact.html"><i class="icon-envelope"></i></a>
                        </div>

                        <!-- Blog Post Start -->
                        @yield('article_list')
                        <!-- Blog Post End -->

                    </div>

                    @yield('article_show')


                    <!-- Subscribe Form Start -->
                    <div class="col-md-8 col-md-offset-2">
                        <form id="mc-form" method="post"
                              action="http://uipasta.us14.list-manage.com/subscribe/post?u=854825d502cdc101233c08a21&amp;id=86e84d44b7">

                            <div class="subscribe-form margin-top-20">
                                <input id="mc-email" type="email" placeholder="Email Address" class="text-input">
                                <button class="submit-btn" type="submit">Submit</button>
                            </div>
                            <p>Subscribe to my weekly newsletter</p>
                            <label for="mc-email" class="mc-label"></label>
                        </form>

                    </div>
                    <!-- Subscribe Form End -->

                </div>


                <!-- Footer Start -->
                <div class="col-md-12 page-body margin-top-50 footer">
                    <footer>
                        <ul class="menu-link">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="work.html">Work</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>

                        <p>© Copyright 2016 DevBlog. All rights reserved</p>


                        <!-- UiPasta Credit Start -->
                        <div class="uipasta-credit">Design By <a href="http://www.uipasta.com"
                                                                 target="_blank">UiPasta</a></div>
                        <!-- UiPasta Credit End -->


                    </footer>
                </div>
                <!-- Footer End -->


            </div>
            <!-- Blog Post (Right Sidebar) End -->

        </div>
    </div>
</div>


<!-- Back to Top Start -->
<a href="#" class="scroll-to-top"><i class="fa fa-long-arrow-up"></i></a>
<!-- Back to Top End -->


<!-- All Javascript Plugins  -->
<script type="text/javascript" src="{{ asset('template/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('template/js/plugin.js') }}"></script>

<!-- Main Javascript File  -->
<script type="text/javascript" src="{{ asset('template/js/scripts.js') }}"></script>


</body>
</html>
