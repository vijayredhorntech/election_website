<x-front.layout>
    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title">Events</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('events')}}">Events</a></li>
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
                            <h4 class="title">Upcoming Events</h4>
                            <p>Join us at our events and be part of the change.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Community Meetings</h4>
                            <p>Connect with local members and leaders.</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon">
                            <i class="fas fa-microphone"></i>
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
                            <div class="single-faq-item">
                                @if($event->image)
                                <img src="{{ asset($event->image) }}" alt="{{ $event->title }}" class="event-image mb-3">
                                @endif
                                <div class="content">
                                    <div class="event-date mb-2">
                                        <i class="far fa-calendar-alt"></i> {{ $event->date->format('d M Y') }}
                                        <i class="far fa-clock ml-3"></i> {{ $event->time }}
                                    </div>
                                    <h3>{{ $event->title }}</h3>
                                    <p class="location mb-2">
                                        <i class="fas fa-map-marker-alt"></i> {{ $event->location }}
                                    </p>
                                    <p>{{ Str::limit($event->description, 100) }}</p>
                                    <div class="mt-3">
                                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-outline-primary">Learn More</a>
                                    </div>
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
.single-faq-item, .icon-box-item-02, .help-single-item {
    /* ... styles from policies.blade.php ... */
}
</style>
@endpush 