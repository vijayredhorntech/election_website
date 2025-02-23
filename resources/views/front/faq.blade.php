@extends('layouts.front')

@section('content')
<section class="faq-hero" style="background-image: url({{ asset('assets/images/faq-bg.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <h1>Frequently Asked Questions</h1>
                <p class="lead">Find answers to common questions about One Nation Party</p>
            </div>
        </div>
    </div>
</section>

<section class="faq-content py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="accordion" id="faqAccordion">
                    <div class="faq-item">
                        <div class="faq-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne">
                                    What is One Nation's mission?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseOne" class="collapse show" data-parent="#faqAccordion">
                            <div class="faq-body">
                                <p>One Nation aims to address injustices, promote education, and strengthen Britain by ensuring fair representation and opportunities for all communities.</p>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item">
                        <div class="faq-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo">
                                    How can I become a member?
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" data-parent="#faqAccordion">
                            <div class="faq-body">
                                <ul>
                                    <li>Choose from our membership levels: Supporter (Free), Standard Member (£3/month), or Activist Member (£3/month)</li>
                                    <li>Complete the online registration form</li>
                                    <li>Verify your email and complete your profile</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Add more FAQ items as needed -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.faq-hero {
    padding: 100px 0;
    background-size: cover;
    background-position: center;
    color: white;
    position: relative;
}

.faq-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.6);
}

.faq-item {
    background: white;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.faq-header {
    padding: 20px;
    background: #f8f9fa;
    border-bottom: 1px solid #eee;
}

.faq-header button {
    color: #333;
    text-decoration: none;
    width: 100%;
    text-align: left;
    padding: 0;
    position: relative;
}

.faq-header button::after {
    content: '+';
    position: absolute;
    right: 0;
    top: 50%;
    transform: translateY(-50%);
}

.faq-header button[aria-expanded="true"]::after {
    content: '-';
}

.faq-body {
    padding: 20px;
}

.faq-body ul {
    list-style: none;
    padding-left: 20px;
}

.faq-body ul li {
    position: relative;
    padding: 5px 0;
    padding-left: 20px;
}

.faq-body ul li::before {
    content: '•';
    position: absolute;
    left: 0;
    color: #c41e3a;
}
</style>
@endpush 