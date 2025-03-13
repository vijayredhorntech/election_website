<x-front.layout>
    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title" style="color:white">Contact Us</h1>
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

    <section class="help-and-faq-section margin-bottom-15">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">

                    <div class="icon-box-item-02">
                        <div class="icon" style="background-color: transparent">
                            <i class="fas fa-map-marker-alt" style="color: #b30d00"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Visit Us</h4>
                            <p style="color: black">62 King Street, Southall,
                                <br>
                                Greater London UB2 4DB
                            </p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon" style="background-color: transparent">
                            <i class="fas fa-phone" style="color: #b30d00"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Call Us</h4>
                            <p style="color: black">07955555561</p>
                        </div>
                    </div>
                    <div class="icon-box-item-02">
                        <div class="icon" style="background-color: transparent">
                            <i class="fas fa-envelope" style="color: #b30d00"></i>
                        </div>
                        <div class="content">
                            <h4 class="title">Email Us</h4>
                            <p style="color: black">info@one-nation.org.uk</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="help-single-item" style="display: flex; flex-direction: column; justify-content: center; align-items: center">
                        <div class="content">
                            <h3  style="text-align: center; font-size: 40px">Get in Touch</h3>
                            <p style="color: black; line-height: 14px; font-size: 16px">We're here to listen and help. Reach out to us today.</p>
                        </div>
                    </div>
                    <div class="single-faq-item">
                        @if(session('success'))
                        <div class="alert alert-success mb-4">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6" style="padding: 0px 5px">
                                    <div class="form-group ">
                                        <label for="name" style="margin-bottom: 0px">First Name</label>
                                        <input type="text" placeholder="Enter your first name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required style="text-transform: uppercase;padding: 8px 20px; border-radius: 7px; color: black">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding: 0px 5px">
                                    <div class="form-group ">
                                        <label for="name" style="margin-bottom: 0px">Last Name</label>
                                        <input type="text" placeholder="Enter your last name"  class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required style="text-transform: uppercase;padding: 8px 20px; border-radius: 7px; color: black">
                                        @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12" style="padding: 0px 5px">
                                    <div class="form-group ">
                                        <label for="email" style="margin-bottom: 0px">Email</label>
                                        <input type="email" placeholder="Enter your email"  class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" style="padding: 8px 20px; border-radius: 7px; color: black" required>
                                        @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12" style="padding: 0px 5px">
                                    <div class="form-group x">
                                        <label for="subject" style="margin-bottom: 0px">Subject</label>
                                        <input type="text" placeholder="Enter your subject"  class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" style="padding: 8px 20px; border-radius: 7px; color: black" required>
                                        @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12" style="padding: 0px 5px">
                                    <div class="form-group ">
                                        <label for="message" style="margin-bottom: 0px">Message</label>
                                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required style="padding: 8px 20px; border-radius: 7px; color: black">{{ old('message') }}</textarea>
                                        @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12" style="padding: 0px 5px">
                                    <button type="submit" class="btn btn-primary" style="background-color: #b30d00; color: white; border: 1px solid #b30d00">Send Message</button>
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
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
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
    .single-faq-item,
    .icon-box-item-02,
    .help-single-item {
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
