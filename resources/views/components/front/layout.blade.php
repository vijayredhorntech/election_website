<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>One-Nation</title>
    <!-- favicon -->
    <link rel="icon" href="{{asset('assets/images/logo.png')}}" sizes="20x20" type="image/png"/>
    <!-- animate -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}"/>
    <!-- bootstrap -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}"/>
    <!-- magnific popup -->
    <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}"/>
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}"/>
    <!-- iconmoon -->
    <link rel="stylesheet" href="{{asset('assets/css/iconmoon.css')}}s">
    <!-- Hover CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/hover-min.css')}}"/>
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}"/>
    <!-- responsive Stylesheet -->
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}"/>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>

<!-- Vote poll start here -->
<div class="poll-wrapper">
    <header>
        <div class="content">
            <h6 class="voter-name">Donate Now</h6>
        </div>
        <button class="poll-btn close-btn"><i class="fas fa-times"></i></button>
    </header>
    <div class="poll-area">
        <input type="checkbox" name="poll" id="opt-1">
        <input type="checkbox" name="poll" id="opt-2">
        <input type="checkbox" name="poll" id="opt-3">
        <input type="checkbox" name="poll" id="opt-4">
        <div class="opt-1 label">
            <div class="content-wrap">
                <div class="content">
                    <span class="circle"></span>
                    <span class="text">50 £</span>
                </div>
            </div>
        </div>
        <div class="opt-2 label">
            <div class="content-wrap">
                <div class="content">
                    <span class="circle"></span>
                    <span class="text">100 £</span>
                </div>
            </div>
        </div>
        <div class="opt-3 label">
            <div class="content-wrap">
                <div class="content">
                    <span class="circle"></span>
                    <span class="text">200 £</span>
                </div>
            </div>
        </div>
        <div class="opt-4 label">
            <div class="content-wrap">
                <div class="content">
                    <span class="circle"></span>
                    <span class="text">500 £</span>
                </div>
            </div>
        </div>
    </div>
    <div class="btn-wrapper vote-btn">
        <a href="{{route('index')}}" class="boxed-btn btn-sanatory">
            Donate Now
            <i class="fas fa-vote-yea"></i>
        </a>
    </div>
</div>
<div class="btn-wrapper poll-btn">
    <span class="boxed-btn btn-poll">
      Donate Now
      <i class="fas fa-vote-yea"></i>
    </span>
</div>
<!-- Vote poll start here -->

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
                        <a href="{{route('index')}}">Home</a>
                        <div class="line">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot style-02"></span>
                        </div>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{route('index')}}0">About</a>
                        <div class="line">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot style-02"></span>
                        </div>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{route('index')}}">Events</a>
                        <div class="line">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot style-02"></span>
                        </div>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{route('index')}}">News</a>
                        <div class="line style-01">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot style-02"></span>
                        </div>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{route('index')}}">Media</a>
                        <div class="line style-01">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot style-02"></span>
                        </div>
                    </li>
                    <li class="menu-item-has-children">
                        <a href="{{route('index')}}0">Contact</a>

                        <div class="line">
                            <span class="dot"></span>
                            <span class="dot"></span>
                            <span class="dot style-02"></span>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="nav-right-content">
                <div class="icon-part">
                    <ul>
                        <li id="search"><a href="{{route('index')}}"><i class="icon-search-svgrepo-com-1"></i></a></li>
                    </ul>
                </div>
                <div class="btn-wrapper">
                    <a href="{{route('index')}}" class="boxed-btn btn-sanatory">
                        Donation Now
                        <i class="icon-paper-plan"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- navbar area end -->
