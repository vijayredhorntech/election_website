<x-front.layout>
    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title" style="color:white">Events & News</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('events')}}">Events & News</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="help-and-faq-section">
        @if(!$events->count() && !$news->count())
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div style="text-align: center; padding: 20px;">
                        <div class="content">
                            <i class="fas fa-exclamation-triangle" style="color: #b30d00; font-size: 40px;"></i>
                            <p style="color: black; font-size: 20px; font-weight: 600">No events or news found</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($events->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="help-single-item">
                        <div class="content">
                            <h4 class="title">Upcoming Events</h4>
                            <p style="color: black">Join us at our events and be part of the change.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon" style="background-color: transparent">
                            <i class="fas fa-users" style="color: #b30d00"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Community Meetings</h4>
                            <p style="color: black">Connect with local members and leaders.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon" style="background-color: transparent">
                            <i class="fas fa-microphone" style="color: #b30d00"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Speaking Events</h4>
                            <p>Hear from our leaders and experts.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($events as $event)
                        <div class="col-md-6 mb-4">
                            <div class="single-faq-item" style="background-color:whitesmoke; padding:20px; border-radius:3px">
                                @if($event->image)
                                <img src="{{ asset($event->image) }}" alt="{{ $event->title }}" class="event-image mb-3">
                                @endif
                                <div class="content">
                                    <div class="event-date mb-2">
                                        <i class="far fa-calendar-alt"></i> {{ $event->start_datetime?->format('d M Y') }}
                                        <i class="far fa-clock ml-3"></i> {{ $event->start_datetime?->format('h:i A') }}
                                    </div>
                                    <h3>{{ $event->title }}</h3>
                                    <p class="location mb-2">
                                        <i class="fas fa-map-marker-alt"></i> {{ $event->location }}
                                    </p>
                                    <p>{{ Str::limit($event->description, 100) }}</p>

                                </div>
                            </div>
                        </div>

                        @endforeach
                    </div>
                    <div class="pagination-wrapper">
                        {{ $events->links() }}
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if($news->count() > 0)
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="help-single-item">
                        <div class="content">
                            <h4 class="title">News & Updates</h4>
                            <p style="color: black">Stay informed about One Nation's latest activities and initiatives.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon" style="background-color: transparent">
                            <i class="fas fa-newspaper" style="color: #b30d00"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Press Releases</h4>
                            <p style="color: black">Official statements and announcements.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon" style="background-color: transparent">
                            <i class="fas fa-calendar-alt" style="color: #b30d00"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Upcoming Events</h4>
                            <p style="color: black">Join us at our next event.</p>
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
        @endif
    </section>
</x-front.layout>

@push('styles')
<style>
    .event-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-radius: 5px;
    }

    .event-date {
        color: #666;
        font-size: 14px;
    }

    .location {
        color: #666;
        font-size: 14px;
    }

    .location i {
        color: #dc3545;
    }

    .btn-outline-primary {
        border-width: 2px;
        font-weight: 600;
        padding: 8px 20px;
    }

    /* Reuse existing styles from policies.blade.php */
    .single-faq-item,
    .icon-box-item-02,
    .help-single-item {
        /* ... styles from policies.blade.php ... */
    }
</style>
@endpush