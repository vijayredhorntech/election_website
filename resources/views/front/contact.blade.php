<x-front.layout>
    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title">Contact Us</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>
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
                            <h4 class="title">Get in Touch</h4>
                            <p>We're here to listen and help. Reach out to us today.</p>
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
                    <div class="single-faq-item">
                        @if(session('success'))
                            <div class="alert alert-success mb-4">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <label for="subject">Subject</label>
                                        <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" required>
                                        @error('subject')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <label for="message">Message</label>
                                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                        @error('message')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-front.layout>

@push('styles')
<style>
.form-control {
    border: 1px solid #ddd;
    padding: 12px;
    border-radius: 5px;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.invalid-feedback {
    color: #dc3545;
    font-size: 0.875rem;
    margin-top: 0.25rem;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
    padding: 1rem;
    border-radius: 5px;
}

.alert-danger ul {
    padding-left: 1.25rem;
}

.btn-primary {
    padding: 12px 30px;
    font-weight: 600;
}

/* Reuse existing styles from policies.blade.php */
.single-faq-item, .icon-box-item-02, .help-single-item {
    /* ... styles from policies.blade.php ... */
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
    padding: 1rem;
    border-radius: 5px;
    margin-bottom: 1rem;
}
</style>
@endpush
