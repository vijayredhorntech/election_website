<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>One-Nation</title>
    <!-- favicon -->
    <link rel="icon" href="{{asset('assets/images/logo.png')}}" sizes="20x20" type="image/png" />
    <!-- animate -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}" />
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}" />
    <!-- iconmoon -->
    <link rel="stylesheet" href="{{asset('assets/css/iconmoon.css')}}s">
    <!-- Hover CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/hover-min.css')}}" />
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('css')
    @stack('styles')

    <style>
        /* Remove arrows from number input */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        .disabled-link {
            pointer-events: none;
            color: grey;
            opacity: 0.6;
        }

        /* Added styles for labels and placeholders */
        .form-group label {
            color: #333;
            font-weight: 500;
            margin-bottom: 8px;
        }

        .form-control::placeholder {
            color: #999;
            opacity: 0.7;
        }
    </style>
</head>

<body>



    <!-- Header-top-start -->
    <div class="header-top about">
        <div class="container nav-container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="top-social">
                        <ul class="top-social-share">
                            <li>
                                <a href="{{route('index')}}"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="{{route('index')}}"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="{{route('index')}}"><i class="fab fa-pinterest-p"></i></a>
                            </li>
                            <li>
                                <a href="{{route('index')}}"><i class="fab fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="top-single-items">
                        <div class="top-single-item">
                            <div class="icon">
                                <i class="icon-phone"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">0123456789</h5>
                            </div>
                        </div>
                        <div class="top-single-item">
                            <div class="icon">
                                <i class="icon-envelope"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">info@gmail.com</h5>
                            </div>
                        </div>
                        <div class="top-single-item">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header-top-end -->

    <div class="header-style-01">
        <!-- support bar area end -->
        <nav class="navbar navbar-area navbar-expand-lg nav-style-01">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo-wrapper">
                        <a href="{{route('index')}}" class="logo">
                            <img src="{{asset('assets/images/logo.png')}}" style="height: 100px; width: auto" alt="" />
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                    <ul class="navbar-nav political">
                        <li class="menu-item-has-children current-menu-item">
                            <a href="{{ route('index') }}">Home</a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('index') }}">About</a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('index') }}">Events</a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('index') }}">News</a>
                            <div class="line style-01">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('index') }}">Media</a>
                            <div class="line style-01">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('index') }}">Contact</a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>

                        <li class="menu-item-has-children">
                            <!-- if the user is not logged in then show login button -->
                            @if(!auth()->check())
                            <a href="{{ route('login') }}"
                                class="{{ request()->routeIs('memberProfile') ? 'disabled-link' : '' }}">
                                Login
                            </a>
                            @endif
                            <!-- @if(auth()->check())
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger">Logout</button>
                            </form>
                            @else

                            @endif -->
                            <div class="line style-01">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="nav-right-content">

                    <div class="btn-wrapper" style="margin-left: 10px; ">
                        @if(!auth()->check())
                        <a href="{{route('joinUs')}}" class="boxed-btn btn-sanatory" style="background-color: black">
                            Join Us
                            <i class="icon-paper-plan"></i>
                        </a>
                        @else
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="boxed-btn btn-sanatory" style="background-color: black; border: 1px solid black">Logout</button>
                        </form>
                        @endif
                    </div>
                    <div class="btn-wrapper" style="margin-left: 10px">
                        <a href="{{route('donate')}}" class="boxed-btn btn-sanatory">
                            Donation Now
                            <i class="icon-paper-plan"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- navbar area end -->
    </div>

    {{$slot}}

    <!-- footer area start -->
    <footer class="footer-area line-bg" style="background-image: url({{asset('assets/images/line.png')}});">
        <div class="footer-top issue style-01">
            <div class="container">
                <div class="footer-top-border padding-bottom-60 padding-top-75">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="footer-widget widget">
                                <div class="about_us_widget wow animate__animated animate__fadeInUp">
                                    <a href="{{route('index')}}" class="footer-logo"> <img src="{{asset('assets/images/logo.png')}}" alt="footer logo"></a>
                                    <p>President represented Delaware for 36 years in the U.S. Senate before becoming the 47th Vice
                                        President of the United States.</p>
                                    <div class="social-links">
                                        <a href="{{route('index')}}"><i class="fab fa-facebook-f"></i></a>
                                        <a href="{{route('index')}}"><i class="fab fa-twitter"></i></a>
                                        <a href="{{route('index')}}"><i class="fab fa-linkedin-in"></i></a>
                                        <a href="{{route('index')}}"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <ul class="contact_info_list wow animate__animated animate__fadeInUp">
                                <li class="single-info-item">
                                    <div class="icon style-01">
                                        <i class="icon-location"></i>
                                    </div>
                                    <div class="details style-01">
                                        62 King Street, UK
                                    </div>
                                </li>
                                <li class="single-info-item">
                                    <div class="icon">
                                        <i class="icon-envelope"></i>
                                    </div>
                                    <div class="details">
                                        info@yourmail.com
                                    </div>
                                </li>
                                <li class="single-info-item">
                                    <div class="icon">
                                        <i class="icon-phone"></i>
                                    </div>
                                    <div class="details">
                                        009-215-5599
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 offset-lg-1 col-md-12">
                            <div class="footer-widget widget widget_subscribe subscribe-bg"
                                style="background-image: url({{asset('assets/images/Mask-flag.png')}});">
                                <div class="shape-01"></div>
                                <div class="shape-02"></div>
                                <div class="header-content">
                                    <h4 class="title">Join Our Newsletter</h4>
                                </div>
                                <form class="subscribe-form" action="index.html">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Email">
                                    </div>
                                    <div class="btn-wrapper">
                                        <a href="{{route('index')}}" class="boxed-btn btn-sanatory style-03">Subscribe Now <i class="icon-paper-plan"></i></a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom-border">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                            <div class="footer-widget widget widget_nav_menu wow animate__animated animate__fadeInUp">
                                <h4 class="widget-title">
                                    Explore
                                    <span class="line">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot style-02"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </span>
                                </h4>
                                <ul>
                                    <li><a href="{{route('index')}}">Our Story</a></li>
                                    <li><a href="{{route('index')}}">Team</a></li>
                                    <li><a href="{{route('index')}}">News</a></li>
                                    <li><a href="{{route('index')}}">Election</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                            <div class="footer-widget widget widget_nav_menu wow animate__animated animate__fadeInUp">
                                <h4 class="widget-title">
                                    Useful Links
                                    <span class="line">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot style-02"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </span>
                                </h4>
                                <ul>
                                    <li><a href="{{route('index')}}">Privacy Policy</a></li>
                                    <li><a href="{{route('index')}}">Terms and Conditions</a></li>
                                    <li><a href="{{route('index')}}">Support</a></li>
                                    <li><a href="{{route('index')}}">FAQ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                            <div class="footer-widget widget widget_nav_menu wow animate__animated animate__fadeInUp">
                                <h4 class="widget-title">
                                    Quick Links
                                    <span class="line">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot style-02"></span>
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                    </span>
                                </h4>
                                <ul>
                                    <li><a href="{{route('index')}}">About Us</a></li>
                                    <li><a href="{{route('index')}}">Services</a></li>
                                    <li><a href="{{route('index')}}">Contact</a></li>
                                    <li><a href="{{route('index')}}">News</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="copyright-area-inner">
                                    Copyright © 2022 One Nation. All Rights Reserved. Designed by <a href="https://himsoftsolution.com" target="_blank" style="color: #b30d00">Him Soft Solution</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- News Section End -->
    <!-- back to top area start -->
    <div class="back-to-top">
        <span class="back-top"><i class="fa fa-angle-up"></i></span>
    </div>
    <!-- back to top area end -->
    <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap -->
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- magnific popup -->
    <script src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script>
    <!-- wow -->
    <script src="{{asset('assets/js/wow.min.js')}}"></script>
    <!-- owl carousel -->
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <!-- waypoint -->
    <script src="{{asset('assets/js/waypoints.min.js')}}"></script>
    <!-- Mail Validation -->
    <script src="{{asset('assets/js/mail-validation.js')}}"></script>
    <!-- Contact js -->
    <script src="{{asset('assets/js/contact.js')}}"></script>
    <!-- counterup -->
    <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
    <!-- countdown -->
    <script src="{{asset('assets/js/jquery.countdown.min.js')}}"></script>
    <!-- VanillaTilt effect -->
    <script src="{{asset('assets/js/tilt.jquery.js')}}"></script>
    <!-- imageloaded -->
    <script src="{{asset('assets/js/imagesloaded.pkgd.min.js')}}"></script>
    <!-- isotope -->
    <script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
    <!-- R progressbar -->
    <script src="{{asset('assets/js/jQuery.rProgressbar.min.js')}}"></script>
    <!-- Progress Bar active  -->
    <script src="{{asset('assets/js/active.rProgressbar.js')}}"></script>
    <!-- main js -->
    <script src="{{asset('assets/js/main.js')}}"></script>

    @stack('scripts')
</body>

</html>