<x-front.layout>
    @push('styles')
    <style>
        .gradient-bg {
            background: linear-gradient(to right, #d53369, #daae51);
        }
        /* Added styles for labels and placeholders */
        .form-group label {
            color: #333;
            font-weight: 500;
            margin-bottom: 8px;
        }
        .form-control::placeholder {
            color: #999;
            opacity: 0.7;
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
                                            <label for="">Profile Photo <span class="text-danger">*</span></label>
                                            <input type="file" name="profile_photo" accept="image/jpeg, image/png, image/jpg" id="profile_photo" class="form-control" required>
                                            @error('profile_photo')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                            <span id="file-error" style="color: red; font-weight: 500; display: none;">Invalid file type. Please select a valid image.</span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Title <span class="text-danger">*</span></label>
                                            <select class="form-control" name="title" required>
                                                <option value="">Select title</option>
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
                                            <label for="">Date of Birth <span class="text-danger">*</span></label>
                                            <input type="date" name="dob" value="{{old('dob')}}" class="form-control" required>
                                            @error('dob')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Gender <span class="text-danger">*</span></label>
                                            <select name="gender" class="form-control" required>
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
                                            <label for="">Marital Status <span class="text-danger">*</span></label>
                                            <select name="marital_status" class="form-control" required>
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
                                        <div class="form-group">
                                            <label for="">Qualification <span class="text-danger">*</span></label>
                                            <select name="qualification" class="form-control" required>
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
                                            <label for="">Profession <span class="text-danger">*</span></label>
                                            <select name="profession" class="form-control" required>
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
                                            <label for="">National Insurance Number </label>
                                            <input type="text" name="national_insurance_number" placeholder="QQ123456B" value="{{old('national_insurance_number')}}" class="form-control" required>
                                            @error('national_insurance_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Primary Mobile Number <span class="text-danger">*</span></label>
                                            <input type="number" name="primary_mobile_number" placeholder="Enter Mobile Number" value="{{old('primary_mobile_number')}}" class="form-control" required>
                                            @error('primary_mobile_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="">Alternate Mobile Number</label>
                                            <input type="number" name="alternate_mobile_number" placeholder="Enter Mobile Number" value="{{old('alternate_mobile_number')}}" class="form-control">
                                            @error('alternate_mobile_number')<span style="color: orangered; font-weight: 500">{{$message}}</span>@enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-wrapper" style="width: 100%; display: flex; justify-content: end">
                                    <button type="submit" class="boxed-btn btn-sanatory"> Save basic informations <span class="icon-paper-plan"></span></button>
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
        document.getElementById('profile_photo').addEventListener('change', function() {
            const file = this.files[0];
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
            const errorSpan = document.getElementById('file-error');

            if (file) {
                if (!allowedTypes.includes(file.type)) {
                    errorSpan.style.display = 'block';
                    this.value = '';
                } else {
                    errorSpan.style.display = 'none';
                }
            }
        });
    </script>
    @endpush

</x-front.layout>