@extends('layouts.front')

@section('content')
<section class="conduct-hero" style="background-image: url({{ asset('assets/images/conduct-bg.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <h1>Code of Conduct</h1>
                <p class="lead">Our commitment to ethical behavior and professional standards</p>
            </div>
        </div>
    </div>
</section>

<section class="conduct-content py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="conduct-section">
                    <h2>Our Core Values</h2>
                    <p>At One Nation, we believe in maintaining the highest standards of integrity, respect, and professionalism. This code of conduct outlines the behavior we expect from all members and representatives.</p>

                    <div class="conduct-card">
                        <h3><i class="fas fa-handshake"></i> Respect and Dignity</h3>
                        <ul>
                            <li>Treat all individuals with respect, regardless of background</li>
                            <li>Maintain professional conduct in all party activities</li>
                            <li>Zero tolerance for discrimination or harassment</li>
                            <li>Respect diverse viewpoints and encourage constructive dialogue</li>
                        </ul>
                    </div>

                    <div class="conduct-card">
                        <h3><i class="fas fa-balance-scale"></i> Integrity and Transparency</h3>
                        <ul>
                            <li>Maintain honesty in all communications</li>
                            <li>Declare any conflicts of interest</li>
                            <li>Follow all applicable laws and regulations</li>
                            <li>Maintain transparency in decision-making processes</li>
                        </ul>
                    </div>

                    <div class="conduct-card">
                        <h3><i class="fas fa-users"></i> Community Engagement</h3>
                        <ul>
                            <li>Actively participate in community development</li>
                            <li>Listen to and address community concerns</li>
                            <li>Promote inclusive dialogue and understanding</li>
                            <li>Support initiatives that benefit all communities</li>
                        </ul>
                    </div>

                    <div class="conduct-card">
                        <h3><i class="fas fa-shield-alt"></i> Compliance and Reporting</h3>
                        <ul>
                            <li>Report any violations of this code</li>
                            <li>Cooperate with investigations when required</li>
                            <li>Protect confidential information</li>
                            <li>Maintain accurate records of all activities</li>
                        </ul>
                    </div>

                    <div class="reporting-section mt-5">
                        <h3>Reporting Violations</h3>
                        <p>If you witness any violations of this code of conduct, please report them through:</p>
                        <ul>
                            <li>Email: conduct@one-nation.org.uk</li>
                            <li>Phone: 020 3500 0000</li>
                            <li>Online Form: <a href="{{ route('contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.conduct-hero {
    padding: 100px 0;
    background-size: cover;
    background-position: center;
    color: white;
    position: relative;
}

.conduct-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
}

.conduct-section {
    background: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.conduct-card {
    border-left: 4px solid #c41e3a;
    padding: 25px;
    margin: 25px 0;
    background: #f8f9fa;
    border-radius: 0 10px 10px 0;
    transition: transform 0.3s ease;
}

.conduct-card:hover {
    transform: translateX(10px);
}

.conduct-card h3 {
    color: #c41e3a;
    margin-bottom: 15px;
}

.conduct-card h3 i {
    margin-right: 10px;
}

.conduct-card ul {
    list-style: none;
    padding-left: 20px;
}

.conduct-card ul li {
    position: relative;
    padding: 8px 0;
    padding-left: 25px;
}

.conduct-card ul li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: #c41e3a;
}

.reporting-section {
    background: #f8f9fa;
    padding: 25px;
    border-radius: 10px;
    border-top: 4px solid #c41e3a;
}

.reporting-section ul {
    list-style: none;
    padding-left: 20px;
}

.reporting-section ul li {
    padding: 5px 0;
}

.reporting-section a {
    color: #c41e3a;
    text-decoration: none;
}

.reporting-section a:hover {
    text-decoration: underline;
}
</style>
@endpush 