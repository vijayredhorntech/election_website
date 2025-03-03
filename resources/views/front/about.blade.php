<x-front.layout>
    <div class="about-us-section-area about-bg padding-top-110 padding-bottom-120" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title" style="color:white">About One Nation</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('about')}}">About</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="help-and-faq-section padding-bottom-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="help-single-item margin-bottom-30">
                        <div class="content">
                            <h4 class="title">Who We Are</h4>
                            <p style="color: black">At One Nation, we are more than just a political party—we are a movement dedicated to fairness, justice, and real change. We stand for the people, listen to their concerns, and fight for a society where everyone has a voice and equal opportunities. Our mission is to bring people together, tackle injustice, and create a future where no one is left behind.
                            </p>
                        </div>
                    </div>
                    <div class="icon-box-item-02 margin-bottom-30">
                        <div class="icon" style="background-color: transparent">
                            <i class="fas fa-bullseye" style="color: #c31c39"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Our Mission</h4>
                            <p style="color: black">Our mission is to bring people together, tackle injustice, and create a future where no one is left behind.</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-8">
                    <div class="vision-values margin-bottom-40">
                        <div class="faq-contents">
                            <h2 class="title" style="color: black">Our Story</h2>
                            <div class="single-faq-item">
                                <div class="content">
                                    <ul class="check-list">
                                        <li style="color: black">One Nation was founded on the belief that politics should serve the people, not the powerful. We saw communities struggling with injustice, inequality, and a lack of representation—and we knew we had to act. From humble beginnings, we have grown into a movement dedicated to making real, lasting change through action, advocacy, and community engagement.
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="vision-values margin-bottom-40">
                        <div class="faq-contents">
                            <h2 class="title" style="color: black">We are committed to:</h2>
                            <div class="single-faq-item">
                                <div class="content">
                                    <ul class="check-list">
                                        <li style="color: black"> Addressing Social Inequality – Ensuring fairness, justice, and opportunities for all.</li>
                                        <li style="color: black"> Community-Driven Change – Listening to real people and taking real action.</li>
                                        <li style="color: black"> Transparency & Accountability – Politics should serve the people, not personal interests.</li>
                                        <li style="color: black"> A Stronger, United Future – Building a society that values unity over division.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vision-values">
                        <div class="faq-contents">
                            <h2 class="title" style="color: black">What We Stand For: </h2>
                            <p style="color: black">We believe that change happens when people come together with a shared purpose. Our core values include:
                            </p>
                            <div class="single-faq-item">
                                <div class="content">
                                    <ul class="check-list">
                                        <li style="color: black"> Equality for All – No matter your background, race, religion, or status, you deserve equal opportunities.</li>
                                        <li style="color: black"> Honest & Fair Politics – We reject corruption and work with integrity for the people.</li>
                                        <li style="color: black"> Empowering Communities – Real change starts at the local level with strong, engaged communities.</li>
                                        <li style="color: black"> Action Over Words – We don’t just talk—we take real steps to solve problems.</li>
                                        <li style="color: black"> A Better Future – Investing in education, healthcare, and sustainability for future generations.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="get-involved-section padding-top-40 padding-bottom-40 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center margin-bottom-10">
                    <h2 class="title">How You Can Get Involved</h2>
                </div>
                <div class="col-md-12 ">
                    <div class="single-faq-item">
                        <div class="content text-center">
                            <p class="margin-bottom-40" style="color: black">Want to be part of the change? Here's how you can help:</p>
                            <div class="row">
                                <div class="col-md-6 margin-bottom-30">
                                    <div class="action-box p-4 bg-white rounded shadow-sm">
                                        <i class="fas fa-users fa-2x margin-bottom-30" style="color:#b30d00"></i>
                                        <h4 style="color: black">Join Our Membership</h4>
                                        <p style="color: black">Be part of our movement and help shape the future.</p>
                                        <a href="{{ route('joinUs') }}" class="btn btn-primary" style="background-color:#b30d00; border:1px solid #b30d00 ">Join Now</a>
                                    </div>
                                </div>
                                <div class="col-md-6 margin-bottom-30">
                                    <div class="action-box p-4 bg-white rounded shadow-sm">
                                        <i class="fas fa-hand-holding-heart fa-2x margin-bottom-30" style="color:#b30d00"></i>
                                        <h4 style="color: black">Donate</h4>
                                        <p style="color: black">Support our cause and fund real action for real people.</p>
                                        <a href="{{route('donate')}}" class="btn btn-primary" style="background-color:#b30d00; border:1px solid #b30d00 ">Donate Now</a>
                                    </div>
                                </div>
                                <div class="col-md-6 margin-bottom-30">
                                    <div class="action-box p-4 bg-white rounded shadow-sm">
                                        <i class="fas fa-tree fa-2x margin-bottom-30" style="color:#b30d00"></i>
                                        <h4 style="color: black">Volunteer</h4>
                                        <p style="color: black"> Take part in events, campaigns, and community initiatives.</p>
                                        <a href="{{route('joinUs')}}" class="btn btn-primary" style="background-color:#b30d00; border:1px solid #b30d00 ">Join Us</a>
                                    </div>
                                </div>
                                <div class="col-md-6 margin-bottom-30">
                                    <div class="action-box p-4 bg-white rounded shadow-sm">
                                        <i class="fas fa-globe fa-2x margin-bottom-30" style="color:#b30d00"></i>
                                        <h4 style="color: black">Spread the Word</h4>
                                        <p style="color: black"> Follow us on social media and share our message.</p>
                                        <a href="{{route('joinUs')}}" class="btn btn-primary" style="background-color:#b30d00; border:1px solid #b30d00 ">Join Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-page-form-section padding-top-40 padding-bottom-40">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center margin-bottom-20">
                    <h2 class="title">Contact Us</h2>
                    <p style="color: black">Have questions? Want to learn more? We'd love to hear from you!</p>
                </div>
                <div class="col-md-12">
                    <div class="contact-item-wrapper text-center" style="margin-bottom:0px">
                        <div class="row">
                            <div class="col-md-3 margin-bottom-40">
                                <div class="contact-single-item">
                                    <i class="fas fa-map-marker-alt fa-2x margin-bottom-30" style="color:#b30d00"></i>
                                    <h4 style="color: black">Address</h4>
                                    <p style="color: black">62 King Street, Southall, Greater London UB2 4DB</p>
                                </div>
                            </div>
                            <div class="col-md-3 margin-bottom-40">
                                <div class="contact-single-item">
                                    <i class="fas fa-phone fa-2x margin-bottom-30" style="color:#b30d00"></i>
                                    <h4 style="color: black">Phone</h4>
                                    <p style="color: black">07955555561</p>
                                </div>
                            </div>
                            <div class="col-md-3 margin-bottom-40">
                                <div class="contact-single-item">
                                    <i class="fas fa-envelope fa-2x margin-bottom-30" style="color:#b30d00"></i>
                                    <h4 style="color: black">Email</h4>
                                    <p style="color: black">info@one-nation.org.uk</p>
                                </div>
                            </div>
                            <div class="col-md-3 margin-bottom-40">
                                <div class="contact-single-item">
                                    <i class="fas fa-globe fa-2x margin-bottom-30" style="color:#b30d00"></i>
                                    <h4 style="color: black">Website</h4>
                                    <p style="color: black">https://one-nation.org.uk</p>
                                </div>
                            </div>

                        </div>
                        <div class="text-center margin-top-20">
                            <p class="margin-bottom-0" style="color: black">Together, We Are Stronger!</p>
                            <p class="margin-bottom-40" style="color: black">At One Nation, we believe that when people unite, real change happens. Join us in shaping a fairer, brighter, and more just future for everyone.</p>
                            <a href="{{ route('contact') }}" class="btn btn-primary" style="background-color:#b30d00; border:1px solid #b30d00 ">Get in Touch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front.layout>

@push('styles')
<style>
    .action-box {
        transition: transform 0.3s ease;
    }

    .action-box:hover {
        transform: translateY(-5px);
    }

    .contact-single-item {
        padding: 30px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        height: 100%;
    }

    .vision-values .title {
        margin-bottom: 30px;
        color: var(--heading-color);
        font-size: 28px;
        font-weight: 600;
    }

    .check-list li {
        margin-bottom: 15px;
        font-size: 16px;
        line-height: 1.6;
        color: black;
    }

    .check-list li i {
        margin-right: 10px;
        color: var(--main-color-one);
    }
</style>
@endpush