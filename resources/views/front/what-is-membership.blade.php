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
                        <h1 class="title">Membership</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('whatIsMembership')}}">What is membership?</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="help-and-faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="help-single-item">
                        <div class="content">
                            <h4 class="title">Frequently Asked Questions</h4>
                            <p>Proin rutrum sem at rutrum ultrirecies. Nunc felis neque, dictum ut porta a, ullamcorper vel ante. Quisque none consequat.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Visit Us</h4>
                            <p>"62 King Street, Southall,
                            <br>
                            Greater London UB2 4DB"</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Call Us</h4>
                            <p>07955555561</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Email Us</h4>
                            <p>info@one-nation.org.uk</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="accordion-wrapper-three">
                        <!-- accordion wrapper -->
                        <div id="accordion">

                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fas fa-star"></i>
                                            What is One Nation membership?
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                    <div class="card-body">
                                Since One Nation is a growing political movement, a structured membership system will help build a strong base of supporters, activists, and future candidates.
                                        </ul>
                                    </div>
                                </div>
                            </div>



                            <div class="card">
                                <div class="card-header" id="headingOwo">
                                    <h5 class="mb-0">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseOwo" aria-expanded="false" aria-controls="collapseOwo">
                                            <i class="fas fa-star"></i>
                                            Why Join One Nation?
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseOwo" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <ul>
                                            <li>Be part of a movement working to strengthen Britain while ensuring fair representation for all.</li>
                                            <li>Have a voice in shaping policies that impact your community.</li>
                                            <li>Get involved in campaigns, events, and outreach programs to make real change</li>
                                            <li>Opportunity to stand for election as an official One Nation candidate in local or national politics.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h5 class="mb-0">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <i class="fas fa-star"></i>
                                            Membership Tiers
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <ul style="list-style: none">
                                            <li><strong>1. Supporter Free</strong>
                                                <ul>
                                                    <li>Stay updated with party news, policies, and events.</li>
                                                    <li>Receive newsletters and exclusive content.</li>
                                                    <li>Engage with One Nation on social media and community forums.</li>
                                                </ul>
                                            </li>
                                            <li><strong>2. Standard Member £36 per year or £3 month</strong>
                                                <ul>
                                                    <li>Full participation in policy discussions and decision-making.</li>
                                                    <li>Access to party events, campaign training, and networking opportunities.</li>
                                                    <li>Eligible to vote in internal party elections and policy votes.</li>
                                                </ul>
                                            </li>
                                            <li><strong>3. Activist Member £36 per year or £3 month</strong>
                                                <ul>
                                                    <li>Everything in Standard Membership.</li>
                                                    <li>In-depth training on campaigning and grassroots activism.</li>
                                                    <li>Opportunities to work closely with party leadership and contribute to strategy.</li>
                                                </ul>
                                            </li>
                                            <li><strong>4. Leadership & Candidate Pathway £36 per year or £3 month</strong>
                                                <ul>
                                                    <li>Everything in Activist Membership.</li>
                                                    <li>Access to specialized training for future political candidates.</li>
                                                    <li>Priority consideration for selection in local elections under One Nation.</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h5 class="mb-0">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <i class="fas fa-star"></i>
                                            What Members Can Do
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseFour" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <ul>
                                            <li><strong>Shape Policies: </strong>Vote and propose ideas to be included in the party's agenda.</li>
                                            <li><strong>Campaigning: </strong>Help in local and national campaigns, including door-to-door engagement and digital outreach.</li>
                                            <li><strong>Community Events: </strong>Attend meetings, rallies, and policy discussions to promote One Nation's vision.</li>
                                            <li><strong>Stand for Election: </strong> Ambitious members can be supported to run for office under the One Nation banner.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingFive">
                                    <h5 class="mb-0">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            <i class="fas fa-star"></i>
                                            How to Join
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseFive" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <ul>
                                            <li>Sign up online through the official One Nation website</li>
                                            <li>Choose a membership level and payment plan</li>
                                            <li>Start engaging with the movement immediately!</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="membership-info py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <h1 class="text-center mb-5">What is Membership?</h1>

                    <div class="membership-content">
                        <h2>Benefits of Membership</h2>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-check text-primary mr-2"></i> Have your say in party policies</li>
                            <li><i class="fas fa-check text-primary mr-2"></i> Vote in leadership elections</li>
                            <li><i class="fas fa-check text-primary mr-2"></i> Attend exclusive member events</li>
                            <li><i class="fas fa-check text-primary mr-2"></i> Regular updates and newsletters</li>
                        </ul>

                        <h2 class="mt-5">Membership Requirements</h2>
                        <ul class="list-unstyled">
                            <li><i class="fas fa-info-circle text-primary mr-2"></i> Must be 16 years or older</li>
                            <li><i class="fas fa-info-circle text-primary mr-2"></i> Not a member of another political party</li>
                            <li><i class="fas fa-info-circle text-primary mr-2"></i> Support our values and principles</li>
                        </ul>
                    </div>

                    <div class="text-center mt-5">
                        <a href="{{ route('joinUs') }}" class="btn btn-primary btn-lg">Join Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>








</x-front.layout>
