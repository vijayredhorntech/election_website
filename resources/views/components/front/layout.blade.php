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
    <!-- <link rel="stylesheet" href="{{asset('assets/css/iconmoon.css')}}"> -->
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

        .mobileProfileList {
            display: none !important;
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

        .logoImage {
            height: 100px;
        }

        .mobileNavLinks {
            display: none !important;
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

        @media (max-width: 1200px) {
            .mobileProfileList {
                display: block !important;
            }
        }

        @media (max-width: 991px) {
            .mobileNavLinks {
                display: block !important;
            }
        }

        @media (max-width: 500px) {

            .logoImage {
                height: 60px;
            }
        }

        .nav-link.active::after {
            animation: activeIndicator 0.3s ease forwards;
        }

        .logoutButton {
            border: none;
            background-color: transparent;
            text-align: left;
            padding: 5px 20px;
        }

        .profileNavIcons {
            color: black !important;
            cursor: pointer;
            !important;
            padding: 5px 20px;
            transition: 0.3s ease !important;
            width: 100% !important;
            font-weight: 500 !important;
            font-size: 16px !important;
        }

        .profileNavIcons:hover {
            background-color: #7c0805;
            color: white !important;
            transition: 0.3s ease;
        }

        .cookie-popup {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: #222;
            color: #fff;
            padding: 15px 20px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            min-width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 999;
        }

        .cookie-popup a {
            color: #ffcc00;
            text-decoration: underline;
        }

        .cookie-popup button {
            background: #c41e3a;
            color: white;
            border: none;
            padding: 8px 15px;
            margin-left: 10px;
            cursor: pointer;
            border-radius: 3px;
        }

        .cookie-popup button:hover {
            background: #8f162c;
        }
    </style>
</head>

<body style="min-height: 100vh; position: relative">

    <div id="cookie-popup" class="cookie-popup">
        <p style="color: white; margin-top: 10px">This website uses cookies to ensure you get the best experience.
            <a href="{{route('cookie-policy')}}" target="_blank">Learn More</a>
        </p>
        <button id="accept-cookies">Accept</button>
    </div>


    <div class="header-style-01">
        <!-- support bar area end -->
        <nav class="navbar navbar-area navbar-expand-lg nav-style-01" style="padding:0px">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo-wrapper">
                        <a href="{{route('index')}}" class="logo">
                            <img src="{{asset('assets/images/logo.png')}}" style=" width: auto" class="logoImage" alt="" />
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bizcoxx_main_menu"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
                <!-- Replace your current navbar code with this updated version -->
                <div class="collapse navbar-collapse" id="bizcoxx_main_menu">
                    <ul class="navbar-nav political">
                        <li class="menu-item-has-children {{ request()->routeIs('index') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('index') }}" class="nav-link">
                                Home
                            </a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children {{ request()->routeIs('about') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('about') }}" class="nav-link">
                                About
                                <div class="line">
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot style-02"></span>
                                </div>
                            </a>
                        </li>
                        <li class="menu-item-has-children {{ request()->routeIs('leadership') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('leadership') }}" class="nav-link">
                                Leadership
                            </a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children {{ request()->routeIs('memberShipDetails') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('memberShipDetails') }}" class="nav-link">
                                Membership
                            </a>
                            <div class="line style-01">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children {{ request()->routeIs('events') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('events') }}" class="nav-link">
                                News & Events
                            </a>
                            <div class="line style-01">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children {{ request()->routeIs('womens-organization') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('womens-organization') }}" class="nav-link">
                                Women's Organisation
                            </a>
                            <div class="line style-01">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li style="border-bottom: 0pc" class="menu-item-has-children {{ request()->routeIs('contact') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('contact') }}" class="nav-link">
                                Contact
                            </a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        @if(!auth()->check())
                        <li style="border-top: 1px solid #b30d00;" class="menu-item-has-children mobileNavLinks {{ request()->routeIs('login') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('login') }}" class="nav-link">
                                Login
                            </a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        @else
                        <li style="border-top: 2px solid #b30d00; margin-top: 20px" class="menu-item-has-children mobileNavLinks  {{ request()->routeIs('memberProfile') ? 'current-menu-item' : '' }}">
                            <a href="{{ route('memberProfile') }}" class="nav-link">
                                Profile
                            </a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        @if(request()->routeIs('memberProfile'))
                        <li class="menu-item-has-children mobileNavLinks">
                            <a onclick="printCard()" class="nav-link">
                                Print Id
                            </a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        <li class="menu-item-has-children mobileNavLinks">
                            <a onclick="downloadCard()" class="nav-link">
                                Download Id
                            </a>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        @endif


                        <li class="menu-item-has-children mobileNavLinks {{ request()->routeIs('memberProfile') ? 'current-menu-item' : '' }}">
                            <form action="{{ route('logout') }}" method="post" style="">
                                @csrf
                                <button class="profileNavIcons logoutButton" style="padding: 0px 0px" type="submit">
                                    <i class="fa fa-right-from-bracket" style="margin-right:10px; "></i>
                                    Log Out
                                </button>
                            </form>
                            <div class="line">
                                <span class="dot"></span>
                                <span class="dot"></span>
                                <span class="dot style-02"></span>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="nav-right-content">

                    @if(!auth()->check())
                    <div class="btn-wrapper" style="margin-left: 10px; ">
                        <a href="{{route('joinUs')}}" class="boxed-btn btn-sanatory" style="background-color: black; box-shadow:none">
                            Join Us
                            <i class="icon-paper-plan"></i>
                        </a>
                    </div>
                    <div class="btn-wrapper" style="margin-left: 10px">
                        <a href="{{route('donate')}}" class="boxed-btn btn-sanatory">
                            Donate Now
                            <i class="icon-paper-plan"></i>
                        </a>
                    </div>
                    @else
                    <div class="btn-wrapper" style="margin-left: 10px; position: relative">
                        <div style="display: flex; align-items: center; cursor:pointer"
                            onclick="document.getElementById('editProfileDiv').style.display = document.getElementById('editProfileDiv').style.display === 'none' ? 'block' : 'none'">
                            <img src="{{auth()->user()?->member?->profile_photo ? asset('storage/'.auth()->user()?->member?->profile_photo) : asset('assets/images/default-profile.png') }}" alt="" style="height: 50px; width: 50px; border-radius: 50%; object-fit: cover; border: 1px solid gray">
                            <div style="display: flex; flex-direction: column; margin-left: 10px">
                                <span style="font-weight: bold; color: black; font-size: 18px">{{strtoupper(auth()->user()?->member?->first_name)}} {{strtoupper(auth()->user()?->member?->last_name)}}</span>
                                <p style="font-weight: 400; color: black; font-size: 13px; line-height: 10px">{{auth()->user()?->member?->email}}</p>
                            </div>
                            <div id="editProfileDiv" style="display: none; position: absolute; background-color: #f8f8f8; height: max-content; box-shadow: 5px 5px 20px 2px #b2b2b2; border-radius: 3PX;  padding: 10px 0px; min-width: 200px; width: 100%; top: 100%; right: 0px; z-index: 99">
                                <div style="display: flex; flex-direction: column;">
                                    @if(!request()->routeIs('memberProfile'))
                                    <a href="{{route('memberProfile')}}">
                                        <div class="profileNavIcons">
                                            <i class="fa fa-eye" style="margin-right:10px"></i>View Profile
                                        </div>
                                    </a>
                                    @endif
                                    <a href="{{route('memberBasicInformation', ['update' => 1])}}">
                                        <div class="profileNavIcons">
                                            <i class="fa fa-pencil" style="margin-right:10px"></i>Update Profile
                                        </div>
                                    </a>

                                    @if(request()->routeIs('memberProfile'))
                                    <a onclick="printCard()">
                                        <div class="profileNavIcons">
                                            <i class="fa fa-print" style="margin-right:10px"></i> Print ID
                                        </div>
                                    </a>
                                    @endif
                                    @if(request()->routeIs('memberProfile'))
                                    <a onclick="downloadCard()">
                                        <div class="profileNavIcons">
                                            <i class="fa fa-download" style="margin-right:10px"></i>
                                            Download ID
                                        </div>
                                    </a>
                                    @endif



                                    <form action="{{ route('logout') }}" method="post" style="margin-top: 10px; border-top: 1px solid #c9c9c9; padding-top: 10px">
                                        @csrf
                                        <button class="profileNavIcons logoutButton" type="submit">
                                            <i class="fa fa-right-from-bracket" style="margin-right:10px; margin-left: 5px;"></i>
                                            Log Out
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif



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
                                    <li><a href="{{route('events')}}">Events & News</a></li>
                                    <li><a href="{{route('whatIsMembership')}}">FAQ's</a></li>
                                    <li><a href="{{route('contact')}}">Contact Us</a></li>


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
                                    <li><a href="{{route('become_core_member')}}">Become Core Member</a></li>
                                    @if(!auth()->check())
                                    <li><a href="{{route('login')}}">Login</a></li>
                                    @endif
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
                                    <li><a href="{{route('policies')}}">Policies</a></li>
                                    <li><a href="{{route('privacy')}}">Privacy Policy</a></li>
                                    <li><a href="{{route('terms')}}">Terms & Conditions</a></li>
                                    <li><a href="{{route('donationTerms')}}">Donation Terms</a></li>
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
                                    <li style="color:white">62 King Street, Southall, Greater London UB2 4DB</li>
                                    <li style="color:white">info@one-nation.org.uk</li>
                                    <li style="color:white">07955555561</li>
                                </ul>
                                <div class="social-links mt-3">
                                    <a href="#" class="social-link" style="color: black"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="social-link" style="color: black"><i class="fab fa-linkedin"></i></a>
                                </div>
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

    <script>
        $(document).ready(function() {
            // Fix for mobile navigation links
            $('.navbar-nav li a').on('click', function(e) {
                // Get the href attribute
                var targetUrl = $(this).attr('href');

                // If it's a valid URL (not "#" or javascript:void(0))
                if (targetUrl && targetUrl !== '#' && !targetUrl.startsWith('javascript')) {
                    // Close the mobile menu
                    $('.navbar-collapse').collapse('hide');

                    // Navigate to the URL
                    window.location.href = targetUrl;
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let cookiePopup = document.getElementById("cookie-popup");
            let acceptButton = document.getElementById("accept-cookies");

            // Check if cookie consent is already given
            if (localStorage.getItem("cookieConsent")) {
                cookiePopup.style.display = "none";
            }

            // Handle Accept Button Click
            acceptButton.addEventListener("click", function() {
                localStorage.setItem("cookieConsent", "true");
                cookiePopup.style.display = "none";
            });
        });
    </script>

    @stack('scripts')
</body>

</html>