</div>
<div class="header-slider-one">
    <div class="header-area header-sanatory header-bg" style="background-image:url({{asset('assets/images/header-bg.png')}});">
        <div class="senatory-bg-img" style="background-image:url({{asset('assets/images/body-1.png')}});"></div>
        <svg viewBox="0 0 191.6 78.6" class="lottie-shape">
            <path class="path" fill="none" stroke="#DD131A" stroke-width="4.5" stroke-linecap="round" d="M186.3,17.5c0,0-36.4-18.2-92.3-14.7S1.4,29.6,2.9,47.8s34.4,25.9,62.6,28s79.9-1.5,108.2-14.9
        s12.8-31.8-5.9-37.7c-26.4-8.4-49.5-9.5-49.5-9.5"/>
        </svg>
        <div class="container nav-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="header-inner">
                        <!-- header inner -->
                        <h1 class="title">Together we can make Better world</h1>
                        <h5 class="subtitle-01">
                            <i class="fas fa-circle"></i>Vote for the best candidate
                        </h5>
                        <p>
                            President represented Delaware for 36 years in the U.S. Senate
                            before becoming the 47th Vice President of the United States. As
                            President, Harison will restore America’s leadership and build
                            our communities back better.
                        </p>
                        <div class="btn-wrapper  padding-top-35 padding-bottom-50">
                            <a href="{{route('index')}}" class="boxed-btn btn-sanatory style-01"><i class="fas fa-arrow-right"></i>Discover More</a>
                            <a class="video-play mfp-iframe" href="https://www.youtube.com/watch?v=-ZwQtICNbRc">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                    <!-- //.header inner -->
                </div>
            </div>
        </div>
    </div>
    <div class="header-area header-sanatory header-bg" style="background-image:url({{asset('assets/images/header-bg.png')}});">
        <div class="senatory-bg-img" style="background-image:url({{asset('assets/images/body-1.png')}});"></div>
        <svg viewBox="0 0 191.6 78.6" class="lottie-shape">
            <path class="path" fill="none" stroke="#DD131A" stroke-width="4.5" stroke-linecap="round" d="M186.3,17.5c0,0-36.4-18.2-92.3-14.7S1.4,29.6,2.9,47.8s34.4,25.9,62.6,28s79.9-1.5,108.2-14.9
        s12.8-31.8-5.9-37.7c-26.4-8.4-49.5-9.5-49.5-9.5"/>
        </svg>
        <div class="container nav-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="header-inner">
                        <!-- header inner -->
                        <h1 class="title">Together we can make Better world</h1>
                        <h5 class="subtitle-01">
                            <i class="fas fa-circle"></i>Vote for the best candidate
                        </h5>
                        <p>
                            President represented Delaware for 36 years in the U.S. Senate
                            before becoming the 47th Vice President of the United States. As
                            President, Harison will restore America’s leadership and build
                            our communities back better.
                        </p>
                        <div class="btn-wrapper  padding-top-35 padding-bottom-50">
                            <a href="{{route('index')}}" class="boxed-btn btn-sanatory style-01"><i class="fas fa-arrow-right"></i>Discover More</a>
                            <a class="video-play mfp-iframe" href="https://www.youtube.com/watch?v=-ZwQtICNbRc">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                    <!-- //.header inner -->
                </div>
            </div>
        </div>
    </div>
    <div class="header-area header-sanatory header-bg" style="background-image:url({{asset('assets/images/header-bg.png')}});">
        <div class="senatory-bg-img" style="background-image:url({{asset('assets/images/body-1.png')}});"></div>
        <svg viewBox="0 0 191.6 78.6" class="lottie-shape">
            <path class="path" fill="none" stroke="#DD131A" stroke-width="4.5" stroke-linecap="round" d="M186.3,17.5c0,0-36.4-18.2-92.3-14.7S1.4,29.6,2.9,47.8s34.4,25.9,62.6,28s79.9-1.5,108.2-14.9
        s12.8-31.8-5.9-37.7c-26.4-8.4-49.5-9.5-49.5-9.5"/>
        </svg>
        <div class="container nav-container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="header-inner">
                        <!-- header inner -->
                        <h1 class="title">Together we can make Better world</h1>
                        <h5 class="subtitle-01">
                            <i class="fas fa-circle"></i>Vote for the best candidate
                        </h5>
                        <p>
                            President represented Delaware for 36 years in the U.S. Senate
                            before becoming the 47th Vice President of the United States. As
                            President, Harison will restore America’s leadership and build
                            our communities back better.
                        </p>
                        <div class="btn-wrapper  padding-top-35 padding-bottom-50">
                            <a href="{{route('index')}}" class="boxed-btn btn-sanatory style-01"><i class="fas fa-arrow-right"></i>Discover More</a>
                            <a class="video-play mfp-iframe" href="https://www.youtube.com/watch?v=-ZwQtICNbRc">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                    <!-- //.header inner -->
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Header section End -->

