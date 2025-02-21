<x-front.layout>

    @push('styles')
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #d53369, #daae51);
        }
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
                            <form action="{{$formData['url']}}" method="{{$formData['method']}}" class="contact-page-form" novalidate="novalidate">
                                @csrf
                                <h6 class="title">Fill the following information to join us.</h6>
                                @if(session('error'))
                                <div class="text-red-600 text-sm font-semibold mt-4" style="font-weight: bold ; color: orangered; font-size: 15px">*{{session('error')}}</div>
                                @endif @if(session('success'))
                                <div class="text-green-600 text-sm font-semibold mt-4" style="font-weight: bold ; color: green; font-size: 15px">*{{session('success')}}</div>
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
                                </div>
                                <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                    <button type="submit" class="boxed-btn btn-sanatory"> {{$formData['type']==='register'?'Generate Otp': 'Validate Otp'}} <span class="icon-paper-plan"></span></button>
                                </div>

                            </form>
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

        function checkEmailAvailability() {
            const email = document.getElementById('email').value;
            const emailAvailabilityStatus = document.getElementById('email-availability-status');
            const submitButton = document.querySelector('button[type="submit"]');

            emailAvailabilityStatus.textContent = 'Checking email existence...';

            fetch(`/check_email?email=${encodeURIComponent(email)}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        // Email exists case
                        emailAvailabilityStatus.textContent = 'Email already exists';
                        emailAvailabilityStatus.style.color = 'red';

                        // Disable submit button
                        submitButton.disabled = true;
                        submitButton.style.backgroundColor = 'gray';
                        submitButton.style.cursor = 'not-allowed';
                        submitButton.style.boxShadow = 'none';
                        submitButton.classList.remove('btn-sanatory');
                    } else {
                        // Email available case
                        emailAvailabilityStatus.textContent = '';

                        // Enable submit button
                        submitButton.disabled = false;
                        submitButton.style.backgroundColor = 'red';
                        submitButton.classList.add('btn-sanatory');
                        submitButton.style.cursor = 'pointer';
                    }
                })
                .catch(error => {
                    console.error('Error checking email availability:', error);
                    emailAvailabilityStatus.textContent = 'Error checking email availability';
                    emailAvailabilityStatus.style.color = 'red';
                });
        }

        // Debounce input to prevent excessive API calls
        const emailInput = document.getElementById('email');
        let emailTimeout;

        emailInput.addEventListener('input', function() {
            clearTimeout(emailTimeout);
            emailTimeout = setTimeout(checkEmailAvailability, 500);
        });
    </script>
    @endpush
</x-front.layout>