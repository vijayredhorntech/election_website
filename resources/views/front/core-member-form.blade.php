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
                        <h1 class="title" style="color: white">Core Team Member</h1>
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
                        @error('any')<span
                            style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
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
                            <form action="{{route('core_member_form',['id'=>$member->user->id])}}" enctype="multipart/form-data" method="post" class="contact-page-form" novalidate="novalidate">
                                @csrf
                                <h6 class="title">1. Personal Information</h6>

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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">First Name</label>
                                            <input type="text" id="name" name="first_name" value="{{$member->first_name}}"
                                                placeholder="First Name" class="form-control" required=""
                                                aria-required="true" disabled
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('first_name')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Last Name</label>
                                            <input type="text" id="name" name="last_name" value="{{$member->last_name}}"
                                                placeholder="Last Name" class="form-control" required=""
                                                aria-required="true" disabled
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('last_name')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Date of Birth</label>
                                            <input type="date" id="name" name="date_of_birth" value="{{$member->date_of_birth}}"
                                                placeholder="Date of Birth" class="form-control" required=""
                                                aria-required="true" disabled
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('date_of_birth')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Gender</label>
                                            <input type="text" id="name" name="gender" value="{{$member->gender}}"
                                                placeholder="Gender" class="form-control" required=""
                                                aria-required="true" disabled
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('gender')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Phone Number <span style="color: red">*</span></label>
                                            <input type="number" id="phone" name="primary_mobile_number" value="{{$member->primary_mobile_number}}"
                                                placeholder="Phone Number" class="form-control" required=""
                                                aria-required="true"
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('primary_mobile_number')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Nationality <span style="color: red">*</span></label>
                                            <input type="text" id="name" name="nationality" value="{{$member->country->name}}"
                                                placeholder="Nationality" class="form-control" required=""
                                                aria-required="true"
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('nationality')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Address</label>
                                            <input type="text" id="name" name="address" value="{{$member->house_name_number}}, {{$member->street}}, {{$member->town_city}}, {{$member->postcode}}"
                                                placeholder="Address" class="form-control" required=""
                                                aria-required="true" disabled
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('address')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Email</label>
                                            <input type="email" id="email" name="email" value="{{$member->email}}"
                                                placeholder="Phone Number" class="form-control" required=""
                                                aria-required="true" disabled
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('phone')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                </div>


                                <h6 class="title">2. Professional Background</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Current Occupation <span style="color: red">*</span></label>
                                            <input type="text" id="profession" name="profession" value="{{$member->profession}}"
                                                placeholder="Current Occupation" class="form-control" required=""
                                                aria-required="true"
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('profession')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Employer/Business Name (if applicable)</label>
                                            <input type="text" id="employer" name="employer" value=""
                                                placeholder="Employer/Business Name" class="form-control" required=""
                                                aria-required="true"
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('employer')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="relevant_experience">Relevant Experience (Political, Community Work, Leadership, etc.): <span style="color: red">*</span></label>
                                            <textarea id="relevant_experience" name="relevant_experience" placeholder="Enter description"
                                                class="form-control" aria-required="true"
                                                style=" color: black;  border: 1px solid darkgray">
                                            </textarea>
                                            @error('relevant_experience')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: black" for="skills_expertise">Skills & Expertise: (Tick all that apply) <span style="color: red">*</span></label>
                                            @error('skills_expertise')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-question">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Public Speaking
                                                        <input type="checkbox" value="Public Speaking" name="skills_expertise[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Policy Development
                                                        <input type="checkbox" value="Policy Development" name="skills_expertise[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Community Engagement
                                                        <input type="checkbox" value="Community Engagement" name="skills_expertise[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Fundraising
                                                        <input type="checkbox" value="Fundraising" name="skills_expertise[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Media & PR
                                                        <input type="checkbox" value="Media & PR" name="skills_expertise[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        IT & Digital Strategy
                                                        <input type="checkbox" value="IT & Digital Strategy" name="skills_expertise[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Legal & Compliance
                                                        <input type="checkbox" value="Legal & Compliance" name="skills_expertise[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Administration
                                                        <input type="checkbox" value="Administration" name="skills_expertise[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Other
                                                        <input type="checkbox" value="Other" name="political_issue_care[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            @error ('political_issue_care')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <h6 class="title">3. Political & Social Engagement</h6>
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="why_join">Why do you want to join One Nation as a core team member? <span style="color: red">*</span></label>
                                            <textarea id="why_join" name="why_join" placeholder="Enter description"
                                                class="form-control" aria-required="true"
                                                style=" color: black;  border: 1px solid darkgray">
                                            </textarea>
                                            @error('why_join')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: black" for="key_areas">Which key areas of the party’s mission interest you the most? <span style="color: red">*</span></label>
                                            @error('key_areas')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                        <div class="form-question">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Immigration Reform
                                                        <input type="checkbox" value="Immigration Reform" name="key_areas[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Economic Growth
                                                        <input type="checkbox" value="Economic Growth" name="key_areas[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Social Justice
                                                        <input type="checkbox" value="Social Justice" name="key_areas[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Education
                                                        <input type="checkbox" value="Education" name="key_areas[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Housing & Rent Fairness
                                                        <input type="checkbox" value="Housing & Rent Fairness" name="key_areas[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        NHS & Healthcare
                                                        <input type="checkbox" value="NHS & Healthcare" name="key_areas[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Anti-Corruption
                                                        <input type="checkbox" value="Anti-Corruption" name="key_areas[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Public Safety & Security
                                                        <input type="checkbox" value="Public Safety & Security" name="key_areas[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Other
                                                        <input type="checkbox" value="Other" name="political_issue_care[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            @error ('political_issue_care')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black" for="experience_in_political_campaigns">Do you have experience in political campaigns or activism? <span style="color: red">*</span></label>
                                            <div class="input-group">
                                                <select name="experience_in_political_campaigns" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            @error('experience_in_political_campaigns')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="experience_in_political_campaigns_details">If yes, please provide details</label>
                                            <div class="input-group">
                                                <textarea name="experience_in_political_campaigns_details" rows="1" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">

                                                </textarea>
                                            </div>
                                            @error('experience_in_political_campaigns_details')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                </div>
                                <h6 class="title">4. Availability & Commitment</h6>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="willing_to_travel">Are you willing to travel for party activities? <span style="color: red">*</span></label>
                                            <div class="input-group">
                                                <select name="willing_to_travel" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            @error('willing_to_travel')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="member_of_other_political_party">Are you a member of any other political party? <span style="color: red">*</span></label>
                                            <div class="input-group">
                                                <select name="member_of_other_political_party" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            @error('member_of_other_political_party')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                </div>
                                <h6 class="title">5. References & Declaration</h6>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="reference_1">Reference 1 (Name & Contact):</label>
                                            <div class="input-group">
                                                <textarea name="reference_1" rows="1" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">

                                                </textarea>
                                            </div>
                                            @error('reference_1')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="reference_2">Reference 2 (Name & Contact):</label>
                                            <div class="input-group">
                                                <textarea name="reference_2" rows="1" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">

                                                </textarea>
                                            </div>
                                            @error('reference_2')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="signature">Signature <span style="color: red">*</span></label>
                                            <div class="input-group">
                                                <input type="file" name="signature" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;" />

                                            </div>
                                            @error('signature')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="photo">Date of Application</label>
                                            <div class="input-group">
                                                <input type="date" name="date_of_application" class="form-control" value="{{now()->format('Y-m-d')}}" readonly
                                                    style="width: 30%; color: black; font-weight: 400;" />

                                            </div>
                                            @error('date_of_application')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                </div>
                                <h6 class="title">For Official Use Only</h6>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="reviewed_by">Reviewed By</label>
                                            <div class="input-group">
                                                <input type="text" name="reviewed_by" class="form-control" readonly
                                                    style="width: 30%; color: black; font-weight: 400;" />
                                            </div>
                                            @error('reviewed_by')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="position_assigned">Position Assigned</label>
                                            <div class="input-group">
                                                <input type="text" name="position_assigned" class="form-control" readonly
                                                    style="width: 30%; color: black; font-weight: 400;" />
                                            </div>
                                            @error('position_assigned')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="date_of_review">Date of Review</label>
                                            <div class="input-group">
                                                <input type="date" name="date_of_review" class="form-control" value="" readonly
                                                    style="width: 30%; color: black; font-weight: 400;" />

                                            </div>
                                            @error('date_of_review')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                </div>

                                <h6 class="title">Declaration</h6>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label class="container-box" style="color: black; font-weight: 600;">
                                                        “I declare that all the information provided is accurate and I agree to abide by the party’s policies and code of conduct.”
                                                        <input type="checkbox" id="declarationCheckBox" checked name="declaration" style="color: black; font-weight: 600;">
                                                        <span class="checkmark" style="color: black; font-weight: 600; border: 1px solid darkgray; border-radius: 5px;"></span>
                                                    </label>
                                                    <span id="declarationCheckbox"
                                                        style="color: orangered; font-weight: 500; display: none">
                                                        Please check the box to proceed
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                        <button type="submit" id="submitButton" class="boxed-btn btn-sanatory"> Submit Form <span
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
    <script>
        // Get references to the checkbox and submit button
        const declarationCheckbox = document.getElementById('declarationCheckBox');
        const submitButton = document.getElementById('submitButton');
        const declarationCheckboxContent = document.getElementById('declarationCheckbox');

        // Function to toggle submit button visibility based on checkbox state
        function toggleSubmitButton() {
            if (declarationCheckbox.checked) {
                submitButton.style.display = 'block';
                declarationCheckboxContent.style.display = 'none';
            } else {
                submitButton.style.display = 'none';
                declarationCheckboxContent.style.display = 'block';
            }
        }

        // Set initial state (since checkbox is checked by default)
        toggleSubmitButton();
        // Add event listener to checkbox to handle changes
        declarationCheckbox.addEventListener('change', toggleSubmitButton);
    </script>
    @endpush
</x-front.layout>