<!-- Header bottom Section Start -->
<div class="header-bottom-area padding-top-120 padding-bottom-70"
     style="background-image: url({{asset('assets/images/dotted-shape.png')}})">
    <div class="container">
        <div class="row">
            <div class="testimonial-carousel">
                <div class="single-testimonial-item wow animate__animated animate__fadeInUp">
                    <img src="{{asset('assets/images/flag-shape.png')}}" class="shape-01" alt="" />
                    <div class="icon">
                        <span class="icon-sweet-hone"></span>
                    </div>
                    <div class="content">
                        <h4 class="title">City Traffic & Parking</h4>
                        <p class="description">
                            Efficiently orchestrate resource sucking human capital whereas
                            future-proof outsourcing. Credibly actualize one-to-one
                            meta-services.
                        </p>
                    </div>
                </div>
                <div class="single-testimonial-item wow animate__animated animate__fadeInUp animate__delay-1s">
                    <img src="{{asset('assets/images/flag-shape.png')}}" class="shape-01" alt="" />
                    <div class="icon">
                        <span class="icon-kids-house"></span>
                    </div>
                    <div class="content">
                        <h4 class="title">Parks, Fields & Recreation</h4>
                        <p class="description">
                            Efficiently orchestrate resource sucking human capital whereas
                            future-proof outsourcing. Credibly actualize one-to-one
                            meta-services.
                        </p>
                    </div>
                </div>
                <div class="single-testimonial-item wow animate__animated animate__fadeInUp animate__delay-2s">
                    <img src="{{asset('assets/images/flag-shape.png')}}" class="shape-01" alt="" />
                    <div class="icon">
                        <span class="icon-gym"></span>
                    </div>
                    <div class="content">
                        <h4 class="title">Sports & Fitness Center</h4>
                        <p class="description">
                            Efficiently orchestrate resource sucking human capital whereas
                            future-proof outsourcing. Credibly actualize one-to-one
                            meta-services.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Header bottom section end -->

<!-- Our party section start -->
<div class="our-party-section-area">
    <div class="party-bg" style="background-image: url({{asset('assets/images/leader-01.png')}})"></div>
    <img src="{{asset('assets/images/party-shape.png')}}" class="party-shape" alt="" />
    <img src="{{asset('assets/images/party-shape-02.png')}}" class="party-shape-01" alt="" />
    <div class="party-shape-02"></div>
    <div class="party-shape-03"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="party-single-item vision">
                    <div class="content">
                        <div class="subtitle wow animate__animated animate__fadeInUp">
                            <p>Our Party Visions</p>
                            <div class="icon">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                            </div>
                        </div>
                        <h4 class="title wow animate__animated animate__fadeInUp">Join The Fight for Our Freedom</h4>
                        <p class="description wow animate__animated animate__fadeInUp">
                            Every pleasures is to welcomed pain avoided owing to the duty the obligations of business it will frequently occur that pleasures have to.
                        </p>
                        <p class="description none wow animate__animated animate__fadeInUp">
                            How all this mistaken idea of denouncing pleasure and praising
                            pain was born & we will give you a complete account of the
                            system.
                        </p>
                        <div class="feedback wow animate__animated animate__fadeInUp">
                            <span>99.8%</span>
                            <p>Positive Feedback From Peoples</p>
                        </div>
                    </div>
                    <div class="  btn-wrapper margin-top-35  wow animate__animated animate__fadeInUp">
                        <a href="about.html" class="boxed-btn btn-sanatory style-02"><i class="fas fa-arrow-right"></i>Read More Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our party section end -->

