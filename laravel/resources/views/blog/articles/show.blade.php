@extends('blog.static.index')

@section('article_show')

<div class="col-md-12 content-page">
    <div class="col-md-12 blog-post">


        <!-- Post Headline Start -->
        <div class="post-title">

            <h1>{{$article->title}}</h1>
        </div>
        <!-- Post Headline End -->


        <!-- Post Detail Start -->
        <div class="post-info">
            <span>November 23, 2016 / by <a href="#" target="_blank">Alex Parker</a></span>
        </div>
        <!-- Post Detail End -->


        <p>{{$article->description}}</p>


        <!-- Post Image Start -->
        <div class="post-image margin-top-40 margin-bottom-40">
            <img src="images/blog/1.jpg" alt="">
            <p>Image source from <a href="#" target="_blank">Link</a></p>
        </div>
        <!-- Post Image End -->


        <p>{{$article->description_short}}</p>


        <!-- Post Video Tutorial Start -->
        <div class="video-box margin-top-40 margin-bottom-40">
            <div class="video-tutorial">
                <a class="video-popup" href="https://www.youtube.com/watch?v=O2Bsw3lrhvs" title="Video Tutorial">
                    <img src="images/blog/4.jpg" alt="">
                </a>
            </div>
            <p>Integrate video on magnific popup for fast page load.</p>
        </div>
        <!-- Post Video Tutorial End -->



        <p>{{$article->description_short}}</p>

        <!-- Post Blockquote Start -->
        <div class="post-quote margin-top-40 margin-bottom-40">
            <blockquote>Design is not just what is look like, Design is how it's work.</blockquote>
        </div>
        <!-- Post Blockquote End -->



        <p>{{$article->description_short}}</p>

        <!-- Post Coding (SyntaxHighlighter) Start -->
        <div class="margin-top-40 margin-bottom-40">
                                   <pre class="brush: js">
                                   /* Smooth Scroll */

                                    $('a.smoth-scroll').on("click", function (e) {
                                      var anchor = $(this);
                                      $('html, body').stop().animate({
                                      scrollTop: $(anchor.attr('href')).offset().top - 50
                                      }, 1000);
                                      e.preventDefault();
                                     });

                                   /* Scroll To Top */

                                   $(window).scroll(function(){
                                     if ($(this).scrollTop() >= 500) {
                                     $('.scroll-to-top').fadeIn();
                                     } else {
                                     $('.scroll-to-top').fadeOut();
                                     }
                                     });

	                               $('.scroll-to-top').click(function(){
                                   $('html, body').animate({scrollTop : 0},800);
                                   return false;
                                    });
                                  </pre>
        </div>
        <!-- Post Coding (SyntaxHighlighter) End -->



        <div class="post-title">
            <h2>How to implement?</h2>
        </div>


        <p>{{$article->description_short}}</p>



        <!-- Post Image Gallery Start -->
        <div class="row margin-top-40 margin-bottom-40">

            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="images/blog/7.jpg" class="image-popup" title="image Title">
                    <img src="images/blog/7.jpg" class="img-responsive" alt="">
                </a>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="images/blog/5.jpg" class="image-popup" title="image Title">
                    <img src="images/blog/5.jpg" class="img-responsive" alt="">
                </a>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">
                <a href="images/blog/6.jpg" class="image-popup" title="image Title">
                    <img src="images/blog/6.jpg" class="img-responsive" alt="">
                </a>
            </div>

        </div>
        <!-- Post Image Gallery End -->

        <!-- Post List Style Start -->
        <div class="list">
            <ul>
                <li>Ready to use Blog Template</li>
                <li>It have all the necessary features which you need to run blog</li>
                <li>Neat and Clean Typography</li>
                <li>Speed Optimization</li>
            </ul>
        </div>


        <div class="list list-style margin-top-40">
            <ul>
                <li>Ready to use Blog Template</li>
                <li>It have all the necessary features which you need to run blog</li>
                <li>Neat and Clean Typography</li>
                <li>Speed Optimization</li>
            </ul>
        </div>


        <div class="list list-style-2 margin-top-40">
            <ul>
                <li>Ready to use Blog Template</li>
                <li>It have all the necessary features which you need to run blog</li>
                <li>Neat and Clean Typography</li>
                <li>Speed Optimization</li>
            </ul>
        </div>
        <!-- Post List Style End -->




        <!-- Post Author Bio Box Start -->
        <div class="about-author margin-top-70 margin-bottom-50">

            <div class="picture">
                <img src="images/blog/author.png" class="img-responsive" alt="">
            </div>

            <div class="c-padding">
                <h3>Article By <a href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Visit Alex Website">Alex Parker</a></h3>
                <p>You can use about author box when someone guest post on your blog, Lorem ipsum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ad minim veniam.</p>
            </div>
        </div>
        <!-- Post Author Bio Box End -->




        <!-- You May Also Like Start -->
        <div class="you-may-also-like margin-top-50 margin-bottom-50">
            <h3>You may also like</h3>
            <div class="row">

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <a href="single.html"><p>Make mailchimp singup form working with ajax using jquery plugin</p></a>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <a href="single.html"><p>How to design elegant e-mail newsletter in html for wish christmas to your subscribers?</p></a>
                </div>

                <div class="col-md-4 col-sm-6 col-xs-12">
                    <a href="single.html"><p>How to customize a wordpress theme entirely from scratch using a child theme?</p></a>
                </div>

            </div>
        </div>

        @endsection