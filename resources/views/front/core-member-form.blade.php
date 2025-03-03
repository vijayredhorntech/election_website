<x-front.layout>

    @push('styles')
        <style>
            .gradient-bg {
                background: linear-gradient(to right, #d53369, #daae51);
            }

            .container-box input[type="checkbox"]:checked + .checkmark {
                background-color: #007bff;
                /* Change to desired color */
                border-color: #007bff;
                /* Change to desired color */
            }

            select {
                -webkit-appearance: none !important;
                -moz-appearance: none !important;
                text-indent: 1px !important;
                text-overflow: '' !important;
            }
        </style>
    @endpush
    <div class="about-us-section-area about-bg margin-bottom-60"
         style="background-image: url({{asset('assets/images/about-bg.png')}});">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="about-inner donation-single">
                        <h1 class="title">Core Team Member</h1>
                    </div>
                    <div class="breadcrumbs">
                        <ul>
                            <li><a href="{{route('index')}}">Home</a></li>
                            <li><a href="{{route('joinUs')}}">Become core team member</a></li>
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
                                <h6 class="subtitle">
                                    Fill out the form below to become a core member
                                </h6>
                                <p class="description style-01">
                                    Provide the information to become a core member of the party.
                                </p>
                            </div>
                        </div>
                        <div class="contact-form style-01" style="margin-top: 40px">
                            <form class="contact-page-form" novalidate="novalidate">
                                @csrf
                                <h6 class="title">Basic Information</h6>

                                @if(session('error'))
                                    <div class="text-red-600 text-sm font-semibold mt-4"
                                         style="font-weight: bold ; color: orangered; font-size: 15px">
                                        *{{session('error')}}</div>
                                @endif @if(session('success'))
                                    <div class="text-green-600 text-sm font-semibold mt-4"
                                         style="font-weight: bold ; color: green; font-size: 15px">
                                        *{{session('success')}}</div>
                                @endif
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Name</label>
                                            <input type="text" id="name" name="name" value="James William"
                                                   placeholder="Member id" class="form-control" required=""
                                                   aria-required="true"
                                                   style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('name')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Email</label>
                                            <input type="email" id="email" name="email" value="james@gmail.com"
                                                   placeholder="Email id" class="form-control" required=""
                                                   aria-required="true"
                                                   style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('email')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Phone</label>
                                            <input type="number" id="phone" name="phone" value="0123456789"
                                                   placeholder="Phone Number" class="form-control" required=""
                                                   aria-required="true"
                                                   style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('phone')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Address</label>
                                            <input type="address" id="address" name="address" value="123, king street "
                                                   placeholder="Address" class="form-control" required=""
                                                   aria-required="true"
                                                   style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('address')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                </div>


                                <h6 class="title">Financial Details</h6>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Job Title/
                                                Designation <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <select name="primary_country_code" class="form-control"
                                                        style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="+91">-- Select you job --</option>
                                                    <option value="+93">None</option>
                                                    <option value="+93">Student</option>
                                                    <option value="+93">Teacher</option>
                                                    <option value="+93">Doctor</option>
                                                    <option value="+93">Engineer</option>
                                                </select>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Annual Income <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <select name="primary_country_code" class="form-control"
                                                        style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="+91">-- Select you annual income --</option>
                                                    <option value="+93">None</option>
                                                    <option value="+93">£1 - $100</option>
                                                    <option value="+93">£100 - $500</option>
                                                    <option value="+93">£500 - $1000</option>
                                                    <option value="+93">£1000 - $5000</option>
                                                    <option value="+93">£5000 - $10000</option>
                                                    <option value="+93">£10000 - $50000</option>
                                                    <option value="+93">£50000 - above</option>
                                                </select>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-question">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Do you own any business?
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            @error ('termsAndConditionCheckbox')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>

                                    </div>
                                </div>

                                <h6 class="title"> Political & Social Involvement</h6>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-question">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Have you been associated with any political party before?
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            @error ('termsAndConditionCheckbox')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>

                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Have you
                                                participated in any social or political movement? <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <select name="primary_country_code" class="form-control"
                                                        style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="+93">-- Select --</option>
                                                    <option value="+93">Yes</option>
                                                    <option value="+93">No</option>
                                                </select>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Are you comfortable
                                                with public speaking? <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <select name="primary_country_code" class="form-control"
                                                        style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="+93">-- Select --</option>
                                                    <option value="+93">Yes</option>
                                                    <option value="+93">No</option>
                                                </select>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Are you willing to
                                                relocate for party work? <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <select name="primary_country_code" class="form-control"
                                                        style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="+93">-- Select --</option>
                                                    <option value="+93">Yes</option>
                                                    <option value="+93">No</option>
                                                </select>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">How much time can
                                                you dedicate to the party? <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <select name="primary_country_code" class="form-control"
                                                        style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="+93">-- Select --</option>
                                                    <option value="+93">Few hours a week</option>
                                                    <option value="+93">Few hours a month</option>
                                                    <option value="+93">Available full-time</option>
                                                    <option value="+93">Available occasionally</option>
                                                </select>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Which political
                                                ideology do you align with the most? <span class="text-danger">*</span></label>
                                            <textarea id="ideology" name="ideology" placeholder="Enter description"
                                                      class="form-control" required="" aria-required="true"
                                                      style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            </textarea>
                                            @error('ideology')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">What political
                                                issues do you
                                                care about the most? <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-question">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Employment
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Education
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Healthcare
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Infrastructure
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Economy
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Women Empowerment
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Agriculture
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Law & Order
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Other
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            @error ('termsAndConditionCheckbox')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>



                                <h6 class="title">Skills & Strengths</h6>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Do you have leadership experience?</label>
                                            <div class="input-group">
                                                <select name="primary_country_code" class="form-control"
                                                        style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="+93">-- Select --</option>
                                                    <option value="+93">Yes</option>
                                                    <option value="+93">No</option>
                                                </select>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Do you have experience in handling media interactions?</label>
                                            <div class="input-group">
                                                <select name="primary_country_code" class="form-control"
                                                        style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="+93">-- Select --</option>
                                                    <option value="+93">Yes</option>
                                                    <option value="+93">No</option>
                                                </select>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">How is your communication skill?</label>
                                        </div>
                                        <div class="form-question">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        Below Average
                                                        <input type="radio" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        Average
                                                        <input type="radio" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        Good
                                                        <input type="radio" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        Excellent
                                                        <input type="radio" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                            </div>
                                            @error ('termsAndConditionCheckbox')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Which areas of party work interest you the most?</label>
                                        </div>
                                        <div class="form-question">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        Policy Making
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        Campaign Management
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        Public Relations
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        Social Work
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        Fundraising
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        Media Handling
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        IT & Digital Media
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        Legal Affairs
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black"  class="container-box">
                                                        Other
                                                        <input type="checkbox" name="termsAndConditionCheckbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                            </div>
                                            @error ('termsAndConditionCheckbox')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <h6 class="title">Additional Information</h6>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Who inspired you to join politics?</label>
                                            <div class="input-group">
                                                <textarea name="primary_country_code" rows="1" class="form-control"
                                                        style="width: 30%; color: black; font-weight: 400;">

                                                </textarea>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">What are your expectations from the party?</label>
                                            <div class="input-group">
                                                <textarea name="primary_country_code" rows="1" class="form-control"
                                                          style="width: 30%; color: black; font-weight: 400;">

                                                </textarea>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">What contributions do you want to make as a core party member?</label>
                                            <div class="input-group">
                                                <textarea name="primary_country_code" rows="1" class="form-control"
                                                          style="width: 30%; color: black; font-weight: 400;">

                                                </textarea>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Do you have a strong social media presence?</label>
                                            <div class="input-group">
                                                <select name="primary_country_code" class="form-control"
                                                        style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="+93">-- Select --</option>
                                                    <option value="+93">Yes</option>
                                                    <option value="+93">No</option>
                                                </select>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Do you have a network of volunteers who can support the party?</label>
                                            <div class="input-group">
                                                <select name="primary_country_code" class="form-control"
                                                        style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="+93">-- Select --</option>
                                                    <option value="+93">Yes</option>
                                                    <option value="+93">No</option>
                                                </select>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Would you be willing to fundraise for the party?</label>
                                            <div class="input-group">
                                                <select name="primary_country_code" class="form-control"
                                                        style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="+93">-- Select --</option>
                                                    <option value="+93">Yes</option>
                                                    <option value="+93">No</option>
                                                </select>
                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                </div>
                                <h6 class="title">Upload Documents</h6>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Photo</label>
                                            <div class="input-group">
                                                <input type="file" name="primary_country_code" class="form-control"
                                                          style="width: 30%; color: black; font-weight: 400;"/>

                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Govt. ID Proof</label>
                                            <div class="input-group">
                                                <input type="file" name="primary_country_code" class="form-control"
                                                       style="width: 30%; color: black; font-weight: 400;"/>

                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">Other Document</label>
                                            <div class="input-group">
                                                <input type="file" name="primary_country_code" class="form-control"
                                                       style="width: 30%; color: black; font-weight: 400;"/>

                                            </div>
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>



                                </div>

                                <h6 class="title">Declaration</h6>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label class="container-box" style="color: black; font-weight: 600;">
                                                        “I declare that all the information provided is accurate and I agree to abide by the party’s policies and code of conduct.”
                                                        <input type="checkbox" id="hasReferralCode"  checked name="conditions" style="color: black; font-weight: 600;">
                                                        <span class="checkmark" style="color: black; font-weight: 600; border: 1px solid darkgray; border-radius: 5px;"></span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                        <button type="submit" class="boxed-btn btn-sanatory"> Submit Form <span
                                                class="icon-paper-plan"></span></button>
                                    </div>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush
</x-front.layout>