<!-- Donation Section Start -->
<div class="donation-section-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="party-single-item margin-bottom-50">
                    <div class="content">
                        <div class="subtitle wow animate__animated animate__fadeInUp">
                            <p>Contribute For Us</p>
                            <div class="icon">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                            </div>
                        </div>
                        <h4 class="title style-01 wow animate__animated animate__fadeInUp">Make A Donation For Your Country</h4>
                        <p class="description style-01 wow animate__animated animate__fadeInUp">
                            Every pleasures is to welcomed pain avoided owing to the duty
                            the obligations of business it will frequently occur that
                            pleasures have to be repudiated.
                        </p>
                    </div>
                    <div class="btn-wrapper margin-top-35 wow animate__animated animate__fadeInUp">
                        <a href="{{route('index')}}" class="price-btn">£50</a>
                        <a href="{{route('index')}}" class="price-btn">£100</a>
                        <a href="{{route('index')}}" class="price-btn">£200</a>
                        <a href="{{route('index')}}" class="price-btn">£500</a>
                        <a href="{{route('index')}}" class="boxed-btn donate-btn btn-sanatory">Donate Now <i class="fas fa-paper-plane"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="donate-bg" style="background-image: url({{asset('assets/images/Asset-01.png')}})">
                    <div class="donate-bg-02" style="background-image: url({{asset('assets/images/donation.png')}})"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Donation Section End -->

<!-- Vote Section Start -->
<div class="vote-section-area vote-bg margin-top-120" style="background-image: url({{asset('assets/images/vote-banner.png')}})">
    <img src="{{asset('assets/images/party-shape.png')}}" class="party-shape" alt="" />
    <img src="{{asset('assets/images/party-shape-02.png')}}" class="party-shape-01" alt="" />
    <div class="party-shape-02"></div>
    <div class="party-shape-03"></div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-lg-7">
                <div class="party-single-item style-01">
                    <div class="content">
                        <div class="subtitle wow animate__animated animate__fadeInUp">
                            <p>Vote Our Party</p>
                            <div class="icon">
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                                <i class="icon-star"></i>
                            </div>
                        </div>
                        <h4 class="title wow animate__animated animate__fadeInUp">Your Support make help us</h4>
                        <p class="description style-01 wow animate__animated animate__fadeInUp">
                            Every pleasures is to welcomed pain avoided owing to the duty
                            the obligations of business it will frequently occur that
                            pleasures have to be repudiated.
                        </p>
                        <div class="video-section wow animate__animated animate__fadeInUp">
                            <span>Watch the video</span>
                            <a class="video-play style-01 mfp-iframe" href="https://www.youtube.com/watch?v=-ZwQtICNbRc">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vote Section End -->

<!-- Campaigns Section Start -->
<div class="campaign-section-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="section-title">
                    <div class="subtitle wow animate__animated animate__fadeInUp">
                        <div class="icon">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div>
                        <p>Join Campaigns</p>
                        <div class="icon">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div>
                    </div>
                    <h4 class="title wow animate__animated animate__fadeInUp">Upcoming Events</h4>
                    <p class="description wow animate__animated animate__fadeInUp">
                        Excepteur sint occae cat cupidatat non proident, sunt in culpa
                        qui officia deser unt mollit anim.
                    </p>
                </div>
            </div>
        </div>
        <div class="campaign-single-item">
            <div class="row">
                <div class="col-lg-7">
                    <div class="campaign-bg" style="background-image: url({{asset('assets/images/audience.png')}})">
                        <div id="mycountdown" class="counter-single-item">
                            <ul>
                                <li class="counter-item wow animate__animated animate__fadeInUp">
                                    <span class="days">5</span>
                                    <h6>Days</h6>
                                </li>
                                <li class="counter-item wow animate__animated animate__fadeInUp animate__delay-1s">
                                    <span class="hours">3</span>
                                    <h6>Hours</h6>
                                </li>
                                <li class="counter-item wow animate__animated animate__fadeInUp animate__delay-2s">
                                    <span class="mins">26</span>
                                    <h6>Minuts</h6>
                                </li>
                                <li class="counter-item wow animate__animated animate__fadeInUp animate__delay-3s">
                                    <span class="secs">10</span>
                                    <h6>Seconds</h6>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="campaign-list-item">
                        <div class="list-single-items">
                            <div class="content">
                                <div class="designation">
                                    <span class="event">Event</span>
                                    <span class="date">20-02-2025</span>
                                </div>
                                <a href="event-single.html"><h5 class="title">Let’s Make Country Great with Razniti</h5></a>
                                <p>
                                    Every pleasures is to welcomed pain avoided owing to the
                                    duty the obligations of business.
                                </p>
                            </div>
                        </div>
                        <div class="list-single-items">
                            <div class="content">
                                <div class="designation">
                                    <span class="event">Event</span>
                                    <span class="date">25-02-2025</span>
                                </div>
                                <a href="event-single.html"><h5 class="title">Lets meet & help for education in tax</h5></a>
                                <p>
                                    Every pleasures is to welcomed pain avoided owing to the
                                    duty the obligations of business.
                                </p>
                            </div>
                        </div>
                        <div class="list-single-items">
                            <div class="content">
                                <div class="designation">
                                    <span class="event">Event</span>
                                    <span class="date">01-03-2025</span>
                                </div>
                                <a href="event-single.html"><h5 class="title">Lets meet for protecting eco system</h5></a>
                                <p class="style-01">
                                    Every pleasures is to welcomed pain avoided owing to the
                                    duty the obligations of business.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Campaigns Section End -->

