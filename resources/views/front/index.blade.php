<x-front.layout>
    <!-- Hero Swiper Section -->
    <div class="banner-carousel">
        <div class="swiper hero-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide" style="background-image: url({{asset('assets/images/slide1.jpeg')}})">
                  
                </div>
                <div class="swiper-slide" style="background-image: url({{asset('assets/images/slide2.jpeg')}})">
                
                </div>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>



                     <div class="slider-content" style="margin-top:20px">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="slider-text-box">
                                        <span class="slider-subtitle">WELCOME TO ONE NATION</span>
                                        <h1 class="slider-title">
                                            A Movement for a 
                                            <div class="highlight-text">Stronger Britain</div>
                                        </h1>
                                        <p class="slider-text">Dedicated to addressing injustices, resolving public issues, and ensuring fair representation, inclusivity, and accountability.</p>
                                        <div class="slider-buttons">
                                            <a href="{{ route('joinUs') }}" class="btn btn-primary btn-lg">
                                                Join Us Today <i class="fas fa-arrow-right"></i>
                                            </a>
                                            <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg">
                                                Learn More <i class="fas fa-info-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="slider-text-box">
                                        <span class="slider-subtitle">BUILDING OUR FUTURE</span>
                                        <h1 class="slider-title">
                                            Justice, Education & 
                                            <div class="highlight-text">Unity</div>
                                        </h1>
                                        <p class="slider-text">Britain has provided shelter and dignity in difficult times—now, it's time to work together for a 
                                              better, fairer future. Join us in shaping a more inclusive tomorrow.</p>
                                        <div class="slider-buttons">
                                            <a href="{{ route('policies') }}" class="btn btn-primary btn-lg">
                                                Our Policies <i class="fas fa-file-alt"></i>
                                            </a>
                                            <a href="{{ route('whatIsMembership') }}" class="btn btn-outline-light btn-lg">
                                                Why Join? <i class="fas fa-question-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              



    <!-- Features Section -->
    <section class="features-section py-5" data-aos="fade-up">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-subtitle" data-aos="fade-up">WHAT WE STAND FOR</span>
                <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Our Core Values</h2>
                <div class="title-separator" data-aos="fade-up" data-aos-delay="200">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Justice & Representation</h4>
                            <p>Ensuring every member has a voice in addressing public concerns and fair representation in government.</p>
                            <a href="{{ route('policies') }}#justice" class="feature-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Public Education</h4>
                            <p>Spreading awareness on social justice, human rights, and sustainability through community programs.</p>
                            <a href="{{ route('policies') }}#education" class="feature-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card">
                        <div class="icon-wrapper">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Economic Growth</h4>
                            <p>Supporting British businesses, creating jobs, and implementing fair taxation policies.</p>
                            <a href="{{ route('policies') }}#economy" class="feature-link">Learn More <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="vision-section py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="vision-content">
                        <span class="section-subtitle">OUR VISION</span>
                        <h2 class="section-title">Building a Better Britain Together</h2>
                        <div class="title-separator">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="vision-list">
                            <div class="vision-card">
                                <ul class="check-list">
                                    <li data-aos="fade-up" data-aos-delay="100">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Stronger border control and fair immigration system</span>
                                    </li>
                                    <li data-aos="fade-up" data-aos-delay="200">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Supporting British businesses and workers</span>
                                    </li>
                                    <li data-aos="fade-up" data-aos-delay="300">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Responsible welfare system preventing abuse</span>
                                    </li>
                                    <li data-aos="fade-up" data-aos-delay="400">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Promoting national unity and representation</span>
                                    </li>
                                    <li data-aos="fade-up" data-aos-delay="500">
                                        <i class="fas fa-check-circle"></i>
                                        <span>Ensuring compliance with electoral regulations</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="vision-image-wrapper">
                        <img src="{{ asset('assets/images/one_nation.webp') }}" alt="Our Vision" class="img-fluid rounded">
                        <div class="floating-badge">
                            <span>Our</span>
                            <strong>Vision</strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="news-section py-5">
        <div class="container">
            <div class="section-header text-center mb-5">
                <span class="section-subtitle" data-aos="fade-up">STAY INFORMED</span>
                <h2 class="section-title" data-aos="fade-up" data-aos-delay="100">Latest Updates</h2>
                <div class="title-separator" data-aos="fade-up" data-aos-delay="200">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="row">
                @foreach($data['latest_news'] as $index => $news)
                <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="{{ 300 + ($index * 100) }}">
                    <div class="news-card">
                        @if($news->image)
                        <div class="news-image-wrapper">
                            <img src="{{ asset($news->image) }}" alt="{{ $news->title }}" class="news-image">
                            <div class="news-date">
                                <span>{{ $news->created_at->format('d') }}</span>
                                <span>{{ $news->created_at->format('M') }}</span>
                            </div>
                        </div>
                        @endif
                        <div class="news-content">
                            <h3>{{ $news->title }}</h3>
                            <p>{{ Str::limit($news->excerpt, 100) }}</p>
                            <a href="{{ route('news.show', $news->slug) }}" class="read-more">
                                Read More <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action Section -->
    <section class="cta-section py-5" style="background-image: url({{asset('assets/images/cta-bg.jpg')}})">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <span class="section-subtitle text-white">Get Involved</span>
                    <h2 class="text-white mb-4">Join One Nation Today</h2>
                    <p class="text-white mb-4">Be part of a movement that values justice, education, and unity. Together, we can build a better Britain for everyone.</p>
                    <div class="cta-buttons">
                        <a href="{{ route('joinUs') }}" class="btn btn-primary btn-lg">Become a Member <i class="fas fa-users"></i></a>
                        <a href="{{ route('donate') }}" class="btn btn-outline-light btn-lg">Support Our Cause <i class="fas fa-heart"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
    /* Update color variables */
    :root {
        --primary-color: #c41e3a; /* Main theme red/burgundy color */
        --primary-hover: #a01830;
        --primary-light: rgba(196, 30, 58, 0.2);
        --accent-color: #dc3545;
    }

    /* Update all blue (#007bff) instances to the theme color */
    .slider-subtitle::before {
        background: var(--primary-color);
    }

    .highlight-text {
        color: var(--primary-color);
    }

    .highlight-text::before {
        background: var(--primary-light);
    }

    .btn-primary {
        background: #c41e3a;  /* Main red color */
        border: none;
        color: #fff;
        box-shadow: 0 4px 15px rgba(196, 30, 58, 0.3);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: #a01830;  /* Darker shade of red */
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(196, 30, 58, 0.5);
    }

    .btn-outline-light:hover {
        color: var(--primary-color);
    }

    .swiper-pagination-bullet-active {
        background: var(--primary-color);
    }

    .section-subtitle {
        color: var(--primary-color);
    }

    .title-separator span {
        background: var(--primary-color);
    }

    .icon-wrapper {
        background: linear-gradient(45deg, #c41e3a, #dc3545);
    }

    .feature-link {
        color: #c41e3a;
    }

    .feature-link:hover {
        color: #a01830;
    }

    .check-list i {
        color: #c41e3a;
    }

    .floating-badge {
        background: #c41e3a;
    }

    .news-date {
        background: #c41e3a;
    }

    /* Update any other color-related styles */
    .feature-card:hover {
        border-color: var(--primary-color);
    }

    .read-more {
        color: #c41e3a;
    }

    .read-more:hover {
        color: #a01830;
    }

    /* CTA Section enhancement */
    .cta-section::before {
        background: linear-gradient(to right, rgba(196, 30, 58, 0.9), rgba(220, 53, 69, 0.8));
    }

    /* Update swiper navigation colors */
    .swiper-container {
        --swiper-theme-color: var(--primary-color);
    }

    /* Update AOS animations color accents */
    [data-aos] {
        --aos-primary: var(--primary-color);
    }

    .banner-carousel {
        position: relative;
    }

    .swiper-slide {
        height: 600px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .swiper-slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .swiper-slide-active .slider-text-box {
        animation: fadeInUp 1s ease forwards;
    }

    .swiper-slide-active .slider-subtitle {
        animation: fadeInLeft 1s ease 0.2s forwards;
    }

    .swiper-slide-active .slider-title {
        animation: fadeInRight 1s ease 0.4s forwards;
    }

    .swiper-slide-active .slider-text {
        animation: fadeInUp 1s ease 0.6s forwards;
    }

    .swiper-slide-active .slider-buttons {
        animation: fadeInUp 1s ease 0.8s forwards;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInLeft {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInRight {
        from {
            opacity: 0;
            transform: translateX(20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .swiper-slide {
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .swiper-container {
        --swiper-theme-color: #007bff;
        --swiper-navigation-size: 44px;
    }

    .swiper-slide {
        height: 600px;
        background-size: cover;
        background-position: center;
        position: relative;
    }

    .swiper-slide::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }

    .slider-content {
        position: relative;
        height: 100%;
        display: flex;
        align-items: center;
        color: white;
        z-index: 1;
    }

    .slider-text-box {
        background: rgba(0, 0, 0, 0.4);
        padding: 40px;
        border-radius: 15px;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        max-width: 700px;
    }

    .slider-subtitle {
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 4px;
        color: #fff;
        margin-bottom: 20px;
        display: block;
        opacity: 0.9;
        font-weight: 500;
        position: relative;
        padding-left: 60px;
    }

    .slider-subtitle::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        width: 40px;
        height: 2px;
        background: #007bff;
        transform: translateY(-50%);
    }

    .slider-title {
        font-size: 52px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 25px;
        color: #fff;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    }

    .highlight-text {
        color: #007bff;
        display: inline-block;
        position: relative;
        padding: 0 10px;
        margin-top: 10px;
    }

    .highlight-text::before {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 30%;
        background: rgba(0, 123, 255, 0.2);
        z-index: -1;
        transform: skewX(-15deg);
    }

    .slider-text {
        font-size: 18px;
        line-height: 1.8;
        margin-bottom: 30px;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 400;
    }

    .slider-buttons {
        display: flex;
        gap: 20px;
    }

    .btn-lg {
        padding: 15px 35px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        border-radius: 50px;
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: #c41e3a;  /* Main red color */
        border: none;
        color: #fff;
        box-shadow: 0 4px 15px rgba(196, 30, 58, 0.3);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        background: #a01830;  /* Darker shade of red */
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(196, 30, 58, 0.5);
    }

    .btn-outline-light {
        border: 2px solid #fff;
        background: transparent;
    }

    .btn-outline-light:hover {
        background: #fff;
        color: #c41e3a;
    }

    .btn i {
        margin-left: 8px;
        font-size: 14px;
        transition: transform 0.3s ease;
    }

    .btn:hover i {
        transform: translateX(5px);
    }

    .swiper-button-prev,
    .swiper-button-next {
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        backdrop-filter: blur(5px);
    }

    .swiper-button-prev:after,
    .swiper-button-next:after {
        font-size: 20px;
        color: #fff;
    }

    .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: rgba(255, 255, 255, 0.5);
        opacity: 1;
    }

    .swiper-pagination-bullet-active {
        background: #c41e3a !important;
    }

    @media (max-width: 768px) {
        .slider-text-box {
            padding: 25px;
        }

        .slider-title {
            font-size: 36px;
        }

        .slider-text {
            font-size: 16px;
        }

        .slider-buttons {
            flex-direction: column;
            gap: 15px;
        }

        .btn-lg {
            width: 100%;
            text-align: center;
        }
    }

    /* Section Styles */
    .section-subtitle {
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #007bff;
        margin-bottom: 10px;
        display: block;
    }

    .section-title {
        font-size: 36px;
        font-weight: 700;
        margin-bottom: 30px;
    }

    /* Button Enhancements */
    .btn-lg {
        padding: 15px 30px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .btn i {
        margin-left: 8px;
        transition: transform 0.3s ease;
    }

    .btn:hover i {
        transform: translateX(5px);
    }

    /* Enhanced button hover effects */
    .btn-lg::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: width 0.6s ease, height 0.6s ease;
    }

    .btn-lg:hover::before {
        width: 300px;
        height: 300px;
    }

    /* Enhance text shadow for better readability */
    .slider-title, .highlight-text {
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    }

    .slider-text {
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
    }

    /* Title Separator */
    .title-separator {
        display: flex;
        justify-content: center;
        gap: 8px;
        margin: 20px 0;
    }

    .title-separator span {
        width: 30px;
        height: 4px;
        background: #c41e3a;
        border-radius: 2px;
    }

    .title-separator span:nth-child(2) {
        width: 15px;
    }

    /* Feature Cards */
    .feature-card {
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        transition: all 0.3s ease;
        height: 100%;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .icon-wrapper {
        width: 70px;
        height: 70px;
        background: linear-gradient(45deg, #c41e3a, #dc3545);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .icon-wrapper i {
        font-size: 28px;
        color: #fff;
    }

    .feature-link {
        color: #c41e3a;
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 15px;
        transition: all 0.3s ease;
    }

    .feature-link:hover {
        color: #a01830;
        gap: 12px;
    }

    /* Vision Section */
    .vision-card {
        background: #fff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
    }

    .check-list li {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
        padding-left: 0;
    }

    .check-list i {
        color: #28a745;
        font-size: 20px;
    }

    .vision-image-wrapper {
        position: relative;
        padding: 20px;
    }

    .floating-badge {
        position: absolute;
        top: 40px;
        right: 0;
        background: #c41e3a;
        color: #fff;
        padding: 15px 25px;
        border-radius: 10px;
        display: flex;
        flex-direction: column;
        align-items: center;
        box-shadow: 0 5px 15px rgba(0,123,255,0.3);
    }

    .floating-badge span {
        font-size: 14px;
        opacity: 0.9;
    }

    .floating-badge strong {
        font-size: 24px;
        font-weight: 700;
    }

    /* News Cards */
    .news-card {
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
    }

    .news-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .news-image-wrapper {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .news-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .news-card:hover .news-image {
        transform: scale(1.1);
    }

    .news-date {
        position: absolute;
        top: 20px;
        right: 20px;
        background: #c41e3a;
        color: #fff;
        padding: 10px;
        border-radius: 10px;
        text-align: center;
        min-width: 60px;
    }

    .news-date span {
        display: block;
    }

    .news-date span:first-child {
        font-size: 20px;
        font-weight: 700;
    }

    .news-content {
        padding: 25px;
    }

    .news-content h3 {
        font-size: 20px;
        margin-bottom: 15px;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .feature-card, .vision-card, .news-card {
            margin-bottom: 20px;
        }
        
        .floating-badge {
            position: relative;
            top: 0;
            right: 0;
            margin-top: 20px;
        }
    }
    </style>
    @endpush

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    const swiper = new Swiper('.hero-swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    AOS.init({
        duration: 1000,
        once: true,
        offset: 100
    });
    </script>
    @endpush
</x-front.layout>