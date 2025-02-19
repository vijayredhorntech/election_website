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
                            <h1 class="title">Basic Information</h1>
                        </div>
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="{{route('index')}}">Home</a></li>
                                <li><a href="{{route('joinUs')}}">Basic Information</a></li>
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
                                    <h6 class="subtitle">Tell Us More About Your Self</h6>
                                    <p class="description style-01">
                                        Join hundreds of thousands of party members as we fix the foundations and rebuild UK.
                                    </p>

                                    @if(session('error'))
                                        <div class="text-red-600 text-sm font-semibold mt-4">{{session('error')}}</div>
                                    @endif @if(session('success'))
                                        <div class="text-green-600 text-sm font-semibold mt-4">{{session('success')}}</div>
                                    @endif
                                </div>
                            </div>
                            <div class="contact-form style-01">
                                <form action="{{route('storeMemberBasicInformation')}}" enctype="multipart/form-data" method="post" class="contact-page-form" novalidate="novalidate">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Profile Photo</label>
                                                <input type="file" name="profile_photo" class="form-control" required="" aria-required="true">
                                                @error('profile_photo')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Title</label>

                                                <select class="form-control" name="title">
                                                    <option value="" >Select title</option>
                                                    <option value="MR." {{ (old('title', $data->title ?? '') == 'MR.') ? 'selected' : '' }}>MR.</option>
                                                    <option value="MRS." {{ (old('title', $data->title ?? '') == 'MRS.') ? 'selected' : '' }}>MRS.</option>
                                                    <option value="MISS" {{ (old('title', $data->title ?? '') == 'MISS') ? 'selected' : '' }}>MISS</option>
                                                    <option value="DR." {{ (old('title', $data->title ?? '') == 'DR.') ? 'selected' : '' }}>DR.</option>
                                                    <option value="MS." {{ (old('title', $data->title ?? '') == 'MS.') ? 'selected' : '' }}>MS.</option>
                                                    <option value="PROF." {{ (old('title', $data->title ?? '') == 'PROF.') ? 'selected' : '' }}>PROF.</option>
                                                    <option value="OTHER" {{ (old('title', $data->title ?? '') == 'OTHER') ? 'selected' : '' }}>OTHER</option>

                                                </select>
                                                @error('title')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Date of Birth</label>

                                                <input type="date" name="dob" value="{{old('dob')}}" class="form-control" required="" aria-required="true">
                                                @error('dob')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror

                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Gender</label>

                                                <select name="gender" class="form-control" required="" aria-required="true">
                                                    <option value="">Select Gender</option>
                                                    <option value="MALE" {{ (old('gender') == 'MALE') ? 'selected' : '' }}>MALE</option>
                                                    <option value="FEMALE" {{ (old('gender') == 'FEMALE') ? 'selected' : '' }}>FEMALE</option>
                                                    <option value="OTHER" {{ (old('gender') == 'OTHER') ? 'selected' : '' }}>OTHER</option>
                                                </select>
                                                @error('gender')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Marital Status</label>

                                                <select name="marital_status" class="form-control" required="" aria-required="true">
                                                    <option value="">Select Marital Status</option>
                                                    <option value="SINGLE" {{ (old('marital_status') == 'SINGLE') ? 'selected' : '' }}>SINGLE</option>
                                                    <option value="MARRIED" {{ (old('marital_status') == 'MARRIED') ? 'selected' : '' }}>MARRIED</option>
                                                    <option value="DIVORCED" {{ (old('marital_status') == 'DIVORCED') ? 'selected' : '' }}>DIVORCED</option>
                                                    <option value="WIDOWED" {{ (old('marital_status') == 'WIDOWED') ? 'selected' : '' }}>WIDOWED</option>
                                                    <option value="OTHER" {{ (old('marital_status') == 'OTHER') ? 'selected' : '' }}>OTHER</option>

                                                </select>
                                                @error('marital_status')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <label for="">Qualification</label>

                                            <div class="form-group">
                                                <select name="qualification" class="form-control" required="" aria-required="true">
                                                    <option value="">Select Qualification</option>
                                                    <option value="PRIMARY" {{ (old('qualification') == 'PRIMARY') ? 'selected' : '' }}>PRIMARY</option>
                                                    <option value="SECONDARY" {{ (old('qualification') == 'SECONDARY') ? 'selected' : '' }}>SECONDARY</option>
                                                    <option value="HIGHER SECONDARY" {{ (old('qualification') == 'HIGHER SECONDARY') ? 'selected' : '' }}>HIGHER SECONDARY</option>
                                                    <option value="GRADUATE" {{ (old('qualification') == 'GRADUATE') ? 'selected' : '' }}>GRADUATE</option>
                                                    <option value="POST GRADUATE" {{ (old('qualification') == 'POST GRADUATE') ? 'selected' : '' }}>POST GRADUATE</option>
                                                    <option value="DOCTORATE" {{ (old('qualification') == 'DOCTORATE') ? 'selected' : '' }}>DOCTORATE</option>
                                                    <option value="OTHER" {{ (old('qualification') == 'OTHER') ? 'selected' : '' }}>OTHER</option>

                                                </select>
                                                @error('qualification')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Profession</label>

                                                <select name="profession" class="form-control" required="" aria-required="true">
                                                    <option value="">Select Profession</option>
                                                    <option value="STUDENT" {{ (old('profession') == 'STUDENT') ? 'selected' : '' }}>STUDENT</option>
                                                    <option value="EMPLOYEE" {{ (old('profession') == 'EMPLOYEE') ? 'selected' : '' }}>EMPLOYEE</option>
                                                    <option value="BUSINESS" {{ (old('profession') == 'BUSINESS') ? 'selected' : '' }}>BUSINESS</option>
                                                    <option value="SELF EMPLOYED" {{ (old('profession') == 'SELF EMPLOYED') ? 'selected' : '' }}>SELF EMPLOYED</option>
                                                    <option value="HOUSEWIFE" {{ (old('profession') == 'HOUSEWIFE') ? 'selected' : '' }}>HOUSEWIFE</option>
                                                    <option value="RETIRED" {{ (old('profession') == 'RETIRED') ? 'selected' : '' }}>RETIRED</option>
                                                    <option value="LAWYER" {{ (old('profession') == 'LAWYER') ? 'selected' : '' }}>LAWYER</option>
                                                    <option value="DOCTOR" {{ (old('profession') == 'DOCTOR') ? 'selected' : '' }}>DOCTOR</option>
                                                    <option value="TEACHER" {{ (old('profession') == 'TEACHER') ? 'selected' : '' }}>TEACHER</option>
                                                    <option value="OTHER" {{ (old('profession') == 'OTHER') ? 'selected' : '' }}>OTHER</option>

                                                </select>
                                                @error('profession')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">National Insurance Number</label>

                                                <input type="text" name="national_insurance_number" placeholder="QQ123456B" value="{{old('national_insurance_number')}}" class="form-control" required="" aria-required="true">
                                                @error('national_insurance_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">Primary Mobile Number</label>

                                                <input type="number" name="primary_mobile_number" placeholder="01234567890" value="{{old('primary_mobile_number')}}" class="form-control" required="" aria-required="true">
                                                @error('primary_mobile_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="">ALternate Mobile Number</label>

                                                <input type="number" name="alternate_mobile_number" placeholder="01234567890" value="{{old('alternate_mobile_number')}}" class="form-control" required="" aria-required="true">
                                                @error('alternate_mobile_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                        <button type="submit" class="boxed-btn btn-sanatory"> Save basic informations  <span class="icon-paper-plan"></span></button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

</x-front.layout>
