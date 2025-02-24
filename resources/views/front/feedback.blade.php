<x-front.layout>
    @push('styles')
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #d53369, #daae51);
        }
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
        .btn-primary {
            padding: 12px 30px;
            font-weight: 600;
        }
    </style>
    @endpush

    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title">Feedback Form</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li>Feedback</li>
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
                                <h6 class="subtitle">Share Your Thoughts With Us</h6>
                                <p class="description style-01">
                                    Your feedback helps us improve and better serve our community. Let us know your thoughts, suggestions, or concerns.
                                </p>

                                @if(session('error'))
                                <div class="text-red-600 text-sm font-semibold mt-4" style="color: orangered; font-weight: 500">{{session('error')}}</div>
                                @endif
                                @if(session('success'))
                                <div class="text-green-600 text-sm font-semibold mt-4" style="color: green; font-weight: 500">{{session('success')}}</div>
                                @endif
                            </div>
                        </div>
                        <div class="contact-form style-01">
                            <form action="{{route('feedback.store')}}" method="post" class="contact-page-form" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="name">Full Name</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                            @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="constituency">Constituency</label>
                                            <select class="form-control" id="constituency_id" name="constituency_id">
                                                <option value="">Select Constituency</option>
                                                @foreach($constituencies as $constituency)
                                                <option value="{{ $constituency->id }}">{{ $constituency->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('constituency_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-4">
                                            <label for="feedback_type">Feedback Type</label>
                                            <select class="form-control" id="feedback_type" name="feedback_type" required>
                                                <option value="">Select Type</option>
                                                <option value="suggestion">Suggestion</option>
                                                <option value="complaint">Complaint</option>
                                                <option value="query">Query</option>
                                                <option value="appreciation">Appreciation</option>
                                            </select>
                                            @error('feedback_type')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-4">
                                            <label for="subject">Subject</label>
                                            <input type="text" class="form-control" id="subject" name="subject" required>
                                            @error('subject')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group mb-4">
                                            <label for="message">Your Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                            @error('message')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Submit Feedback</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-front.layout>