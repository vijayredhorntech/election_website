<x-front.layout>

    @push('styles')
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #d53369, #daae51);
        }

        .container-box input[type="checkbox"]:checked+.checkmark {
            background-color: #007bff;
            /* Change to desired color */
            border-color: #007bff;
            /* Change to desired color */
        }

        /* .container-box input[type="checkbox"]:checked+.checkmark:after {
            content: '\2713';
            display: block;
            text-align: center;
            font-size: 14px;
            color: white;
            font-weight: bold;
            line-height: 16px;
        } */
    </style>
    @endpush
    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title">Join Us</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('joinUs')}}">Join Us</a></li>
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
                                <h6 class="subtitle">Change has begun, be part of it</h6>
                                <p class="description style-01">
                                    Join hundreds of thousands of party members as we fix the foundations and rebuild UK.
                                </p>


                            </div>
                        </div>
                        <div class="contact-form style-01">
                            <form action="{{$formData['url']}}" method="{{$formData['method']}}" class="contact-page-form" id="joinForm" novalidate="novalidate" data-loading-text="Processing your request...">
                                @csrf
                                <div class="form-progress">
                                    <div class="form-progress-bar" style="width: 0%"></div>
                                </div>
                                <h6 class="title">Fill the following information to join us.</h6>
                                @if(session('error'))
                                <div class="text-red-600 text-sm font-semibold mt-4" style="font-weight: bold ; color: orangered; font-size: 15px">*{{session('error')}}</div>
                                @endif @if(session('success'))
                                <div class="text-green-600 text-sm font-semibold mt-4" style="font-weight: bold ; color: green; font-size: 15px">*{{session('success')}}</div>
                                @endif
                                @if(session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                    @if(isset($remainingAttempts))
                                    <br>
                                    <small>You have {{ $remainingAttempts }} OTP request{{ $remainingAttempts != 1 ? 's' : '' }} remaining. Please wait 5 minutes if you run out of attempts.</small>
                                    @endif
                                </div>
                                @endif
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" {{$formData['type']==='validate'?'disabled':''}} value="{{ $userName ?? old('name') }}" id="name" name="name" placeholder="Enter name" class="form-control" required="" aria-required="true" style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('name')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input {{$formData['type']==='validate'?'disabled':''}} value="{{ $email ?? old('email') }}" type="email" id="email" name="email" placeholder="ENTER EMAIL" class="form-control" required="" aria-required="true" style="color: black; font-weight: 600; ">
                                            @error('email')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            <span id="email-availability-status"></span>
                                        </div>
                                    </div>


                                    @if ($formData['type']==='validate')
                                    <div class="flex flex-col items-start w-full gap-1">
                                        <input value="{{ $email }}" type="email" name="verifiedEmail" style="display: none" class="hidden w-full bg-gray-100 rounded-[3px] border-[1px] border-red-600 px-4 lg:py-3 py-2 focus:outline-none focus:ring-0 focus:border-red-700 placeholder:text-red-500" placeholder="Enter your membership number.....">
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="number" name="otp" value="{{old('otp')}}" class="form-control" placeholder="Enter OTP" required="" aria-required="true" style="color: black; font-weight: 600">
                                            @error('otp')<span class="text-red-600 text-sm font-semibold">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    @endif

                                    @if ($formData['type']==='register')
                                    <div class="form-question" style="padding-left: 20px">
                                        <div class="check-box-wrapper">
                                            <div class="check-box">
                                                <label class="container-box">
                                                    Currently not a member of any other party
                                                    <input type="checkbox" name="termsAndConditionCheckbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                            </div>
                                        </div>
                                        @error ('termsAndConditionCheckbox')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                    </div>
                                    @endif

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label class="container-box" style="color: black; font-weight: 600;">
                                                        I have a referral code
                                                        <input type="checkbox" id="hasReferralCode" name="hasReferralCode" style="color: black; font-weight: 600;">
                                                        <span class="checkmark" style="color: black; font-weight: 600; border: 1px solid darkgray; border-radius: 5px;"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group" id="referralCodeField" style="display: none;">
                                            <input type="text"
                                                name="referral_code"
                                                placeholder="Enter referral code"
                                                class="form-control"
                                                pattern="^ONR[A-Z0-9]{4}$"
                                                title="Please enter a valid referral code">
                                            @error('referral_code')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" class="submit-btn" id="submitBtn">
                                            <span class="btn-text">{{ $formData['type'] === 'validate' ? 'Verify OTP' : 'Send OTP' }}</span>
                                            <span class="loading-dots"></span>
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                        <div class="why-to-join-us">
                            <h2>What is Membership?</h2>
                            <p style="font-size: 18px">
                                <a href="{{route('whatIsMembership')}}" target="_blank" style="color: #b30d00; ">Click here</a> to know more
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        // document.getElementById('name').addEventListener('input', function() {
        //     this.value = this.value.toUpperCase();
        // });

        function togglePrivacyModal() {
            const modal = document.getElementById('privacyModal');
            modal.classList.toggle('hidden');
        }

        function toggleMembershipModal() {
            const modal = document.getElementById('membershipModal');
            modal.classList.toggle('hidden');
        }

        const form = document.getElementById('joinForm');
        const submitBtn = document.getElementById('submitBtn');
        const progressBar = document.querySelector('.form-progress-bar');
        let progress = 0;

        // Update progress bar
        function updateProgress(value) {
            progress = value;
            progressBar.style.width = `${progress}%`;
        }

        // Form submission handler
        form.addEventListener('submit', function(e) {
            e.preventDefault();

            // Add loading states
            submitBtn.classList.add('btn-loading');
            submitBtn.disabled = true;
            form.classList.add('form-loading');

            // Simulate progress
            let interval = setInterval(() => {
                if (progress < 90) {
                    updateProgress(progress + 10);
                }
            }, 500);

            // Submit form
            fetch(form.action, {
                    method: form.method,
                    body: new FormData(form),
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    updateProgress(100);
                    if (data.success) {
                        // Handle success
                        window.location.href = data.redirect || window.location.href;
                    } else {
                        // Handle error
                        showError(data.error);
                        resetLoadingState();
                    }
                })
                .catch(error => {
                    showError('An error occurred. Please try again.');
                    resetLoadingState();
                })
                .finally(() => {
                    clearInterval(interval);
                });
        });

        // Reset loading state
        function resetLoadingState() {
            submitBtn.classList.remove('btn-loading');
            submitBtn.disabled = false;
            form.classList.remove('form-loading');
            updateProgress(0);
        }

        // Show error message
        function showError(message) {
            const errorDiv = document.createElement('div');
            errorDiv.className = 'alert alert-danger mt-3';
            errorDiv.textContent = message;
            form.insertAdjacentElement('beforebegin', errorDiv);
            setTimeout(() => errorDiv.remove(), 5000);
        }

        // Email verification loading state
        function checkEmailAvailability() {
            const email = document.getElementById('email');
            const status = document.getElementById('email-availability-status');

            if (!email.value) return;

            email.classList.add('input-loading');
            status.innerHTML = 'Checking availability<span class="loading-dots"></span>';

            fetch(`/check-email?email=${encodeURIComponent(email.value)}`)
                .then(response => response.json())
                .then(data => {
                    email.classList.remove('input-loading');
                    status.textContent = data.exists ? 'Email already registered' : 'Email available';
                    status.style.color = data.exists ? 'red' : 'green';
                })
                .catch(() => {
                    email.classList.remove('input-loading');
                    status.textContent = 'Error checking email';
                    status.style.color = 'red';
                });
        }

        document.getElementById('hasReferralCode').addEventListener('change', function() {
            document.getElementById('referralCodeField').style.display = this.checked ? 'block' : 'none';
        });
    </script>
    @endpush
</x-front.layout>