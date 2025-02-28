<x-front.layout>
    <div class="about-us-section-area about-bg padding-top-110 padding-bottom-120" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title">About One Nation</h1>
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

    <section class="help-and-faq-section padding-top-110 padding-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="help-single-item margin-bottom-30">
                        <div class="content">
                            <h4 class="title">Who We Are</h4>
                            <p>At One Nation, we are more than just a political party—we are a movement dedicated to fairness, justice, and real change. We stand for the people, listen to their concerns, and fight for a society where everyone has a voice and equal opportunities.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02 margin-bottom-30">
                        <div class="icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Our Mission</h4>
                            <p>Our mission is to bring people together, tackle injustice, and create a future where no one is left behind.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-history"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Our Story</h4>
                            <p>Founded on the belief that politics should serve the people, not the powerful. From humble beginnings, we have grown into a movement dedicated to making real change.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="vision-values margin-bottom-60">
                        <div class="faq-contents">
                            <h2 class="title">Our Commitments</h2>
                            <div class="single-faq-item">
                                <div class="content">
                                    <ul class="check-list">
                                        <li><i class="fas fa-check"></i> Addressing Social Inequality – Ensuring fairness, justice, and opportunities for all.</li>
                                        <li><i class="fas fa-check"></i> Community-Driven Change – Listening to real people and taking real action.</li>
                                        <li><i class="fas fa-check"></i> Transparency & Accountability – Politics should serve the people, not personal interests.</li>
                                        <li><i class="fas fa-check"></i> A Stronger, United Future – Building a society that values unity over division.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vision-values">
                        <div class="faq-contents">
                            <h2 class="title">What We Stand For</h2>
                            <div class="single-faq-item">
                                <div class="content">
                                    <ul class="check-list">
                                        <li><i class="fas fa-gem"></i> Equality for All – No matter your background, race, religion, or status.</li>
                                        <li><i class="fas fa-gem"></i> Honest & Fair Politics – We reject corruption and work with integrity.</li>
                                        <li><i class="fas fa-gem"></i> Empowering Communities – Real change starts at the local level.</li>
                                        <li><i class="fas fa-gem"></i> Action Over Words – We take real steps to solve problems.</li>
                                        <li><i class="fas fa-gem"></i> A Better Future – Investing in education, healthcare, and sustainability.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="get-involved-section padding-top-110 padding-bottom-120 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center margin-bottom-60">
                    <h2 class="title">How You Can Get Involved</h2>
                </div>
                <div class="col-md-8 offset-md-2">
                    <div class="single-faq-item">
                        <div class="content text-center">
                            <p class="margin-bottom-40">Want to be part of the change? Here's how you can help:</p>
                            <div class="row">
                                <div class="col-md-6 margin-bottom-30">
                                    <div class="action-box p-4 bg-white rounded shadow-sm">
                                        <i class="fas fa-users fa-2x margin-bottom-30 text-primary"></i>
                                        <h4>Join Our Membership</h4>
                                        <p>Be part of our movement and help shape the future.</p>
                                        <a href="{{ route('joinUs') }}" class="btn btn-primary">Join Now</a>
                                    </div>
                                </div>
                                <div class="col-md-6 margin-bottom-30">
                                    <div class="action-box p-4 bg-white rounded shadow-sm">
                                        <i class="fas fa-hand-holding-heart fa-2x margin-bottom-30 text-primary"></i>
                                        <h4>Donate</h4>
                                        <p>Support our cause and fund real action for real people.</p>
                                        <a href="#" class="btn btn-primary">Donate Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-page-form-section padding-top-110 padding-bottom-120">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center margin-bottom-60">
                    <h2 class="title">Contact Us</h2>
                    <p>Have questions? Want to learn more? We'd love to hear from you!</p>
                </div>
                <div class="col-md-8 offset-md-2">
                    <div class="contact-item-wrapper text-center">
                        <div class="row">
                            <div class="col-md-6 margin-bottom-40">
                                <div class="contact-single-item">
                                    <i class="fas fa-map-marker-alt fa-2x margin-bottom-30 text-primary"></i>
                                    <h4>Address</h4>
                                    <p>62 King Street, Southall, Greater London UB2 4DB</p>
                                </div>
                            </div>
                            <div class="col-md-6 margin-bottom-40">
                                <div class="contact-single-item">
                                    <i class="fas fa-phone fa-2x margin-bottom-30 text-primary"></i>
                                    <h4>Phone</h4>
                                    <p>07955555561</p>
                                    <h4 class="margin-top-30">Email</h4>
                                    <p>jsnichal@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center margin-top-40">
                            <p class="margin-bottom-0">Together, We Are Stronger!</p>
                            <p class="margin-bottom-40">At One Nation, we believe that when people unite, real change happens. Join us in shaping a fairer, brighter, and more just future for everyone.</p>
                            <a href="{{ route('contact') }}" class="btn btn-primary">Get in Touch</a>
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
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
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
}

.check-list li i {
    margin-right: 10px;
    color: var(--main-color-one);
}
</style>
@endpush