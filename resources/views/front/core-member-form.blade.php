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
                                <h6 class="title">Personal Information</h6>

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
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">First Name</label>
                                            <input type="text" id="name" name="name" value="{{$member->first_name}}"
                                                placeholder="First Name" class="form-control" required=""
                                                aria-required="true" disabled
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('name')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Email</label>
                                            <input type="email" id="email" name="email" value="{{$member->email}}"
                                                placeholder="Email id" class="form-control" required=""
                                                aria-required="true" disabled
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('email')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Phone</label>
                                            <input type="number" id="phone" name="phone" value="{{$member->primary_mobile_number}}"
                                                placeholder="Phone Number" class="form-control" required=""
                                                aria-required="true" disabled
                                                style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('phone')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label style="color: black" for="name" style="color: black">Address</label>
                                            <input type="address" id="address" name="address" value="{{$member->house_name_number}}, {{$member->street}}"
                                                placeholder="Address" class="form-control" required=""
                                                aria-required="true" disabled
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
                                            <label style="color: black" for="annual_income">Annual Income <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <select name="annual_income" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value=none>None</option>
                                                    <option value="1-100">£1-£100</option>
                                                    <option value="100-1000">£100- £1000</option>
                                                    <option value="1000-10000">£100- £10000</option>
                                                    <option value="10000-50000">£1000-£50000</option>
                                                    <option value="50000-above">£50000-Above</option>
                                                </select>
                                            </div>
                                            @error('annual_income')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-question">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Do you own any business?
                                                        <input type="checkbox" name="any_business">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            @error ('any_business')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>

                                    </div>
                                </div>

                                <h6 class="title"> Political & Social Involvement</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-question">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Have you been associated with any political party before?
                                                        <input type="checkbox" name="associated_with_other_party">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            @error ('associated_with_other_party')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-question">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Do you have any criminal record?
                                                        <input type="checkbox" name="any_criminal_record">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            @error ('any_crime_record')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>

                                    </div>


                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="participated_in_social_movement">Have you
                                                participated in any social or political movement? <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <select name="participated_in_social_movement" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            @error('participated_in_social_movement')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="comfortable_with_public_speaking">Are you comfortable
                                                with public speaking? <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <select name="comfortable_with_public_speaking" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            @error('comfortable_with_public_speaking')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="willing_to_relocate">Are you willing to
                                                relocate for party work? <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <select name="willing_to_relocate" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            @error('willing_to_relocate')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="how_much_time_for_party">How much time can
                                                you dedicate to the party? <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <select name="how_much_time_for_party" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="Full time">Available full-time</option>
                                                    <option value="Few hours a week">Few hours a week</option>
                                                    <option value="Few hours a month">Few hours a month</option>
                                                    <option value="Occasionally">Available occasionally</option>
                                                    <option value="No Time">No Time</option>
                                                </select>
                                            </div>
                                            @error('how_much_time_for_party')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="political_ideology">Which political
                                                ideology do you align with the most? <span class="text-danger">*</span></label>
                                            <textarea id="ideology" name="political_ideology" placeholder="Enter description"
                                                class="form-control" required="" aria-required="true"
                                                style=" color: black;  border: 1px solid darkgray">
                                            </textarea>
                                            @error('political_ideology')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: black" for="primary_mobile_number">What political
                                                issues do you
                                                care about the most?</label>
                                        </div>
                                        <div class="form-question">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Employment
                                                        <input type="checkbox" value="Employment" name="political_issue_care[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Education
                                                        <input type="checkbox" value="Education" name="political_issue_care[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Healthcare
                                                        <input type="checkbox" value="Healthcare" name="political_issue_care[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Infrastructure
                                                        <input type="checkbox" value="Infrastructure" name="political_issue_care[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Economy
                                                        <input type="checkbox" value="Economy" name="political_issue_care[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Women Empowerment
                                                        <input type="checkbox" value="Women Empowerment" name="political_issue_care[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Agriculture
                                                        <input type="checkbox" value="Agriculture" name="political_issue_care[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Law & Order
                                                        <input type="checkbox" value="Law & Order" name="political_issue_care[]">
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



                                <h6 class="title">Skills & Strengths</h6>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="leadership_experience">Do you have leadership experience?</label>
                                            <div class="input-group">
                                                <select name="leadership_experience" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            @error('leadership_experience')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="experience_in_media_interaction">Do you have experience in handling media interactions?</label>
                                            <div class="input-group">
                                                <select name="experience_in_media_interaction" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            @error('experience_in_media_interaction')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: black" for="communication_skill">How is your communication skill? <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-question">
                                            <div class="radio-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Below Average
                                                        <input type="radio" value="Below Average" name="communication_skill">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Average
                                                        <input type="radio" value="Average" name="communication_skill">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Good
                                                        <input type="radio" value="Good" name="communication_skill">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Excellent
                                                        <input type="radio" value="Excellent" name="communication_skill">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                            </div>
                                            @error ('communication_skill')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label style="color: black" for="area_of_interest">Which areas of party work interest you most? <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="form-question">
                                            <div class="check-box-wrapper">
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Policy Making
                                                        <input type="checkbox" value="Policy Making" name="area_of_interest[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Campaign Management
                                                        <input type="checkbox" value="Campaign Management" name="area_of_interest[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Public Relations
                                                        <input type="checkbox" value="Public Relations" name="area_of_interest[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Social Work
                                                        <input type="checkbox" value="Social Work" name="area_of_interest[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Fundraising
                                                        <input type="checkbox" value="Fundraising" name="area_of_interest[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Media Handling
                                                        <input type="checkbox" value="Media Handling" name="area_of_interest[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        IT & Digital Media
                                                        <input type="checkbox" value="IT & Digital Media" name="area_of_interest[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Legal Affairs
                                                        <input type="checkbox" value="Legal Affairs" name="area_of_interest[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>
                                                <div class="check-box">
                                                    <label style="color: black" class="container-box">
                                                        Other
                                                        <input type="checkbox" value="Other" name="area_of_interest[]">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                </div>

                                            </div>
                                            @error ('area_of_interest')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>
                                <h6 class="title">Additional Information</h6>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="who_inspired">Who inspired you to join politics?</label>
                                            <div class="input-group">
                                                <textarea name="who_inspired" rows="1" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">

                                                </textarea>
                                            </div>
                                            @error('who_inspired')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="expectations_from_party">What are your expectations from the party?</label>
                                            <div class="input-group">
                                                <textarea name="expectations_from_party" rows="1" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">

                                                </textarea>
                                            </div>
                                            @error('expectations_from_party')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="contribution_to_party">What contributions do you want to make as a core party member?</label>
                                            <div class="input-group">
                                                <textarea name="contribution_to_party" rows="1" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">

                                                </textarea>
                                            </div>
                                            @error('contribution_to_party')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="have_social_media_presence">Do you have a strong social media presence?</label>
                                            <div class="input-group">
                                                <select name="have_social_media_presence" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            @error('have_social_media_presence')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="have_network_of_volunteers">Do you have a network of volunteers who can support the party?</label>
                                            <div class="input-group">
                                                <select name="have_network_of_volunteers" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            @error('have_network_of_volunteers')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="willing_to_fundraise">Would you be willing to fundraise for the party?</label>
                                            <div class="input-group">
                                                <select name="willing_to_fundraise" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;">
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            @error('willing_to_fundraise')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                </div>
                                <h6 class="title">Upload Documents </h6>
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="photo">Photo <span class="text-danger">* Image less than 2MB</span></label>
                                            <div class="input-group">
                                                <input type="file" name="photo" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;" />

                                            </div>
                                            @error('photo')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="id_proof">Govt. ID Proof <span class="text-danger">* Image less than 2MB</span></label>
                                            <div class="input-group">
                                                <input type="file" name="id_proof" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;" />

                                            </div>
                                            @error('id_proof')<span
                                                style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label style="color: black" for="other_document">Other Document <span class="text-danger">Image less than 2MB</span></label>
                                            <div class="input-group">
                                                <input type="file" name="other_document" class="form-control"
                                                    style="width: 30%; color: black; font-weight: 400;" />

                                            </div>
                                            @error('other_document')<span
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