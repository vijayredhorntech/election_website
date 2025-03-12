<x-front.layout>
    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title" style="color:white">Our Leadership</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('leadership')}}">Leadership</a></li>
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
                            <h4 class="title">Leadership Team</h4>
                            <p style="color: black">Meet the dedicated individuals leading One Nation towards a better future.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon" style="background-color: transparent">
                            <i class="fas fa-flag" style="color: #b30d00"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Our Mission</h4>
                            <p style="color: black">Building a stronger, more united Britain through effective leadership.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon" style="background-color: transparent">
                            <i class="fas fa-bullseye" style="color: #b30d00"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Our Goals</h4>
                            <p style="color: black">Implementing positive change through strategic initiatives.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($leaders as $leader)
                        <div class="col-md-6 mb-4">
                            <div class="single-faq-item text-center">
                                <div class="leader-image-wrapper mb-4">
                                    <img src="{{ asset($leader['image']) }}"
                                        alt="{{ $leader['name'] }}" style="height: 300px"
                                        class="leader-image rounded-circle">
                                </div>
                                <div class="content">
                                    <h3>{{ $leader['name'] }}</h3>
                                    <p class="role text-primary">{{ $leader['position'] }}</p>
                                    <p class="bio" style="color: black">{{ $leader['bio'] }}</p>
                                    <div class="social-links mt-3">
                                        <a href="#" class="social-link" style="color: black"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="social-link" style="color: black"><i class="fab fa-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- Why Join Section -->
                    <div class="policy-category mb-5" id="why-join">
                        <div class="faq-contents">
                            <h2 class="title">A Vision for a Stronger Britain</h2>
                            <p style="color: black">Welcome to One Nation. I am Jaginder Singh Nichal, the Founder and Leader of this movement, built on the principles of fairness, justice, and unity. Our mission is clear: to restore integrity in politics, protect hardworking citizens, and create a nation that works for everyone—not just the elite.
                            </p>
                            <p style="color: black; margin-top: 20px">For too long, Britain has been held back by weak leadership, rising inequality, and policies that fail the people. One Nation stands as a powerful force to challenge corruption, demand accountability, and fight for the rights of workers, students, families, and communities who have been ignored for too long.
                            </p>
                        </div>
                    </div>

                    <div class="policy-category mb-5" id="why-join">
                        <div class="faq-contents">
                            <h2 class="title">My Commitment to the People
                            </h2>
                            <p style="color: black">As your leader, I pledge to:
                            </p>

                            <div class="row">
                                <div class="col-12 mb-4">
                                    <div class="single-faq-item">
                                        <div class="content">
                                            <ul class="check-list">
                                                <li style="color: black"><strong>End Corruption-</strong> No more political games; the system must work for the people, not career politicians.
                                                </li>
                                                <li style="color: black"><strong>Fair Immigration Policies-</strong> Ensuring asylum seekers and students get the respect and opportunities they deserve.
                                                </li>
                                                <li style="color: black"><strong>Protect Hardworking Citizens-</strong> Fair jobs, fair wages, and an end to exploitation.
                                                </li>
                                                <li style="color: black"><strong>Fix the Housing Crisis-</strong> Affordable homes, fair rent laws, and action against homelessness.
                                                </li>
                                                <li style="color: black"><strong>Strengthen the NHS-</strong> More funding, better services, and shorter waiting times.</li>
                                                <li style="color: black"><strong>Defend British Values-</strong> Our nation must remain strong, secure, and respected.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="policy-category mb-5" id="why-join">
                        <div class="faq-contents">
                            <h2 class="title">Join the Movement</h2>
                            <p style="color: black">I did not enter politics for power—I entered it to give power back to the people. One Nation is not just a political party—it is a revolution for fairness, truth, and justice.
                            </p>
                            <p style="color: black; margin-top: 20px">If you believe in a stronger Britain, a better future, and a government that puts the people first, then I invite you to join us today. Together, we will build a Britain that we can all be proud of.
                            </p>
                        </div>
                    </div>
                    <div class="policy-category mb-5" id="why-join">
                        <div class="faq-contents">
                            <h2 class="title">One Leader. One Vision. One Nation.
                            </h2>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</x-front.layout>

@push('styles')
<style>
    .leader-image {
        width: 180px;
        height: 180px;
        object-fit: cover;
        border: 5px solid #fff;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
    }

    .role {
        font-size: 18px;
        font-weight: 600;
        margin: 10px 0;
    }

    .bio {
        color: #666;
        line-height: 1.6;
    }

    .social-links {
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .social-link {
        width: 35px;
        height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f8f9fa;
        border-radius: 50%;
        color: #007bff;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        background: #007bff;
        color: #fff;
    }

    /* Reuse existing styles from policies.blade.php */
    .single-faq-item,
    .icon-box-item-02,
    .help-single-item {
        /* ... styles from policies.blade.php ... */
    }
</style>
@endpush
