<x-front.layout>
    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
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

    <section class="help-and-faq-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="help-single-item">
                        <div class="content">
                            <h4 class="title">Our Vision</h4>
                            <p>Building a Better, Fairer, and Stronger Britain through unity and inclusive policies.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Community Focus</h4>
                            <p>Engaging with local communities to address real issues.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Unity & Inclusion</h4>
                            <p>Bringing people together for positive change.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="vision-values">
                        <div class="faq-contents">
                            <h2 class="title">{{ $data['vision']['title'] }}</h2>
                            <div class="single-faq-item">
                                <div class="content">
                                    <ul class="check-list">
                                        @foreach($data['vision']['points'] as $point)
                                        <li><i class="fas fa-check"></i> {{ $point }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="leadership-section bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="title">Our Leadership</h2>
                </div>
                <div class="col-md-8 offset-md-2">
                    <div class="single-faq-item text-center">
                        <div class="leader-image-wrapper mb-4">
                            <img src="{{ asset('assets/images/leadership/' . Str::slug($data['leadership']['name']) . '.jpg') }}" 
                                 alt="{{ $data['leadership']['name'] }}" 
                                 class="leader-image rounded-circle">
                        </div>
                        <div class="content">
                            <h3>{{ $data['leadership']['name'] }}</h3>
                            <p class="role text-primary">{{ $data['leadership']['role'] }}</p>
                            <p class="bio">{{ $data['leadership']['bio'] }}</p>
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
    width: 200px;
    height: 200px;
    object-fit: cover;
    border: 5px solid #fff;
    box-shadow: 0 0 15px rgba(0,0,0,0.1);
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

/* Reuse existing styles from policies.blade.php */
.single-faq-item, .icon-box-item-02, .help-single-item, .check-list {
    /* ... styles from policies.blade.php ... */
}
</style>
@endpush 