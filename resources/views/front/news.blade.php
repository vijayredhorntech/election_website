<x-front.layout>
    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title">Latest News</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('news')}}">News</a></li>
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
                            <h4 class="title">News & Updates</h4>
                            <p>Stay informed about One Nation's latest activities and initiatives.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Press Releases</h4>
                            <p>Official statements and announcements.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Upcoming Events</h4>
                            <p>Join us at our next event.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($news as $article)
                        <div class="col-md-6 mb-4">
                            <div class="single-faq-item">
                                @if($article->image)
                                <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="news-image mb-3">
                                @endif
                                <div class="content">
                                    <div class="news-date mb-2">
                                        <i class="far fa-calendar-alt"></i> {{ $article->created_at->format('d M Y') }}
                                    </div>
                                    <h3>{{ $article->title }}</h3>
                                    <p>{{ Str::limit($article->excerpt, 120) }}</p>
                                    <a href="{{ route('news.show', $article->slug) }}" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="pagination-wrapper">
                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front.layout>

@push('styles')
<style>
.news-image {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
}

.news-date {
    color: #666;
    font-size: 14px;
}

.read-more {
    color: #007bff;
    text-decoration: none;
    font-weight: 600;
    display: inline-flex;
    align-items: center;
    gap: 5px;
    transition: all 0.3s ease;
}

.read-more:hover {
    color: #0056b3;
}

.read-more i {
    transition: transform 0.3s ease;
}

.read-more:hover i {
    transform: translateX(5px);
}

/* Reuse existing styles from policies.blade.php */
.single-faq-item, .icon-box-item-02, .help-single-item {
    /* ... styles from policies.blade.php ... */
}
</style>
@endpush 