<!-- Volunteer Section Start -->
<div class="volunteer-section-area">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-9">
                <div class="section-title">
                    <div class="subtitle wow animate__ animate__fadeInUp">
                        <div class="icon">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div>
                        <p>Become A Volunteer</p>
                        <div class="icon">
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                        </div>
                    </div>
                    <h4 class="title wow animate__animated animate__fadeInUp">Meet Our Party Volunteer</h4>
                    <p class="description wow animate__animated animate__fadeInUp">
                        Every pleasures is to welcomed pain avoided owing to the duty
                        the obligations of business it will frequently.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="testimonial-carousel-two">
                <div class="volunteer-single-items">
                    <div class="thum">
                        <img src="{{asset('assets/images/volunteer-03.png')}}" alt="" />
                    </div>
                    <div class="content">
                        <div class="author-meta">
                            <span class="author-name">Pier Goodman</span>
                            <p class="designation">MANAGING DIRECTOR</p>
                        </div>
                        <div class="social-links">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-linkedin-in"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>
                </div>
                <div class="volunteer-single-items">
                    <div class="thum">
                        <img src="{{asset('assets/images/volunteer-01.png')}}" alt="" />
                    </div>
                    <div class="content">
                        <div class="author-meta">
                            <span class="author-name">Pier Goodman</span>
                            <p class="designation">MANAGING DIRECTOR</p>
                        </div>
                        <div class="social-links">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-linkedin-in"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>
                </div>
                <div class="volunteer-single-items">
                    <div class="thum">
                        <img src="{{asset('assets/images/volunteer-02.png')}}" alt="" />
                    </div>
                    <div class="content">
                        <div class="author-meta">
                            <span class="author-name">Pier Goodman</span>
                            <p class="designation">MANAGING DIRECTOR</p>
                        </div>
                        <div class="social-links">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-linkedin-in"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>
                </div>
                <div class="volunteer-single-items">
                    <div class="thum">
                        <img src="{{asset('assets/images/volunteer-04.png')}}" alt="" />
                    </div>
                    <div class="content">
                        <div class="author-meta">
                            <span class="author-name">Pier Goodman</span>
                            <p class="designation">MANAGING DIRECTOR</p>
                        </div>
                        <div class="social-links">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-linkedin-in"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>
                </div>
                <div class="volunteer-single-items">
                    <div class="thum">
                        <img src="{{asset('assets/images/valunteer-05.png')}}" alt="" />
                    </div>
                    <div class="content">
                        <div class="author-meta">
                            <span class="author-name">Pier Goodman</span>
                            <p class="designation">MANAGING DIRECTOR</p>
                        </div>
                        <div class="social-links">
                            <i class="fab fa-facebook-f"></i>
                            <i class="fab fa-twitter"></i>
                            <i class="fab fa-linkedin-in"></i>
                            <i class="fab fa-youtube"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Volunteer Section End -->

