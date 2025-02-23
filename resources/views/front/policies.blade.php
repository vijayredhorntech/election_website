<x-front.layout>
    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title">Our Policies</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('policies')}}">Policies</a></li>
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
                            <h4 class="title">Our Policy Framework</h4>
                            <p>Building a better, fairer, and stronger Britain through comprehensive policy initiatives.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-balance-scale"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Justice & Representation</h4>
                            <p>Ensuring fair representation and legal reforms.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Public Education</h4>
                            <p>Promoting awareness and community engagement.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Economic Growth</h4>
                            <p>Supporting businesses and creating opportunities.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @foreach($policies as $category => $items)
                    <div class="policy-category mb-5" id="{{ Str::slug($category) }}">
                        <div class="faq-contents">
                            <h2 class="title">{{ $category }}</h2>
                            <div class="row">
                                @foreach($items as $policy)
                                <div class="col-md-6 mb-4">
                                    <div class="single-faq-item">
                                        <div class="header">
                                            <h3>{{ $policy['title'] }}</h3>
                                        </div>
                                        <div class="content">
                                            <p>{{ $policy['description'] }}</p>
                                            @if(isset($policy['key_points']))
                                            <ul class="check-list">
                                                @foreach($policy['key_points'] as $point)
                                                <li><i class="fas fa-check"></i> {{ $point }}</li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
</x-front.layout>

@push('styles')
<style>
.single-faq-item {
    background: #fff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
    height: 100%;
    transition: all 0.3s ease;
}

.single-faq-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 25px rgba(0,0,0,0.1);
}

.single-faq-item .header h3 {
    font-size: 20px;
    margin-bottom: 15px;
    color: #333;
}

.check-list {
    list-style: none;
    padding: 0;
    margin: 15px 0 0;
}

.check-list li {
    position: relative;
    padding-left: 25px;
    margin-bottom: 10px;
    color: #666;
}

.check-list li i {
    position: absolute;
    left: 0;
    top: 4px;
    color: #28a745;
}

.icon-box-item-02 {
    margin-bottom: 30px;
    padding: 20px;
    border-radius: 10px;
    background: #fff;
    transition: all 0.3s ease;
}

.icon-box-item-02:hover {
    box-shadow: 0 5px 25px rgba(0,0,0,0.1);
}

.icon-box-item-02 .icon {
    width: 60px;
    height: 60px;
    line-height: 60px;
    text-align: center;
    background: #f8f9fa;
    border-radius: 50%;
    margin-bottom: 15px;
}

.icon-box-item-02 .icon i {
    font-size: 24px;
    color: #007bff;
}

.help-single-item {
    margin-bottom: 30px;
}

.help-single-item .title {
    font-size: 24px;
    margin-bottom: 15px;
}
</style>
@endpush 