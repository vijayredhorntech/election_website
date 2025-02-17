<x-front.layout>
    @push('styles')
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #d53369, #daae51);
        }
    </style>
    @endpush


        <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="about-inner donation-single">
                            <h1 class="title">Donations</h1>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{route('index')}}">Home</a></li>
                                <li><a href="{{route('donate')}}">Donation</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="donation-content-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="volunteer-form style-01">
                            <div class="donate-programm">
                                <div class="content">
                                    <h6 class="subtitle">Thanks for Donating</h6>
                                    <p class="description style-01">
                                        Your donation will help us to build a better nation. We are grateful for your support.
                                    </p>

                                    <div class="amount">
                                        <div class="btn-wrapper">
                                            <span class="price-btn">£25</span>
                                            <span class="price-btn">£50</span>
                                            <span class="price-btn">£100</span>
                                            <span class="price-btn">£200</span>
                                        </div>
                                        <div class="form-group">
                                            <input type="number" name="fname" placeholder="Custom amount" class="form-control" required="" aria-required="true">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contact-form style-01">
                                <form action="request.html" class="contact-page-form" novalidate="novalidate">
                                    <h6 class="title">Fill the following information for Donation.</h6>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="fname" placeholder="First Name" class="form-control" required="" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="lname" placeholder="Last Name" class="form-control" required="" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email" required="" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="telephone" placeholder="Phone Number" class="form-control" required="" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="fname" placeholder="Address line 1" class="form-control" required="" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="fname" placeholder="Address line 2" class="form-control" required="" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="fname" placeholder="City" class="form-control" required="" aria-required="true">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" name="fname" placeholder="State*" class="form-control" required="" aria-required="true">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="form-question">
                                <div class="check-box-wrapper">
                                    <div class="check-box">
                                        <label class="container-box">
                                            Agree to the terms and conditions
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-wrapper">
                                <a href="#" class="boxed-btn btn-sanatory">Donation Now <span class="icon-paper-plan"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>








</x-front.layout>