<!-- Counter Section Start -->
<div class="counter-section-area style-02">
    <div class="container">
        <div class="counter-section-inner">
            <img src="{{asset('assets/images/party-shape.png')}}" class="counter-shape" alt="Shape">
            <img src="{{asset('assets/images/party-shape.png')}}" class="counter-shape-01" alt="Shape">
            <img src="{{asset('assets/images/party-shape-02.png')}}" class="counter-shape-02" alt="Shape">
            <img src="{{asset('assets/images/party-shape-02.png')}}" class="counter-shape-03" alt="Shape">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <div class="single-counterup-01 style-04">
                        <div class="content">
                            <div class="count-wrap"><span class="count-num">40</span>k+</div>
                            <h4 class="title">Total Volunteer</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-counterup-01 style-02">
                        <div class="content">
                            <div class="count-wrap"><span class="count-num">23</span>k+</div>
                            <h4 class="title">Campaigns</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-counterup-01 style-04">
                        <div class="content">
                            <div class="count-wrap"><span class="count-num">35</span>k+</div>
                            <h4 class="title">Vote Paper</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-counterup-01 style-01">
                        <div class="content">
                            <div class="count-wrap"><span class="count-num">66</span>k+</div>
                            <h4 class="title">Coverage Area</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counter Section End -->

<!-- Testimonial Section Start -->
<div class="testimonial-section-area testimonial-bg margin-top-120"
     style="background-image: url({{asset('assets/images/team.png')}});">
    <div class="shapes">
        <img src="{{asset('assets/images/shape-04.png')}}" class="shape-01" alt="">
        <img src="{{asset('assets/images/shape-03.png')}}" class="shape-02" alt="">
        <div class="shape-03"></div>
        <div class="shape-04"></div>
    </div>
    <div class="shapes style-01">
        <img src="{{asset('assets/images/shape-04.png')}}" class="shape-01" alt="">
        <img src="{{asset('assets/images/shape-03.png')}}" class="shape-02" alt="">
        <div class="shape-03"></div>
        <div class="shape-04"></div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="testimonial-carousel-area">
                    <div class="testimonial-carousel-three">
                        <div class="party-single-item style-02">
                            <div class="content">
                                <div class="subtitle">
                                    <p>Public Comments</p>
                                    <div class="icon">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                    </div>
                                </div>
                                <h4 class="title">People's Say About us</h4>
                                <div class="quotes">
                                    <p class="description">"The theories largely focus on the development of agriculture, and the population and organizational pressure that followed and resulted in state formation. One of the most prominent theories of early and primary state formation is the hydraulic hypothesis"</p>
                                    <i class="icon-quotes"></i>
                                    <img src="{{asset('assets/images/shape-02.png')}}" class="quotes-shape" alt="">
                                </div>
                                <div class="author-meta">
                                    <span class="author-name">William Smith</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="party-single-item style-02">
                            <div class="content">
                                <div class="subtitle">
                                    <p>Public Comments</p>
                                    <div class="icon">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                    </div>
                                </div>
                                <h4 class="title">People's Say About us</h4>
                                <div class="quotes">
                                    <p class="description">" Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum Occaecat cupidatat non proident,sunt in culpa qui officia
                                        deserunt mollit anim id, sint occaecat cupidatat non proident, sunt in culpa qui "</p>
                                    <i class="icon-quotes"></i>
                                    <img src="{{asset('assets/images/shape-02.png')}}" class="quotes-shape" alt="">
                                </div>
                                <div class="author-meta">
                                    <span class="author-name">William Smith</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                        <div class="party-single-item style-02">
                            <div class="content">
                                <div class="subtitle">
                                    <p>Public Comments</p>
                                    <div class="icon">
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                        <i class="icon-star"></i>
                                    </div>
                                </div>
                                <h4 class="title">People's Say About us</h4>
                                <div class="quotes">
                                    <p class="description">" Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                        deserunt mollit anim id est laborum Occaecat cupidatat non proident,sunt in culpa qui officia
                                        deserunt mollit anim id, sint occaecat cupidatat non proident, sunt in culpa qui "</p>
                                    <i class="icon-quotes"></i>
                                    <img src="{{asset('assets/images/shape-02.png')}}" class="quotes-shape" alt="">
                                </div>
                                <div class="author-meta">
                                    <span class="author-name">William Smith</span>
                                    <span class="line"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial Secition End -->

<!-- footer area start -->
<footer class="footer-area line-bg" style="background-image: url(assets/img/line.png);">
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
                                Copyright © 2022 One Nation. All Rights Reserved. Designed by <a href="https://himsoftsolution.com" target="_blank" style="col">Him Soft Solution</a>
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
</body>

</html>
