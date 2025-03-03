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
        </style>
    @endpush
    <div class="about-us-section-area about-bg margin-bottom-60" style="background-image: url({{asset('assets/images/about-bg.png')}});">
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
                                <h6 class="subtitle">Become a Core Team Member</h6>
                                <p class="description style-01">
                                    Joining our political party as a core member is an opportunity to make a real impact on society. As a core member, you will actively participate in decision-making, community outreach, and party initiatives.
                                </p>


                            </div>
                            <div class="content">
                                <h6 class="subtitle">Process to Become a Core Team Member</h6>
                                 <ul>
                                     <li style="font-size: 16px; color: black">
                                         <strong>Party Membership ID:</strong>
                                         The applicant must already be a registered member of the party. If not, they should complete the party membership process first.
                                     </li>
                                     <li style="font-size: 16px; color: black">
                                         <strong>Application Submission:</strong>
                                         Fill out the Core Member Application Form with accurate personal, professional, and preference details.
                                     </li>
                                     <li style="font-size: 16px; color: black">
                                         <strong>Approval Process: </strong>
                                         The submitted application will undergo a review by the party's internal committee. Based on eligibility, skills, and availability, the application may be approved or rejected.
                                     </li>
                                     <li style="font-size: 16px; color: black">
                                         <strong>Confirmation & Induction:</strong>
                                         Approved applicants will receive confirmation and further instructions on their role and responsibilities as core members.
                                     </li>
                                 </ul>


                            </div>
                        </div>
                        <div class="contact-form style-01" style="margin-top: 20px">
                            <form class="contact-page-form" novalidate="novalidate">
                                @csrf
                                <h6 class="title">Enter you member id</h6>
                                @if(session('error'))
                                    <div class="text-red-600 text-sm font-semibold mt-4" style="font-weight: bold ; color: orangered; font-size: 15px">*{{session('error')}}</div>
                                @endif @if(session('success'))
                                    <div class="text-green-600 text-sm font-semibold mt-4" style="font-weight: bold ; color: green; font-size: 15px">*{{session('success')}}</div>
                                @endif
                                <div class="row">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <input type="text"  id="member_id" name="member_id" placeholder="Member id" class="form-control" required="" aria-required="true" style="text-transform: uppercase; color: black; font-weight: 600; border: 1px solid darkgray">
                                            @error('member_id')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                            {{--                                        make it button to submit the form--}}
                                            <a href="{{route('core_member_form')}}" type="submit" class="boxed-btn btn-sanatory"> Verify ID<span class="icon-paper-plan"></span></a>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-2 d-flex align-items-center justify-content-between ">
                                        <p class="btn btn-link" style="text-decoration: none; color: black; font-weight: 600;">Not a member?
                                            <a href="{{route('joinUs')}}" id="resendOtpBtn" class="btn btn-link text-danger" style="text-decoration: none; font-weight: 600; padding: 5px 0px" onclick="resendOtp()">Click here</a>
                                            to become a member
                                        </p>
                                    </div>



                                    <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
{{--                                        make it button to submit the form--}}
                                        <a href="{{route('core_member_form')}}" type="submit" class="boxed-btn btn-sanatory"> Next <span class="icon-paper-plan"></span></a>
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
