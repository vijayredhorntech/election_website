<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ $data['title'] ?? 'One Nation – A Movement for a Stronger Britain' }}</title>
    <meta name="description" content="{{ $data['meta_description'] ?? 'Join One Nation Party in building a better, fairer, and stronger future for Britain.' }}">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

        .nav-link {
            position: relative;
            color: #333;
            font-weight: 500;
            padding: 0.5rem 0;
            transition: color 0.3s ease;
        }



        .nav-link:hover::after {
            width: 100%;
        }

        /* Active state */
        .nav-link.active {
            color: #c41e3a;
            font-weight: 600;
        }

        .nav-link.active::after {
            width: 100%;
        }

        /* Optional: Add a subtle animation for the active state */
        @keyframes activeIndicator {
            from {
                width: 0;
            }

            to {
                width: 100%;
            }
        }

        .nav-link.active::after {
            animation: activeIndicator 0.3s ease forwards;
        }
    </style>
</head>

<body>



    <!-- Header-top-start -->
    <!-- <div class="header-top about">
        <div class="container nav-container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="top-social">
                        <ul class="top-social-share">
                            <li>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
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
                                <h5 class="title">07955555561</h5>
                            </div>
                        </div>
                        <div class="top-single-item">
                            <div class="icon">
                                <i class="icon-envelope"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">jsnichal@gmail.com</h5>
                            </div>
                        </div>
                        <div class="top-single-item">
                            <div class="icon">
                                <i class="icon-location"></i>
                            </div>
                            <div class="content">
                                <h5 class="title">62 King Street, Southall, Greater London UB2 4DB</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Header-top-end -->

    <div class="header-style-01">
        <!-- support bar area end -->
        <nav class="navbar navbar-area navbar-expand-lg nav-style-01" style="padding:0px">
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
                            <a href="{{ route('index') }}"
                                class="nav-link {{ request()->routeIs('index') ? 'active' : '' }}">
                                Home
                            </a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('about') }}"
                                class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">
                                About
                            </a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('leadership') }}"
                                class="nav-link {{ request()->routeIs('leadership') ? 'active' : '' }}">
                                Leadership
                            </a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('memberShipDetails') }}"
                                class="nav-link {{ request()->routeIs('memberShipDetails') ? 'active' : '' }}">
                                Membership
                            </a>
                            <div class="line style-01">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('events') }}"
                                class="nav-link {{ request()->routeIs('events') ? 'active' : '' }}">
                                Events
                            </a>
                            <div class="line style-01">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('news') }}"
                                class="nav-link {{ request()->routeIs('news') ? 'active' : '' }}">
                                News
                            </a>
                            <div class="line style-01">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children">
                            <a href="{{ route('contact') }}"
                                class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">
                                Contact
                            </a>
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
                        <a href="{{route('joinUs')}}" class="boxed-btn btn-sanatory" style="background-color: black; box-shadow:none">
                            Join Us
                            <i class="icon-paper-plan"></i>
                        </a>

                        @else
                        <a href="{{route('memberProfile')}}" class="boxed-btn btn-sanatory">
                            Profile
                            <i class="icon-paper-plan"></i>
                        </a>
                        @endif
                    </div>
                    <div class="btn-wrapper" style="margin-left: 10px">
                        <a href="{{route('donate')}}" class="boxed-btn btn-sanatory">
                            Donate Now
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
                <div class="footer-bottom-border">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="footer-widget widget widget_nav_menu wow animate__animated animate__fadeInUp">
                                <h4 class="widget-title">
                                    Quick Links
                                    <span class="line">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot style-02"></span>
                                    </span>
                                </h4>
                                <ul>
                                    <li><a href="{{route('about')}}">About Us</a></li>
                                    <li><a href="{{route('leadership')}}">Leadership</a></li>
                                    <li><a href="{{route('news')}}">News</a></li>
                                    <li><a href="{{route('events')}}">Events</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="footer-widget widget widget_nav_menu wow animate__animated animate__fadeInUp">
                                <h4 class="widget-title">
                                    Important Links
                                    <span class="line">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot style-02"></span>
                                    </span>
                                </h4>
                                <ul>
                                    <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                                    <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                                    <li><a href="{{route('whatIsMembership')}}">What is Membership?</a></li>
                                    <li><a href="{{route('contact')}}">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="footer-widget widget widget_nav_menu wow animate__animated animate__fadeInUp">
                                <h4 class="widget-title">
                                    Our Policies
                                    <span class="line">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot style-02"></span>
                                    </span>
                                </h4>
                                <ul>
                                    <li><a href="{{route('policies')}}#justice">Justice & Representation</a></li>
                                    <li><a href="{{route('policies')}}#education">Public Education</a></li>
                                    <li><a href="{{route('policies')}}#economy">Economic Growth</a></li>
                                    <li><a href="{{route('policies')}}#welfare">Welfare Reform</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                            <div class="footer-widget widget widget_nav_menu wow animate__animated animate__fadeInUp">
                                <h4 class="widget-title">
                                    Contact Info
                                    <span class="line">
                                        <span class="dot"></span>
                                        <span class="dot"></span>
                                        <span class="dot style-02"></span>
                                    </span>
                                </h4>
                                <ul>
                                    <li><a href="#">62 King Street, Southall, Greater London UB2 4DB</a></li>
                                    <li><a href="#">jsnichal@gmail.com</a></li>
                                    <li><a href="#">07955555561</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12" style="display: flex; justify-content: space-between; flex-wrap: wrap">
                                <div class="copyright-area-inner">
                                    &copy; {{ date('Y') }} One Nation. All Rights Reserved.
                                </div>
                                <div class="copyright-area-inner">
                                    Developed by: <a href="https://www.himsoftsolution.com" target="_blank" style="color: #c41e3a; font-weight: bold">Him Soft Solution</a>
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